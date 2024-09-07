<?php
/**
 * The action attribute class is for registering class methods as an action on a
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

#[Attribute(
	Attribute::IS_REPEATABLE
	| Attribute::TARGET_CLASS_CONSTANT
	| Attribute::TARGET_METHOD
	| Attribute::TARGET_PROPERTY
)]
class Action extends Filter
{
	/**
	 * Registers the action hook.
	 *
	 * @since 1.0.0
	 */
	public function register(callable $method, int $arguments = 1): void
	{
		add_action($this->hook, $method, intval($this->priority), $arguments);
	}
}
