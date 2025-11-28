<?php

/**
 * Color scheme storage.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

/**
 * Interface for retrieving color scheme preferences.
 */
interface ColorSchemeStorage
{
	/**
	 * Retrieves the stored color scheme, or null if not set.
	 */
	public function get(): ?string;
}
