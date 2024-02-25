<?php

/**
 * The helpers functions file houses any necessary PHP functions for the theme.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Bindings_Registry;
use WP_Block_Patterns_Registry;
use WP_Block_Pattern_Categories_Registry;
use WP_Block_Styles_Registry;
use WP_Block_Type_Registry;
use X3P0\Ideas\Bindings;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\BlockRules;
use X3P0\Ideas\Views\Engine;

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
function theme(string $component = '')
{
	static $bindings = [];

	// If there are no bound components, register and boot them.
	if ([] === $bindings) {
		// WordPress dependencies.
		$block_bindings = WP_Block_Bindings_Registry::get_instance();
		$block_types    = WP_Block_Type_Registry::get_instance();
		$patterns       = WP_Block_Patterns_Registry::get_instance();
		$pattern_cats   = WP_Block_Pattern_Categories_Registry::get_instance();
		$styles         = WP_Block_Styles_Registry::get_instance();

		// Theme dependencies.
		$block_rules     = new BlockRules();
		$view_engine     = new Engine();
		$binding_sources = [
			Bindings\Media::class,
			Bindings\Site::class,
			Bindings\Theme::class
		];

		// Bind instances of the theme's component classes that need to
		// be booted when the theme launches.
		$bindings = [
			'bindings'   => new Bindings\Component($block_bindings, $binding_sources),
			'blocks'     => new Blocks($block_types, $block_rules, $view_engine),
			'editor'     => new Editor(),
			'embeds'     => new Embeds(),
			'frontend'   => new Frontend(),
			'media'      => new Media(),
			'parts'      => new Parts(),
			'patterns'   => new Patterns($patterns, $pattern_cats, $block_types),
			'styles'     => new Styles($styles),
			'templates'  => new Templates(),
			'theme-json' => new ThemeJson(),
			'variations' => new Variations()
		];

		// Boot each of the components.
		array_walk(
			$bindings,
			fn($binding) => $binding instanceof Bootable && $binding->boot()
		);
	}

	return '' === $component ? $bindings : $bindings[ $component ];
}
