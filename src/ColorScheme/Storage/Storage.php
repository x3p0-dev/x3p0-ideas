<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme\Storage;

/**
 * Interface for storing and retrieving user color scheme preferences.
 */
interface Storage
{
	/**
	 * Retrieves the stored color scheme, or null if not set.
	 */
	public function get(): ?string;

	/**
	 * Stores the color scheme preference.
	 */
	public function set(string $scheme): bool;
}
