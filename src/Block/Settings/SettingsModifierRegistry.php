<?php

/**
 * Settings modifier registry.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

use TypeError;
use X3P0\Ideas\Framework\Contracts\ClassRegistry;

/**
 * Stores the settings modifier classes that can later be instantiated as objects.
 */
final class SettingsModifierRegistry implements ClassRegistry
{
	/**
	 * Stores the array of settings modifier classnames.
	 */
	protected array $modifiers = [];

	/**
	 * Registers a settings modifier class.
	 *
	 * @param class-string<SettingsModifier> $className
	 */
	public function register(string $key, string $className): void
	{
		if (! is_subclass_of($className, SettingsModifier::class)) {
			throw new TypeError(esc_html(sprintf(
				// Translators: %s is a PHP class name.
				__('Only %s classes can be registered', 'x3p0-ideas'),
				SettingsModifier::class
			)));
		}

		$this->modifiers[$key] = $className;
	}

	/**
	 * Unregisters a settings modifier class.
	 */
	public function unregister(string $key): void
	{
		unset($this->modifiers[$key]);
	}

	/**
	 * Checks if a settings modifier class is registered.
	 */
	public function isRegistered(string $key): bool
	{
		return isset($this->modifiers[$key]);
	}

	/**
	 * Returns a settings modifier class string or `null`.
	 *
	 * @return null|class-string<SettingsModifier>
	 */
	public function get(string $key): ?string
	{
		return $this->isRegistered($key) ? $this->modifiers[$key] : null;
	}
}
