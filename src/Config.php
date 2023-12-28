<?php
/**
 * Theme Configuration class hooks into `theme.json` and allows for the passing
 * data via the `settings.custom.config` property. The class copies that data on
 * the server-side and removes it from the JSON. This allows themes to use the
 * `theme.json` as a PHP configuration file without the JSON data being printed
 * to the `<head>` as CSS custom properties.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use WP_Theme_JSON_Data;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Config implements Bootable
{
	use HookAnnotation;

	/**
	 * Stores data from `settings.custom.config` from `theme.json`.
	 *
	 * @since 1.0.0
	 */
	protected array $storage = [];

	/**
	 * Fallbacks for properties expected to be set via `theme.json`.
	 *
	 * @since 1.0.0
	 */
	protected const DEFAULTS = [
		'front-page-image' => 'file:./public/media/purple-sunset.webp'
	];

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 * @return mixed
	 * @todo   Add `mixed` return type declaration with PHP 8-only support.
	 * @todo   Allow for dot notation to retrieve nested items.
	 */
	public function get( string $key )
	{
		$key = _wp_to_kebab_case( $key );

		$value = $this->storage[ $key ] ?? self::DEFAULTS[ $key ] ?? null;

		// Handles URLs that being with `file:./`, which points to the
		// theme root. Uses `get_theme_file_uri()` to allow child themes
		// to override the parent.
		if ( is_string( $value ) && str_starts_with( $value, 'file:./' ) ) {
			$value = get_theme_file_uri( str_replace( 'file:./', '', $value ) );
		}

		return $value;
	}

	/**
	 * Filters the `theme.json` data, plucking configuration registered via
	 * `settings.custom.config`.
	 *
	 * Note that we can't use proper type hinting here because the Gutenberg
	 * plugin doesn't extend `WP_Theme_JSON_Data` and WP doesn't implement
	 * proper interfaces. So, what we actually get is up in the air, but
	 * that's WordPress for you. Generally, what will be passed will either
	 * be `WP_Theme_JSON_Data` or `WP_Theme_JSON_Data_Gutenberg`. We could
	 * use a union type here, but---quite frankly---I don't trust that this
	 * won't change. Regardless, the code will expect the public properties
	 * and methods of `WP_Theme_JSON_Data`.
	 *
	 * @hook  wp_theme_json_data_theme
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/classes/wp_theme_json_data/
	 */
	public function themeJsonData( $theme_json_data )
	{
		$data = $theme_json_data->get_data();

		if ( isset( $data['settings']['custom']['config'] ) ) {
			$config = $data['settings']['custom']['config'];

			unset( $data['settings']['custom']['config'] );

			if ( is_array( $config ) ) {
				$this->storage = $this->resolveConfig( $config );
			}

			return new WP_Theme_JSON_Data( $data, 'theme' );
		}

		return $theme_json_data;
	}

	/**
	 * Resolves the custom configuration properties.
	 *
	 * @since  1.0.0
	 */
	protected function resolveConfig( array $properties ): array
	{
		$resolved = [];

		foreach ( $properties as $key => $value ) {
			$key = _wp_to_kebab_case( $key );

			if ( is_array( $value ) ) {
				$resolved[ $key ] = $this->resolveConfig( $value );
				continue;
			}

			$resolved[ $key ] = $value;
		}

		return $resolved;
	}
}
