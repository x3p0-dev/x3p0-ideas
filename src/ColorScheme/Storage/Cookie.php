<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme\Storage;

use X3P0\Ideas\ColorScheme\{ColorSchemeConfig, ColorSchemeStorage};

/**
 * Stores color scheme preference in browser cookies.
 */
final class Cookie implements ColorSchemeStorage
{
	public function get(): ?string
	{
		if (! isset($_COOKIE[ColorSchemeConfig::NAME])) {
			return null;
		}

		$scheme = sanitize_key(wp_unslash($_COOKIE[ColorSchemeConfig::NAME]));

		return ColorSchemeConfig::isValidUserScheme($scheme) ? $scheme : null;
	}
}
