<?php
/**
 * The helpers functions file houses any necessary PHP functions for the theme.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @link      https://justintadlock.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;

/**
 * Mini container used to reference the various theme components. Bootstraps the
 * theme on first call by executing each component's `boot()` method. The
 * `theme()` function acts as the single instance of the theme, and devs can
 * access any class/component by passing in its reference via the `$component`
 * parameter (useful for accessing hooks within classes).
 *
 * @since  1.0.0
 * @return mixed
 * @todo   Add `mixed` return type declaration with PHP 8-only support.
 */
function theme( string $component = '' )
{
        static $bindings = [];

	// If there are no bound components, register and boot them.
	if ( [] === $bindings ) {

		// Bind instances of the theme's component classes that need to
		// be booted when the theme launches.
		$bindings = apply_filters( 'x3p0/ideas/components', [
			'assets'         => new Assets(),
			'patterns'       => new Patterns(),
			'template-parts' => new TemplateParts(),
			'image-sizes'    => new ImageSizes()
		] );

		// Boot each of the components.
		foreach ( $bindings as $binding ) {
			if ( $binding instanceof Bootable ) {
				$binding->boot();
			}
		}
	}

	return '' === $component ? $bindings : $bindings[ $component ];
}
