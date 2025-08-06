<?php

/**
 * Block Style Variations class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block_Styles_Registry;
use WP_Style_Engine_CSS_Rule;
use WP_Theme_JSON_Resolver;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Filter, Hookable};

/**
 * Handles actions and filters related to block style variations.
 */
class StyleVariations implements Bootable
{
	use Hookable;

	/**
	 * Slugs for section styles registered by the theme.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const SECTION_STYLES = [
		'section-1',
		'section-2',
		'section-3',
		'section-4',
		'cover-dark'
	];

	/**
	 * Properties that should be defined for descendants of section styles.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const SECTION_DESCENDANT_PROPERTIES = [
		'border',
		'outline',
		'shadow'
	];

	/**
	 * Core block styles to unregister that are not possible to unregister
	 * via `unregister_block_style()` due to being registered via JS.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const UNREGISTER_STYLES = [
		'core/button'       => [ 'fill', 'outline' ],
		'core/quote'        => [ 'plain' ],
		'core/separator'    => [ 'dots', 'wide' ],
		'core/social-links' => [ 'pill-shape' ],
		'core/tag-cloud'    => [ 'outline' ]
	];

	/**
	 * Stores an array off `WP_Style_Engine_CSS_Rule` objects.
	 *
	 * @var WP_Style_Engine_CSS_Rule[]
	 */
	protected array $css_rules = [];

	/**
	 * Sets up the object state.
	 */
	public function __construct(protected WP_Block_Styles_Registry $styles)
	{}

	/**
	 * Register custom block styles.
	 */
	#[Action('init')]
	public function register(): void
	{
		// Register Primary button separately because we need to set it
		// as the default. Basically, this is essentially changing the
		// user-facing label. The variation actually uses the default
		// Button block styles.
		$this->styles->register('core/button', [
			'name'       => 'button-primary',
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
	 * Because Core block styles are registered via JavaScript, you cannot
	 * unregister them via `unregister_block_style()`. You can unregister
	 * using JavaScript or by filtering the block type's metadata, which
	 * we're doing here.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/25330
	 */
	#[Filter('block_type_metadata')]
	function unregisterCoreStyles(array $metadata): array
	{
		if (
			! isset(self::UNREGISTER_STYLES[$metadata['name']])
			|| ! isset($metadata['styles'])
		) {
			return $metadata;
		}

		$remove = self::UNREGISTER_STYLES[$metadata['name']];

		$metadata['styles'] = array_values(array_filter(
			$metadata['styles'],
			fn($style) => ! in_array($style['name'], $remove, true)
		));

		return $metadata;
	}

	/**
	 * Registers custom CSS rules from the `settings.custom` property from
	 * block style variation files.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/40318
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
				if (static::isDescendantProperty($variation, $property)) {
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
	 * Determine if the current property for the variation should be defined
	 * for its descendants.
	 *
	 * @since 1.0.0
	 */
	private static function isDescendantProperty(array $variation, string $property): bool
	{
		if (! in_array($variation['slug'], self::SECTION_STYLES, true)) {
			return false;
		}

		foreach (self::SECTION_DESCENDANT_PROPERTIES as $needle) {
			if (str_starts_with($property, $needle)) {
				return true;
			}
		}

		return false;
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
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas'),
				'list-spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/categories' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas'),
				'list-spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/columns' => [
				'columns-reverse-stack' => __('Reverse Mobile Stack', 'x3p0-ideas')
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
			'core/details' => [
				'details-plain' => __('Plain', 'x3p0-ideas')
			],
			'core/file' => [
				'icon' => __('Icon',  'x3p0-ideas')
			],
			'core/footnotes' => [
				'list-pull' => __('Pull', 'x3p0-ideas')
			],
			'core/gallery' => [
				'gallery-classic' => __('Classic', 'x3p0-ideas')
			],
			'core/home-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/image' => [
				'icon' => __('Caption Icon', 'x3p0-ideas'),
			],
			'core/list' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas')
			],
			'core/list-item' => [
				'list-item-positive' => __('Positive', 'x3p0-ideas'),
				'list-item-negative' => __('Negative', 'x3p0-ideas')
			],
			'core/loginout' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/page-list' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas')
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
			'core/social-links' => [
				'monotone' => __('Monotone', 'x3p0-ideas')
			],
			'core/table-of-contents' => [
				'list-pull' => __('Pull', 'x3p0-ideas')
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
