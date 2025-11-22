<?php

/**
 * Rule registry.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2009-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-breadcrumbs
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule;

use TypeError;
use X3P0\Ideas\Framework\Contracts\ClassRegistry;

/**
 * Stores the rule classes that can later be instantiated as objects.
 */
final class RuleRegistry implements ClassRegistry
{
	/**
	 * Stores the array of rule classes.
	 */
	protected array $rules = [];

	/**
	 * Allows registering a default set of rule classes.
	 */
	public function __construct(array $rules = [])
	{
		foreach ($rules as $key => $className) {
			$this->register($key, $className);
		}
	}

	/**
	 * Registers a rule class.
	 *
	 * @param class-string<Rule> $className
	 */
	public function register(string $key, string $className): void
	{
		if (! is_subclass_of($className, Rule::class)) {
			throw new TypeError(esc_html(sprintf(
				// Translators: %s is a PHP class name.
				__('Only %s classes can be registered', 'x3p0-ideas'),
				Rule::class
			)));
		}

		$this->rules[$key] = $className;
	}

	/**
	 * Unregisters a rule class.
	 */
	public function unregister(string $key): void
	{
		unset($this->rules[$key]);
	}

	/**
	 * Checks if a rule class is registered.
	 */
	public function isRegistered(string $key): bool
	{
		return isset($this->rules[$key]);
	}

	/**
	 * Returns a rule class string or `null`.
	 *
	 * @return null|class-string<Rule>
	 */
	public function get(string $key): ?string
	{
		return $this->isRegistered($key) ? $this->rules[$key] : null;
	}
}
