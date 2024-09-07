<?php

/**
 * A static class for resolving hook attributes.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2008-2024 Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools\Hooks;

use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;
use ReflectionProperty;
use ReflectionAttribute;
use X3P0\Ideas\Contracts\Hook;

class HookResolver
{
	/**
	 * Stores and array of reflection classes.
	 *
	 * @since 1.0.0
	 */
	protected static $reflections = [];

	/**
	 * Returns the reflection class of an object with hook attributes.
	 *
	 * @since 1.0.0
	 */
	protected static function getReflectedInstance(object $hookable): ?ReflectionClass
	{
		$name = $hookable::class;

		if (! isset(static::$reflections[$name])) {
			static::$reflections[$name] = new ReflectionClass($name);
		}

		return static::$reflections[$name];
	}

	/**
	 * Registers constants with attributes that have the `Hook` contract as
	 * anonymous actions or filters.
	 *
	 * @since 1.0.0
	 */
	public static function registerConstants(object $hookable): void
	{
		$ref = static::getReflectedInstance($hookable);

		foreach ($ref->getReflectionConstants() as $constant) {
			foreach (static::getAttributes($constant) as $attribute) {
				$attribute->newInstance()->register(
					fn() => $constant->getValue()
				);
			}
		}
	}

	/**
	 * Registers methods with attributes that have the `Hook` contract as
	 * actions or filters.
	 *
	 * @since 1.0.0
	 */
	public static function registerMethods(object $hookable): void
	{
		$ref = static::getReflectedInstance($hookable);

		// Only grabbing public and non-constructor methods.
		$methods = array_filter(
			$ref->getMethods(ReflectionMethod::IS_PUBLIC),
			fn($method) => ! $method->isConstructor()
		);

		foreach ($methods as $method) {
			foreach (static::getAttributes($method) as $attribute) {
				$attribute->newInstance()->register(
					[$hookable, $method->name],
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
	 * @todo  Remove `setAccessible()` call with PHP 8.1-only support.
	 * @link  https://www.php.net/manual/en/reflectionmethod.setaccessible.php
	 */
	public static function registerProperties(object $hookable): void
	{
		$ref = static::getReflectedInstance($hookable);

		foreach ($ref->getProperties() as $property) {
			foreach (static::getAttributes($property) as $attribute) {
				// Make protected/private property values accessible.
				$property->setAccessible(true);

				$attribute->newInstance()->register(
					fn() => $property->getValue($hookable)
				);
			}
		}
	}

	/**
	 * Returns attributes that have the `Hook` contract for constants,
	 * methods, or properties of a class.
	 *
	 * @since 1.0.0
	 */
	protected static function getAttributes(
		ReflectionClassConstant|ReflectionMethod|ReflectionProperty $member
	): array {
		return $member->getAttributes(
			Hook::class,
			ReflectionAttribute::IS_INSTANCEOF
		);
	}
}
