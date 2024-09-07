<?php
/**
 * The filter attribute class is for registering class methods as a filter on a
 * WordPress hook using a PHP attribute.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2008-2024 Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools\Hooks;

use Attribute;
use X3P0\Ideas\Contracts\Hook;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Filter implements Hook
{
	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(
		protected string $hook,
		protected int|string $priority = 10
	) {
		switch ($this->priority) {
			case 'first':
				$this->priority = PHP_INT_MIN;
				break;
			case 'last':
				$this->priority = PHP_INT_MAX;
				break;
			default:
				$this->priority = intval($this->priority);
				break;
		}
	}

	/**
	 * Registers the filter hook.
	 *
	 * @since 1.0.0
	 */
	public function register(callable $method, int $arguments = 1): void
	{
		add_filter($this->hook, $method, intval($this->priority), $arguments);
	}
}
