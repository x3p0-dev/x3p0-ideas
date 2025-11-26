<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme\Storage;

use X3P0\Ideas\ColorScheme\ColorSchemeConfig;

/**
 * Stores color scheme preference in user meta.
 */
final class MetaStorage implements Storage
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

	public function set(string $scheme): bool
	{
		if (! is_user_logged_in() || ! ColorSchemeConfig::isValidUserScheme($scheme)) {
			return false;
		}

		return (bool) update_user_meta(
			get_current_user_id(),
			ColorSchemeConfig::NAME,
			$scheme
		);
	}
}
