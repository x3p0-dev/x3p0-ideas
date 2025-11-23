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

namespace X3P0\Ideas\Block\Binding;

use WP_Block;

/**
 * The Block Bindings Source contract defines how block binding sources should
 * be implemented within the theme.
 */
interface BindingSource
{
	/**
	 * Returns the binding source name (e.g., 'x3p0/post').
	 */
	public function getName(): string;

	/**
	 * Returns the human-readable label for the binding source.
	 */
	public function getLabel(): string;

	/**
	 * Returns the array of block context keys this binding uses.
	 */
	public function getContext(): array;

	/**
	 * Handles the binding logic and returns the bound value.
	 */
	public function callback(array $args, WP_Block $block, string $name): string|int|null;
}
