<?php

/**
 * Block style variation engine.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Style;

use WP_Style_Engine_CSS_Rule;
use WP_Theme_JSON_Resolver;
use X3P0\Ideas\Framework\Contracts\Bootable;

final class StyleEngine implements Bootable
{
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
		'section-5',
		'section-6',
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
	 * Stores an array off `WP_Style_Engine_CSS_Rule` objects.
	 *
	 * @var WP_Style_Engine_CSS_Rule[]
	 */
	protected array $css_rules = [];

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('init', $this->registerCssRules(...));
		add_action('enqueue_block_assets', $this->enqueue(...));
	}

	/**
	 * Registers custom CSS rules from the `settings.custom` property from
	 * block style variation files.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/40318
	 */
	private function registerCssRules(): void
	{
		$gradient   = wp_get_global_styles(['color', 'gradient']);
		$background = wp_get_global_styles(['color', 'background']);
		$text       = wp_get_global_styles(['color', 'text']);

		$gradient   = is_string($gradient) ? $gradient : 'none';
		$background = is_string($background) ? $background : 'transparent';
		$text       = is_string($text) ? $text : 'inherit';

		$c_gradient   = wp_get_global_styles(['blocks', 'core/group', 'variations', 'site-content', 'color', 'gradient']);
		$c_background = wp_get_global_styles(['blocks', 'core/group', 'variations', 'site-content', 'color', 'background']);
		$c_text       = wp_get_global_styles(['blocks', 'core/group', 'variations', 'site-content', 'color', 'text']);

		$root_declarations = [];

		$root_declarations['background'] = is_string($c_gradient) ? $c_gradient : $gradient;
		$root_declarations['background-color'] = is_string($c_background) ? $c_background : $background;
		$root_declarations['color'] = is_string($c_text) ? $c_text : $text;

		$this->css_rules[] = new WP_Style_Engine_CSS_Rule(
			".editor-styles-wrapper:not(:has(.wp-site-blocks))",
			$root_declarations
		);

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

			$css_vars = self::flattenTree($variation['settings']['custom']);

			foreach ($css_vars as $property => $value) {
				if (self::isDescendantProperty($variation, $property)) {
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
	 * @link https://github.com/WordPress/gutenberg/issues/40318
	 */
	private function enqueue(): void
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
	 * @link https://github.com/WordPress/gutenberg/issues/40318
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
					self::flattenTree($value, "{$key}--")
				);
				continue;
			}

			$result[$key] = $value;
		}

		return $result;
	}
}
