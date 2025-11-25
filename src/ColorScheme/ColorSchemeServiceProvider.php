<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class ColorSchemeServiceProvider extends ServiceProvider implements Bootable
{
	public function register(): void
	{
		$this->container->singleton(Storage\MetaStorage::class);
		$this->container->singleton(Storage\CookieStorage::class);

		$this->container->singleton(
			ColorSchemeResolver::class,
			fn($container) => new ColorSchemeResolver([
				$container->get(Storage\MetaStorage::class),
				$container->get(Storage\CookieStorage::class)
			])
		);
	}

	public function boot(): void
	{
		$this->container->get(ColorSchemeService::class)->boot();
	}
}
