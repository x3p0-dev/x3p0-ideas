<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

/**
 * Interface for retrieving user color scheme preferences.
 */
interface ColorSchemeStorage
{
	/**
	 * Retrieves the stored color scheme, or null if not set.
	 */
	public function get(): ?string;
}
