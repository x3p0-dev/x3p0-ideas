<?php

/**
 * Color scheme resolver.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

/**
 * Resolves the current color scheme from multiple sources.
 */
final class ColorSchemeResolver
{
	/**
	 * Sets up the initial object state.
	 *
	 * @param ColorSchemeStorage[] $storages Priority-ordered storage implementations
	 */
	public function __construct(private readonly array $storages = [])
	{}

	/**
	 * Gets the current color scheme (user preference or global default).
	 */
	public function getCurrentScheme(): string
	{
		// Try user preferences first (in priority order)
		foreach ($this->storages as $storage) {
			if ($scheme = $storage->get()) {
				return $scheme;
			}
		}

		// Fall back to global scheme
		return $this->getGlobalScheme();
	}

	/**
	 * Gets the global color scheme from theme.json.
	 *
	 * Note that the method checks for both `colorScheme` and `color-scheme`
	 * because WordPress has not processed property names at this point,
	 * converting them to their hyphenated versions. So either is valid.
	 */
	public function getGlobalScheme(): string
	{
		$scheme = wp_get_global_settings(['custom', 'colorScheme']);

		if (! is_string($scheme)) {
			$scheme = wp_get_global_settings(['custom', 'color-scheme']);
		}

		return is_string($scheme) && ColorSchemeConfig::isValidGlobalScheme($scheme)
			? $scheme
			: ColorSchemeConfig::DEFAULT_SCHEME;
	}

	/**
	 * Determines if the current scheme is dark. If unable to determine
	 * whether it is light or dark, the function returns null.
	 */
	public function isDark(): ?bool
	{
		$scheme = $this->getCurrentScheme();

		if (ColorSchemeConfig::isDark($scheme)) {
			return true;
		}

		if (ColorSchemeConfig::isLight($scheme)) {
			return false;
		}

		return null;
	}

	/**
	 * Determines if the global scheme is switchable.
	 */
	public function isSwitchable(): bool
	{
		return ColorSchemeConfig::isSwitchable($this->getGlobalScheme());
	}
}
