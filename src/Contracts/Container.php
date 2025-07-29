<?php

/**
 * Container interface.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Contracts;

/**
 * A simple container used to store and reference the various theme components.
 */
interface Container
{
	/**
	 * Registers a single instance of a binding.
	 */
	public function instance(string $abstract, mixed $instance): void;

	/**
	 * Returns a binding or `null`.
	 */
	public function get(string $abstract): mixed;

	/**
	 * Checks if a binding exists.
	 */
	public function has(string $abstract): bool;
}
