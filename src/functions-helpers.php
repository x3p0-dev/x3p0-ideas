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

/**
 * Bootstraps the theme.
 *
 * @since 1.0.0
 */
function boot(): void
{
	theme()->boot();
}

/**
 * Stores the single instance of the theme in the static `$theme` variable. Devs
 * can access any class/component by passing in its reference via the `$component`
 * parameter (useful for accessing hooks within classes).
 *
 * @since 1.0.0
 */
function theme(string $component = ''): mixed
{
	static $theme;

	if (! $theme instanceof Theme) {
		do_action('x3p0/ideas/init', $theme = new Theme());
	}

	return '' === $component ? $theme : $theme->get($component);
}
