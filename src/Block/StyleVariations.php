<?php

/**
 * The Style Variations class registers block style variations via PHP.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block_Styles_Registry;
use WP_Style_Engine_CSS_Rule;
use WP_Theme_JSON_Resolver;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Hookable};

class StyleVariations implements Bootable
{
	use Hookable;

	/**
	 * Stores an array off `WP_Style_Engine_CSS_Rule` objects.
	 *
	 * @since 1.0.0
	 * @var   WP_Style_Engine_CSS_Rule[]
	 */
	protected array $css_rules = [];

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(protected WP_Block_Styles_Registry $styles)
	{}

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Register custom block styles.
	 *
	 * @since 1.0.0
	 */
	#[Action('init')]
	public function register(): void
	{
		// Register Primary button separately because we need to set it
		// as the default.
		$this->styles->register('core/button', [
			'name'       => 'primary',
			'label'      => __('Primary', 'x3p0-ideas'),
			'is_default' => true
		]);

		foreach ($this->getCustomStyles() as $block => $styles) {
			foreach ($styles as $name => $label) {
				$this->styles->register($block, [
					'name'  => $name,
					'label' => $label
				]);
			}
		}
	}

	/**
	 * Registers custom CSS rules from the `settings.custom` property from
	 * block style variation files.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/40318
	 */
	#[Action('init')]
	public function registerCssRules(): void
	{
		$variations = WP_Theme_JSON_Resolver::get_style_variations('block');

		foreach ($variations as $variation) {
			if (
				empty($variation['slug'])
				|| empty($variation['blockTypes'])
				|| empty($variation['settings']['custom'] ?? null)
			) {
				continue;
			}

			$base_declarations  = [];
			$child_declarations = [];

			$css_vars = static::flattenTree($variation['settings']['custom']);

			foreach ($css_vars as $property => $value) {
				if (
					str_starts_with($property, 'border')
					|| str_starts_with($property, 'shadow')
				) {
					$child_declarations["--wp--custom--{$property}"] = $value;
					continue;
				}

				$base_declarations["--wp--custom--{$property}"] = $value;
			}

			if ($base_declarations) {
				$this->css_rules[] = new WP_Style_Engine_CSS_Rule(
					":root :where(.is-style-{$variation['slug']})",
					$base_declarations
				);
			}

			if ($child_declarations) {
				$this->css_rules[] = new WP_Style_Engine_CSS_Rule(
					":root :where(.is-style-{$variation['slug']} > *)",
					$child_declarations
				);
			}
		}
	}

	/**
	 * Enqueues the CSS from our custom block style CSS rules.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/40318
	 */
	#[Action('enqueue_block_assets')]
	public function enqueueStyles(): void
	{
		if ([] === $this->css_rules) {
			return;
		}

		$style = '';

		foreach ($this->css_rules as $rule) {
			$declarations = '';

			foreach ($rule->get_declarations()->get_declarations() as $property => $value) {
				$declarations .= "{$property}: {$value};";
			}

			$style .= "{$rule->get_selector()} { {$declarations} }";
		}

		wp_register_style('x3p0-ideas-block-styles-custom', false);
		wp_add_inline_style('x3p0-ideas-block-styles-custom', $style);
		wp_enqueue_style('x3p0-ideas-block-styles-custom');
	}

	/**
	 * Flattens a JSON object tree, creating CSS custom properties.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/40318
	 */
	private static function flattenTree(array $tree, string $prefix = ''): array
	{
		$result = [];

		foreach ($tree as $property => $value) {
			$kebab = strtolower(_wp_to_kebab_case($property));
			$key   = $prefix . str_replace('/', '-', $kebab);

			if (is_array($value)) {
				$result = array_replace(
					$result,
					static::flattenTree($value, "{$key}--")
				);
				continue;
			}

			$result[$key] = $value;
		}

		return $result;
	}

	/**
	 * Returns an array of custom block style variations to register.
	 *
	 * @since 1.0.0
	 */
	private function getCustomStyles(): array
	{
		// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
		return [
			'core/archives' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas'),
				'spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/button' => [
				'link'      => __('Link', 'x3p0-ideas'),
				'secondary' => __('Secondary', 'x3p0-ideas')
			],
			'core/categories' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas'),
				'spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/columns' => [
				'grid-auto'     => __('Grid: Auto',           'x3p0-ideas'),
				'reverse-stack' => __('Reverse Mobile Stack', 'x3p0-ideas'),
			],
			'core/comment-author-name' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/comment-date' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/comment-edit-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/comment-reply-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/cover' => [
				'fade-in' => __('Fade In', 'x3p0-ideas'),
				'stretch' => __('Stretch', 'x3p0-ideas')
			],
			'core/details' => [
				'plain' => __('Plain', 'x3p0-ideas')
			],
			'core/file' => [
				'icon'  => __('Icon',  'x3p0-ideas'),
				'plain' => __('Plain', 'x3p0-ideas')
			],
			'core/footnotes' => [
				'pull' => __('Pull', 'x3p0-ideas')
			],
			'core/gallery' => [
				'classic' => __('Classic', 'x3p0-ideas'),
				'reverse' => __('Reverse', 'x3p0-ideas')
			],
			'core/home-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/image' => [
				'borderless' => __('Borderless',   'x3p0-ideas'),
				'hand-drawn' => __('Hand-Drawn',   'x3p0-ideas'),
				'icon'       => __('Caption Icon', 'x3p0-ideas'),
				'polaroid'   => __('Polaroid',     'x3p0-ideas'),
				'tape'       => __('Tape',         'x3p0-ideas')
			],
			'core/list' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas')
			],
			'core/list-item' => [
				'cancel-circle' => __('Cancel Circle', 'x3p0-ideas'),
				'check-circle'  => __('Check Circle',  'x3p0-ideas')
			],
			'core/loginout' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/page-list' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas')
			],
			'core/post-author-name' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-comments-count' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-comments-form' => [
				'icons' => __('Icons', 'x3p0-ideas')
			],
			'core/post-comments-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-featured-image' => [
				'borderless' => __('Borderless', 'x3p0-ideas')
			],
			'core/post-date' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-template' => [
				'flex' => __('Flexible', 'x3p0-ideas')
			],
			'core/post-terms' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-time-to-read' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/pullquote' => [
				'mark-top' => __('Mark: Top', 'x3p0-ideas')
			],
			'core/search' => [
				'icon' => __('Icon',  'x3p0-ideas'),
				'sm'   => __('Small', 'x3p0-ideas')
			],
			'core/separator' => [
				'dashed'     => __('Dashed',     'x3p0-ideas'),
				'dotted'     => __('Dotted',     'x3p0-ideas'),
				'double'     => __('Double',     'x3p0-ideas'),
				'hand-drawn' => __('Hand Drawn', 'x3p0-ideas')
			],
			'core/social-links' => [
				'monotone' => __('Monotone', 'x3p0-ideas')
			],
			'core/table-of-contents' => [
				'chapters' => __('Chapters', 'x3p0-ideas'),
				'pull'     => __('Pull',     'x3p0-ideas')
			],
			'core/tag-cloud' => [
				'emoji' => __('Emoji', 'x3p0-ideas'),
				'flat'  => __('Flat', 'x3p0-ideas'),
				'icon'  => __('Icon', 'x3p0-ideas')
			]
		];
		// phpcs:enable
	}
}
