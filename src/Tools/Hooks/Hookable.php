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

namespace X3P0\Ideas\Tools\Hooks;

use ReflectionClass;
use ReflectionMethod;
use ReflectionAttribute;
use X3P0\Ideas\Contracts\Hook;

trait Hookable
{
	/**
	 * Registers any methods with the attributes with the `Hook` contract as
	 * actions or filters.
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

		// Filter out constructor methods.
		$methods = array_filter($methods, fn($method) => ! $method->isConstructor());

		// Loops through each method and gets attributes that match the
		// `Hook` contract. It then loops through each of those
		// attributes, registering them as actions or filters.
		foreach ($methods as $method) {
			$attributes = $method->getAttributes(
				Hook::class,
				ReflectionAttribute::IS_INSTANCEOF
			);

			foreach ($attributes as $attribute) {
				$attribute->newInstance()->register(
					[$this, $method->name],
					$method->getNumberOfParameters()
				);
			}
		}
	}
}
