<?php
/**
 * The Block Patterns class is responsible for registering block pattern
 * categories and block patterns. However, it's recommended to register patterns
 * by placing individual files in the `/patterns` folder.
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

class ThemeConfig implements Bootable
{
	use HookAnnotation;

	protected array $storage = [];

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
	 */
	public function get( string $key )
	{
		$key = _wp_to_kebab_case( $key );

		if ( isset( $this->storage[ $key ] ) ) {
			$value = $this->storage[ $key ];
		} elseif ( isset( self::DEFAULTS[ $key ] ) ) {
			$value = self::DEFAULTS[ $key ];
		}

		// Handles URLs that being with `file:./`, which points to the
		// theme root. Uses `get_theme_file_uri()` to allow child themes
		// to override the parent.
		if ( $value && str_starts_with( $value, 'file:./' ) ) {
			$value = get_theme_file_uri( str_replace( 'file:./', '', $value ) );
		}

		return $value;
	}

	/**
	 * Removes theme support for core patterns.
	 *
	 * @hook  wp_theme_json_data_theme
	 * @since 1.0.0
	 */
	public function themeSupport( $theme_json_data )
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

	protected function resolveConfig( array $config ): array
	{
		$resolved = [];

		foreach ( $config as $key => $value ) {
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
