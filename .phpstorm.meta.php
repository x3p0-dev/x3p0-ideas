<?php

/**
 * PhpStorm metadata, particularly for the service container.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare (strict_types = 1);

namespace PHPSTORM_META
{
	// For get() method.
	override(\X3P0\Ideas\Framework\Container\Container::get(0), map(['' => '@']));

	// For make() method.
	override(\X3P0\Ideas\Framework\Container\Container::make(0), map(['' => '@']));
}
