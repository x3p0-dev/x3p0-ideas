<?php

/**
 * Global style variation tester.
 *
 * Global style variations in WordPress can only be tested by going to the site
 * editor and selecting a variation. Once a variation is selected, the settings
 * are stored in the database as custom global styles at the user level. This is
 * problematic in development because it means that any changes that you make
 * to the variation's JSON file are not reflected on the front end. The "user"
 * settings are used instead. The only way to test at this point is to reset the
 * styles in the site editor.
 *
 * This class was developed to quickly test variations without: 1) selecting a
 * variation at all and 2) needing to reset styles if a variation is currently
 * stored as user styles.
 *
 * To test, simply pass the variation slug into the constructor and boot:
 *
 * ```php
 * (new GlobalStyleVariation('variation-slug`))->boot();
 * ```
 *
 * If the slug isn't set, no test will be run. If it is set to `default`, the
 * theme's primary `theme.json` will be used.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Dev;

use WP_Theme_JSON_Data;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class GlobalStyleVariation implements Bootable
{
	use HookAnnotation;

	/**
	 * Mappings for short variation names.
	 *
	 * @since 1.0.0
	 * @todo  Add type hinting with PHP 8.3+ requirement.
	 */
	private const SHORT_NAMES = [
		'bookish'  => 'a-little-bit-bookish',
		'chestnut' => 'chestnut-rose'
	];

	/**
	 * Stores the current theme style variation for testing.
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected string $theme = '';

	/**
	 * Stores the current color variation for testing.
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected string $color = '';

	/**
	 * Stores the current typography variation for testing.
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected string $typography = '';

	/**
	 * Set up the object's initial state.
	 *
	 * @since 1.0.0
	 * @todo  Promote params to properties with PHP 8.0+ requirement.
	 */
	public function __construct(
		string $theme = '',
		string $color = '',
		string $typography = ''
	) {
		$this->theme = isset(self::SHORT_NAMES[$theme])
			? self::SHORT_NAMES[$theme]
			: $theme;

		$this->color      = $color;
		$this->typography = $typography;
	}

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
	 * Filters the data at the user level in case something is saved in the
	 * database already. We want the front end to use the variation passed
	 * into the constructor.
	 *
	 * @hook  wp_theme_json_data_user  first
	 * @param WP_Theme_JSON_Data  The Gutenberg plugin breaks this.
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/wp_theme_json_data_user/
	 */
	public function setGlobalStyle(object $theme_json): object
	{
		if ('' === $this->theme) {
			return $theme_json;
		}

		$filename = $this->getFilename("theme/{$this->theme}");

		if (! is_readable($filename)) {
			return $theme_json;
		}

		$data = wp_json_file_decode($filename, [ 'associative' => true ]);

		return ! is_null( $data )
			? new WP_Theme_JSON_Data($data, 'user')
			: $theme_json;
	}

	/**
	 * Filters color variation.
	 *
	 * @hook  wp_theme_json_data_user  first
	 * @param WP_Theme_JSON_Data  The Gutenberg plugin breaks this.
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/wp_theme_json_data_user/
	 */
	public function setColorStyle(object $theme_json): object
	{
		if ('' === $this->color) {
			return $theme_json;
		}

		$filename = $this->getFilename("color/{$this->color}");

		if (! is_readable($filename)) {
			return $theme_json;
		}

		$data = wp_json_file_decode($filename, [ 'associative' => true ]);

		return ! is_null( $data )
			? $theme_json->update_with($data)
			: $theme_json;
	}

	/**
	 * Filters typography variation.
	 *
	 * @hook  wp_theme_json_data_user  first
	 * @param WP_Theme_JSON_Data  The Gutenberg plugin breaks this.
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/wp_theme_json_data_user/
	 */
	public function setTypographyStyle(object $theme_json): object
	{
		if ('' === $this->typography) {
			return $theme_json;
		}

		$filename = $this->getFilename("typography/{$this->typography}");

		if (! is_readable($filename)) {
			return $theme_json;
		}

		$data = wp_json_file_decode($filename, [ 'associative' => true ]);

		return ! is_null( $data )
			? $theme_json->update_with($data)
			: $theme_json;
	}

	/**
	 * Returns the variation's JSON filename and path or an empty string if
	 * not found or unreadable.
	 *
	 * @since 1.0.0
	 */
	protected function getFilename(string $variation = ''): string
	{
		if ('' === $variation) {
			return '';
		}

		return get_theme_file_path("styles/{$variation}.json");
	}
}
