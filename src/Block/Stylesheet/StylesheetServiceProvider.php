<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Stylesheet;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

class StylesheetServiceProvider extends ServiceProvider implements Bootable
{
	private const STYLESHEETS_PATH = 'public/css/blocks';

	public function register(): void
	{
		$this->container->singleton(
			StylesheetDiscovery::class,
			fn() => new StylesheetDiscovery(self::STYLESHEETS_PATH)
		);
	}

	public function boot(): void
	{
		$this->container->get(StylesheetService::class)->boot();
	}
}
