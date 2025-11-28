<?php

/**
 * Settings modifier manager.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

use X3P0\Ideas\Framework\Contracts\Bootable;

final class SettingsModifierManager implements Bootable
{
	/**
	 * Sets up the initial object state.
	 */
	public function __construct(
		private readonly SettingsModifierRegistry $registry,
		private readonly SettingsModifierFactory $factory
	) {}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('block_type_metadata_settings', $this->modify(...), 999999);
	}

	/**
	 * Determines if the given block has a registered settings modifier. If
	 * it does, it runs the modifier's `modify()` method over it.
	 */
	private function modify(array $settings): array
	{
		if (! $settings['name'] || ! $this->registry->isRegistered($settings['name'])) {
			return $settings;
		}

		$modifier = $this->factory->make($settings['name']);

		return $modifier ? $modifier->modify($settings) : $settings;
	}
}
