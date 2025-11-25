<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

use X3P0\Ideas\Framework\Contracts\Bootable;

final class SettingsModifierManager implements Bootable
{
	public function __construct(
		private readonly SettingsModifierRegistry $registry,
		private readonly SettingsModifierFactory $factory
	) {}

	public function boot(): void
	{
		add_filter('block_type_metadata_settings', $this->modify(...), 999999);
	}

	private function modify(array $settings): array
	{
		if (! $settings['name'] || ! $this->registry->isRegistered($settings['name'])) {
			return $settings;
		}

		$modifier = $this->factory->make($settings['name']);

		return $modifier ? $modifier->modify($settings) : $settings;
	}
}
