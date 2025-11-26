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

use LogicException;
use WP_Block;

/**
 * The Block Bindings Source contract defines how block binding sources should
 * be implemented within the theme.
 */
abstract class BindingSource
{
	protected const NAME = '';

	/**
	 * Returns the binding source name (e.g., 'x3p0/post').
	 */
	public function getName(): string
	{
		if (static::NAME === '') {
			throw new LogicException(sprintf(
				// Translators: %s is a PHP classname.
				__('%s must define the NAME constant', 'x3p0-ideas'),
				static::class
			));
		}

		return static::NAME;
	}

	/**
	 * Returns the human-readable label for the binding source.
	 */
	abstract public function getLabel(): string;

	/**
	 * Returns the array of block context keys this binding uses.
	 */
	public function usesContext(): array
	{
		return [];
	}

	/**
	 * Handles the binding logic and returns the bound value.
	 */
	abstract public function callback(array $args, WP_Block $block, string $name): string|int|null;
}
