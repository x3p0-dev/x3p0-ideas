<?php

/**
 * Bootable interface.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Contracts;

/**
 * Defines the contract that bootable classes should utilize. Bootable classes
 * should have a `boot()` method with the singular purpose of "booting" any
 * necessary code that needs to run. Most bootable classes are meant to be
 * single-instance classes that get loaded once per page request.
 */
interface Bootable
{
	/**
	 * Bootstraps the class.
	 */
	public function boot(): void;
}
