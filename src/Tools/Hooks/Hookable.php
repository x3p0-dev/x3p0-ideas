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

use ReflectionAttribute;
use ReflectionClass;
use ReflectionMethod;
use X3P0\Ideas\Contracts\Hook;

trait Hookable
{
	/**
	 * Stores the instance of the reflected class.
	 *
	 * @since 1.0.0
	 */
	protected ReflectionClass $reflector;

	/**
	 * Returns the reflection of the current class.
	 *
	 * @since 1.0.0
	 */
	protected function getReflector(): ReflectionClass
	{
		if (! isset($this->reflector)) {
			$this->reflector = new ReflectionClass($this);
		}

		return $this->reflector;
	}

	/**
	 * Adds all class members with attributes that have the `Hook` contract
	 * as actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookMembers(): void
	{
		$this->hookMethods();
		$this->hookProperties();
		$this->hookConstants();
	}

	/**
	 * Adds constants with attributes that have the `Hook` contract as
	 * anonymous actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookConstants(): void
	{
		foreach ($this->getReflector()->getReflectionConstants() as $constant) {
			$attributes = $constant->getAttributes(
				Hook::class,
				ReflectionAttribute::IS_INSTANCEOF
			);

			foreach ($attributes as $attribute) {
				$attribute->newInstance()->register(
					fn() => $constant->getValue()
				);
			}
		}
	}

	/**
	 * Adds methods with attributes that have the `Hook` contract as actions
	 * or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookMethods(): void
	{
		// Only grabbing public and non-constructor methods.
		$methods = array_filter(
			$this->getReflector()->getMethods(ReflectionMethod::IS_PUBLIC),
			fn($method) => ! $method->isConstructor()
		);

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

	/**
	 * Adds properties with attributes that have the `Hook` contract as
	 * anonymous actions or filters.
	 *
	 * @since 1.0.0
	 * @todo  Remove `setAccessible()` call with PHP 8.1-only support.
	 * @link  https://www.php.net/manual/en/reflectionmethod.setaccessible.php
	 */
	protected function hookProperties(): void
	{
		foreach ($this->getReflector()->getProperties() as $property) {
			$attributes = $property->getAttributes(
				Hook::class,
				ReflectionAttribute::IS_INSTANCEOF
			);

			foreach ($attributes as $attribute) {
				// Make protected/private property values accessible.
				$property->setAccessible(true);

				$attribute->newInstance()->register(
					fn() => $property->getValue($this)
				);
			}
		}
	}
}
