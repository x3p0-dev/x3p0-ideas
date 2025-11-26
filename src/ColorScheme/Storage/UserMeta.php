<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme\Storage;

use X3P0\Ideas\ColorScheme\{ColorSchemeConfig, ColorSchemeStorage};

/**
 * Stores color scheme preference in user meta.
 */
final class UserMeta implements ColorSchemeStorage
{
	public function get(): ?string
	{
		if (! is_user_logged_in()) {
			return null;
		}

		$scheme = get_user_meta(get_current_user_id(), ColorSchemeConfig::NAME, true);

		return $scheme && ColorSchemeConfig::isValidUserScheme($scheme)
			? $scheme
			: null;
	}
}
