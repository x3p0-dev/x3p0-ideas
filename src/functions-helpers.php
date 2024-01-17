<?php
/**
 * The helpers functions file houses any necessary PHP functions for the theme.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use WP_Block_Type_Registry;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\BlockRules;

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

		// Get dependencies.
		$block_registry = WP_Block_Type_Registry::get_instance();
		$block_rules    = new BlockRules();

		// Bind instances of the theme's component classes that need to
		// be booted when the theme launches.
		$bindings = apply_filters( 'x3p0/ideas/components', [
			'assets'    => new Assets(),
			'blocks'    => new Blocks( $block_rules ),
			'embeds'    => new Embeds(),
			'media'     => new Media(),
			'parts'     => new Parts(),
			'patterns'  => new Patterns( $block_registry ),
			'templates' => new Templates()
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
