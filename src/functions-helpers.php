<?php

/**
 * The helpers functions file houses any necessary PHP functions for the theme.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

/**
 * Stores the single instance of the theme in the static `$theme` variable. Devs
 * can access any concrete implementation by passing in a reference to its
 * abstract identifier via `theme()->get($abstract)`.
 *
 * @since 1.0.0
 */
function theme(): Theme
{
	static $theme;

	if (! $theme instanceof Theme) {
		do_action('x3p0/ideas/init', $theme = new Theme());
	}

	return $theme;
}
