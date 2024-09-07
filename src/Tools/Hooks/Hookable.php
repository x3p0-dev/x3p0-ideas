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
	 * Stores the instance of the reflection class.
	 *
	 * @since 1.0.0
	 */
	protected ReflectionClass $reflection;

	/**
	 * Returns the reflected class instance.
	 *
	 * @since 1.0.0
	 */
	protected function reflection(): ReflectionClass
	{
		if (! isset($this->reflection)) {
			$this->reflection = new ReflectionClass(self::class);
		}

		return $this->reflection;
	}

	/**
	 * Registers all class members with attributes that have the `Hook`
	 * contract as actions or filters.
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
	 * Registers methods with attributes that have the `Hook` contract as
	 * actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookMethods(): void
	{
		// Methods must be public to be used for a hook callback, so
		// we're only grabbing public methods. We also filter out
		// constructor methods.
		$methods = array_filter(
			$this->reflection()->getMethods(ReflectionMethod::IS_PUBLIC),
			fn($method) => ! $method->isConstructor()
		);

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

	/**
	 * Registers properties with attributes that have the `Hook` contract as
	 * anonymous actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookProperties(): void
	{
		// Loops through each property and gets attributes with the
		// `Hook` contract. It then loops through each of those
		// attributes, registering them as actions or filters.
		foreach ($this->reflection()->getProperties() as $property) {
			$attributes = $property->getAttributes(
				Hook::class,
				ReflectionAttribute::IS_INSTANCEOF
			);

			foreach ($attributes as $attribute) {
				// @todo Remove (unnecessary) with PHP 8.1-only support.
				$property->setAccessible(true);

				$attribute->newInstance()->register(
					fn() => $property->getValue($this)
				);
			}
		}
	}

	/**
	 * Registers constants with attributes that have the `Hook` contract as
	 * anonymous actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookConstants(): void
	{
		// Loops through each constant and gets attributes with the
		// `Hook` contract. It then loops through each of those
		// attributes, registering them as actions or filters.
		foreach ($this->reflection()->getReflectionConstants() as $constant) {
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
}
