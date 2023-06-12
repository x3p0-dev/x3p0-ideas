<?php
/**
 * Autoloader.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @link      https://justintadlock.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\Ideas;

class Autoload
{
	/**
         * Register the autoloader.
         *
         * @since 1.0.0
         */
	public static function register(): bool
	{
		return spl_autoload_register( [ __CLASS__, 'autoload' ], true, true );
	}

	/**
         * Autoloads class if it's in the theme's namespace.
         *
         * @since 1.0.0
         */
	public static function autoload( string $class ): void
	{
		// Bail if the class is not in our namespace.
		if ( 0 !== strpos( $class, __NAMESPACE__ ) ) {
			return;
		}

		$filename = get_parent_theme_file_path(
			sprintf( 'src/%s.php', str_replace(
				[ __NAMESPACE__ . '\\', '\\' ],
				[ '', DIRECTORY_SEPARATOR ],
				$class
			) )
		);

		if ( file_exists( $filename ) ) {
			require_once $filename;
		}
	}
}
