<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class ColorSchemeServiceProvider extends ServiceProvider implements Bootable
{
	public function register(): void
	{
		$this->container->singleton(Storage\UserMeta::class);
		$this->container->singleton(Storage\Cookie::class);

		$this->container->singleton(
			ColorSchemeResolver::class,
			fn($container) => new ColorSchemeResolver([
				$container->get(Storage\UserMeta::class),
				$container->get(Storage\Cookie::class)
			])
		);
	}

	public function boot(): void
	{
		$this->container->get(ColorSchemeService::class)->boot();
	}
}
