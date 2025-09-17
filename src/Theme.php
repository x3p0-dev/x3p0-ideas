<?php

/**
 * Theme lifecycle helper.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-portfolio
 */

declare(strict_types=1);

namespace X3P0\Ideas;

/**
 * A static class that handles the various duties during the theme's lifecycle.
 */
class Theme
{
	/**
	 * Bootstraps the theme and should be used as a callback on the
	 * `after_setup_theme` action hook.
	 */
	public static function boot(): void
	{
		app()->boot();
	}
}
