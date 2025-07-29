<?php

/**
 * Block Bindings Source interface.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Contracts;

use WP_Block_Bindings_Registry;

/**
 * The Block Bindings Source contract defines how block binding sources should
 * be implemented within the theme.
 */
interface BlockBindingSource
{
	/**
	 * Registers the block bindings source.
	 */
	public function register(WP_Block_Bindings_Registry $bindings): void;
}
