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

use X3P0\Ideas\Framework\Container\{Container, ServiceContainer};
use X3P0\Ideas\Framework\Core\Application;

/**
 * Returns the theme application instance.
 */
function theme(): Application
{
	static $theme;

	if (! $theme instanceof Theme) {
		$theme = new Theme(new ServiceContainer());
	}

	return $theme;
}


/**
 * Helper function for quickly accessing the service container. Devs can access
 * any concrete implementation by passing in a reference to its abstract
 * identifier via `container()->get($abstract)`.
 */
function container(): Container
{
	return theme()->container();
}
