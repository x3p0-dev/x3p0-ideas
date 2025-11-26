<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

use TypeError;
use X3P0\Ideas\Block\Settings\Modifier\Modifier;
use X3P0\Ideas\Framework\Contracts\ClassRegistry;

/**
 * Stores the settings modifier classes that can later be instantiated as objects.
 */
final class SettingsModifierRegistry implements ClassRegistry
{
	/**
	 * Stores the array of settings modifier classes.
	 */
	protected array $modifiers = [];

	/**
	 * Registers a settings modifier class.
	 *
	 * @param class-string<Modifier> $className
	 */
	public function register(string $key, string $className): void
	{
		if (! is_subclass_of($className, Modifier::class)) {
			throw new TypeError(esc_html(sprintf(
			// Translators: %s is a PHP class name.
				__('Only %s classes can be registered', 'x3p0-ideas'),
				Modifier::class
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
	 * @return null|class-string<Modifier>
	 */
	public function get(string $key): ?string
	{
		return $this->isRegistered($key) ? $this->modifiers[$key] : null;
	}
}
