<?php

/**
 * Settings modifier factory.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

final class SettingsModifierFactory
{
	/**
	 * Sets up the initial object state.
	 */
	public function __construct(private readonly SettingsModifierRegistry $registry)
	{}

	/**
	 * Creates new settings modifier objects.
	 */
	public function make(string $blockName): ?SettingsModifier
	{
		if ($modifier = $this->registry->get($blockName)) {
			return new $modifier;
		}

		return null;
	}
}
