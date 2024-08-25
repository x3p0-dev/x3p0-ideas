<?php

/**
 * The Font Face Resolver class is a fork of `WP_Font_Face_Resolver` and is
 * necessary for getting and parsing font-face definitions from `*.json` files
 * in WordPress. This class is used as part of a solution to solve an existing
 * issue with Core/Gutenberg where fonts from style variations are not loaded at
 * all, creating a poor user experience.
 *
 * Additionally, it's pretty much impossible to sub-class the core WordPress
 * `WP_Font_Face_Resolver` class because it declares nearly every method as
 * `private`.
 *
 * @link      https://github.com/WordPress/gutenberg/issues/59965
 * @link      https://developer.wordpress.org/reference/classes/wp_font_face_resolver/
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools;

use WP_Theme_JSON_Resolver;

class FontFaceResolver
{
	/**
	 * Returns an array of font definitions to be plugged into functions
	 * like `wp_print_font_faces()` for enqueueing font stylesheets.
	 *
	 * @since 1.0.0
	 */
	public static function getFonts(): array
	{
		// Get variations and reduce to only those with font families.
		$variations = array_filter(
			WP_Theme_JSON_Resolver::get_style_variations(),
			fn($variation) => ! empty($variation['settings']['typography']['fontFamilies'])
		);

		// Get font families from all variations.
		$families = array_merge(...array_map(
			fn($variation) => static::getFamilies($variation['settings']),
			$variations
		));

		return static::removeGlobalFonts(static::parseFamilies($families));
	}

	/**
	 * Because Core could be potentially loading a font that's already
	 * defined in our variations, let's remove those to avoid loading them a
	 * second time.
	 *
	 * @since 1.0.0
	 */
	private static function removeGlobalFonts(array $fonts): array
	{
		$settings = wp_get_global_settings();

		if (empty($settings['typography']['fontFamilies'])) {
			return $fonts;
		}

		return array_diff_key(
			$fonts,
			static::parseFamilies(static::getFamilies($settings))
		);
	}

	/**
	 * `fontFamilies` are stored by group (`default`, `theme`, etc.). This
	 * method gets all of the families from a `theme.json`-like settings
	 * array and flattens them into a single array.
	 *
	 * @since 1.0.0
	 */
	private static function getFamilies(array $settings): array
	{
		return array_merge(...array_values($settings['typography']['fontFamilies']));
	}

	/**
	 * Parses the an array of font families and grabs any font-face
	 * definitions from them.
	 *
	 * @since 1.0.0
	 */
	private static function parseFamilies(array $families): array
	{
		$faces = [];

		foreach ($families as $family) {
			if (! isset($family['fontFace'], $family['fontFamily'])) {
				continue;
			}

			$name = static::parseName($family['fontFamily']);

			if (! $name || isset($faces[$name])) {
				continue;
			}

			$faces[$name] = static::convertProperties($family['fontFace'], $name);
		}

		// Just a little nicer sorting. 😊
		ksort($faces);

		return $faces;
	}

	/**
	 * Parses a font-family name. Ensures that we only use the first name if
	 * presented a comma-separated list.
	 *
	 * @since 1.0.0
	 */
	private static function parseName(string $family): string
	{
		if (str_contains($family, ',')) {
			$family = explode(',', $family)[0];
		}

		return trim($family, "\"'");
	}

	/**
	 * Ensures that font-face properties are converted to a form that can be
	 * used in CSS.
	 *
	 * @since 1.0.0
	 */
	private static function convertProperties(array $face, string $name): array
	{
		$converted = [];

		foreach ($face as $properties) {
			$properties['font-family'] = $name;

			if (! empty($properties['src'])) {
				$properties['src'] = static::toThemeFileUri(
					(array) $properties['src']
				);
			}

			$converted[] = static::toKebabCase($properties);
		}

		return $converted;
	}

	/**
	 * Replaces file URI references from JSON to the theme file URI.
	 *
	 * @since 1.0.0
	 */
	private static function toThemeFileUri(array $src): array
	{
		$placeholder = 'file:./';

		return array_map(
			fn($url) => str_starts_with($url, $placeholder)
				? get_theme_file_uri(str_replace($placeholder, '', $url))
				: $url,
			$src
		);
	}

	/**
	 * Converts property names/keys to kebab-case.
	 *
	 * @since 1.0.0
	 */
	private static function toKebabCase(array $data): array
	{
		foreach ($data as $key => $value) {
			unset($data[$key]);
			$data[ _wp_to_kebab_case($key) ] = $value;
		}

		return $data;
	}
}
