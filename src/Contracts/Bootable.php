<?php
/**
 * Bootable interface.
 *
 * Defines the contract that bootable classes should utilize. Bootable classes
 * should have a `boot()` method with the singular purpose of "booting" any
 * necessary code that needs to run. Most bootable classes are meant to be
 * single-instance classes that get loaded once per page request.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\Ideas\Contracts;

interface Bootable
{
	/**
	 * Bootstraps the class.
	 *
	 * @since 1.0.0
	 */
	public function boot(): void;
}
