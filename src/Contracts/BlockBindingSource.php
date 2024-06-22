<?php

/**
 * Block Bindings Source interface.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Contracts;

interface BlockBindingSource
{
	/**
	 * Returns the name of the bindings source.
	 *
	 * @since 1.0.0
	 */
	public function name(): string;

	/**
	 * Returns the bindings source registration arguments.
	 *
	 * @since 1.0.0
	 */
	public function options(): array;
}
