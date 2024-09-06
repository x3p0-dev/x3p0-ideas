<?php

/**
 * A trait for defining attribute-based actions and filters with class methods.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2008-2024 Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools\HookAttributes;

use ReflectionClass;
use ReflectionMethod;

trait Hookable
{
	/**
	 * Registers any methods with the `Action` and `Filter` attributes as
	 * action and filter hooks.
	 *
	 * @since 1.0.0
	 */
	protected function hookMethods(): void
	{
		// Methods must be public to be used for a hook callback, so
		// we're only grabbing public methods.
		$methods = (new ReflectionClass(self::class))->getMethods(
			ReflectionMethod::IS_PUBLIC
		);

		// Loops through each method and gets any with the `Action` and
		// `Filter` attributes. It then loops through each of those
		// attributes and registers the action/filter.
		foreach ($methods as $method) {

			// Register actions.
			foreach ($method->getAttributes(Action::class) as $attribute) {
				$attribute->newInstance()->register(
					[$this, $method->name],
					$method->getNumberOfParameters()
				);
			}

			// Register filters.
			foreach ($method->getAttributes(Filter::class) as $attribute) {
				$attribute->newInstance()->register(
					[$this, $method->name],
					$method->getNumberOfParameters()
				);
			}
		}
	}
}
