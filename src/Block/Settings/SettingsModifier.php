<?php

/**
 * Settings modifier interface.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

/**
 * Defines the contract for settings modifiers, which should have a single
 * `modify()` method for altering a block's metadata settings.
 */
interface SettingsModifier
{
	/**
	 * Modifies the block settings.
	 */
	public function modify(array $settings): array;
}
