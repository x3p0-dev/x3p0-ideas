<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class SettingsServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(SettingsModifierFactory::class);
		$this->container->singleton(SettingsModifierRegistry::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(SettingsModifierManager::class)->boot();

		SettingsModifierRegistrar::register(
			$this->container->get(SettingsModifierRegistry::class)
		);
	}
}
