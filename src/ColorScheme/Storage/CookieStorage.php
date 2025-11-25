<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme\Storage;

use X3P0\Ideas\ColorScheme\ColorSchemeConfig;

/**
 * Stores color scheme preference in browser cookies.
 */
final class CookieStorage implements Storage
{
	public function get(): ?string
	{
		if (! isset($_COOKIE[ColorSchemeConfig::NAME])) {
			return null;
		}

		$scheme = sanitize_key(wp_unslash($_COOKIE[ColorSchemeConfig::NAME]));

		return ColorSchemeConfig::isValidUserScheme($scheme) ? $scheme : null;
	}

	public function set(string $scheme): bool
	{
		// Cookie setting happens client-side via JavaScript
		// This method exists for interface compliance
		return true;
	}
}
