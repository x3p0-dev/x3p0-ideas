<?php

/**
 * A simple code syntax highlighter that uses Prism.js to prettify the code.
 * This implementation specifically works with WordPress's built-in Code block.
 * It avoids conflicts with plugins by specifically requiring the user to select
 * the **Highlight** block style (`.is-style-highlight`). If this is not chosen
 * this script will bail early and not load the JavaScript for the code block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Helpers;

use WP_HTML_Tag_Processor;

class CodeHighlight
{
	/**
	 * Prefix and suffix strings to be used to wrap the language label in
	 * the front-end toolbar for the code block. These are mostly for fun,
	 * decorative purposes.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	protected const LABEL_WRAPPERS = [
		'default' => [ 'prefix' => '<',  'suffix' => '/>' ],
		'php'     => [ 'prefix' => '<?', 'suffix' => ''   ],
		'css'     => [ 'prefix' => '{',  'suffix' => '}'  ],
		'scss'    => [ 'prefix' => '{',  'suffix' => '}'  ]
	];

	/**
	 * Decorative icon options for use in the toolbar. These are mapped to
	 * global style variations in the theme so that each variation can add
	 * a custom icon if wanted. Note that icons are repeated three times in
	 * red, yellow, and green colors (though, these colors can be altered
	 * via CSS).
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	protected const TOOLBAR_ICONS = [
		'default'    => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>',
		'love-story' => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/></svg>'
	];

	/**
	 * The code's language, if provided.
	 *
	 * @since 1.0.0
	 */
	protected string $language = '';

	/**
	 * The block's alignment. This is needed to add the alignment class to
	 * the wrapper.
	 *
	 * @since 1.0.0
	 */
	protected string $align = '';

	/**
	 * Whether the Code block has the `.is-style-highlight` class. Should
	 * be registered as a block style either via PHP or JS. We piggyback
	 * off the Block Styles API to avoid conflicting with plugins that
	 * extend the block.
	 *
	 * @since 1.0.0
	 */
	protected bool $is_highlight = false;

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(
		protected string $content,
		protected array $block
	) {
		$processor = new WP_HTML_Tag_Processor($this->content);

		// Bail early if we don't have a `<pre>` tag.
		if (! $processor->next_tag('pre')) {
			return;
		}

		// Get the language class and determine if this is a highlight.
		//
		// Note that the `sanitize_key` function ensures the string is
		// lowercase and strips everything else that isn't a number,
		// hyphen, or underscore.
		foreach ($processor->class_list() as $class) {
			if (str_contains($class, 'language-')) {
				$this->language = sanitize_key(str_replace(
					'language-',
					'',
					$class
				));
			}
		}

		// Update the code block HTML if this is a highlighted
		if ('' !== $this->language && $processor->has_class('is-style-highlight')) {
			$this->is_highlight = true;

			// Update the block classes.
			$processor->remove_class('wp-block-code');
			$processor->remove_class('is-style-highlight');
			$processor->add_class('wp-block-code__code');

			// Get the block alignment.
			if (isset($this->block['attrs']['align'])) {
				$this->align = "align{$this->block['attrs']['align']}";
				$processor->remove_class($this->align);
			}

			$this->content = $processor->get_updated_html();
		}
	}

	/**
	 * Renders the formatted code block.
	 *
	 * @since 1.0.0
	 */
	public function render(): string
	{
		if ('' === $this->content || ! $this->is_highlight) {
			return $this->content;
		}

		// Enqueue the `prism.js` script and any other assets.
		$this->enqueueAssets();

		return sprintf(
			'<div class="wp-block-code is-style-highlight%s">%s%s</div>',
			'' === $this->align ? '' : esc_attr(" {$this->align}"),
			$this->renderToolbar(),
			str_ireplace(
				[ '<br>', '<br/>', '<br />' ],
				"\n",
				$this->content
			)
		);
	}

	/**
	 * Renders the toolbar.
	 *
	 * @since 1.0.0
	 */
	protected function renderToolbar(): string
	{
		return sprintf(
			'<div class="wp-block-code__toolbar" aria-hidden="true">%s%s</div>',
			$this->renderToolbarIcon(),
			$this->renderToolbarLabel()
		);
	}

	/**
	 * Renders the toolbar icon.
	 *
	 * @since 1.0.0
	 */
	protected function renderToolbarIcon(): string
	{
		$variation = wp_get_global_settings([ 'custom', 'variation' ]);

		$icon = is_string($variation) && isset(self::TOOLBAR_ICONS[$variation])
			? self::TOOLBAR_ICONS[$variation]
			: self::TOOLBAR_ICONS['default'];

		return sprintf(
			'<span class="wp-block-code__toolbar-icon">%s</span>',
			str_repeat($icon, 3)
		);
	}

	/**
	 * Renders the toolbar label.
	 *
	 * @since 1.0.0
	 */
	protected function renderToolbarLabel(): string
	{
		list('prefix' => $prefix, 'suffix' => $suffix)
			= self::LABEL_WRAPPERS[$this->language]
			?? self::LABEL_WRAPPERS['default'];

		return sprintf(
			'<span class="wp-block-code__toolbar-label">%s</span>',
			esc_html($prefix . $this->language . $suffix)
		);
	}

	/**
	 * Enqueues assets for code syntax highlighting.
	 *
	 * @since 1.0.0
	 */
	protected function enqueueAssets(): void
	{
		$script_asset = include get_parent_theme_file_path('public/js/highlight.asset.php');

		wp_enqueue_script(
			'x3p0-ideas-code-highlight',
			get_parent_theme_file_uri('public/js/highlight.js'),
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);
	}
}
