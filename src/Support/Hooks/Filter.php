<?php

/**
 * Filter attribute.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2008-2024 Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Support\Hooks;

use Attribute;

/**
 * The filter attribute is for registering class constants, methods, or
 * properties as a filter on a WordPress hook using a PHP attribute.
 */
#[Attribute(
	Attribute::IS_REPEATABLE
	| Attribute::TARGET_CLASS_CONSTANT
	| Attribute::TARGET_METHOD
	| Attribute::TARGET_PROPERTY
)]
class Filter implements Hook
{
	/**
	 * Stores the hook callback priority.
	 */
	protected int $priority = 10;

	/**
	 * Sets up the object state.
	 */
	public function __construct(
		protected string $hook,
		int|string $priority = 10
	) {
		$this->priority = match ($priority) {
			'first' => PHP_INT_MIN,
			'last'  => PHP_INT_MAX,
			default => intval($priority)
		};
	}

	/**
	 * Registers the filter hook.
	 */
	public function register(callable $callback, int $arguments = 1): void
	{
		add_filter($this->hook, $callback, $this->priority, $arguments);
	}
}
