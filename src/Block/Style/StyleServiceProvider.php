<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Style;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class StyleServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(StyleEngine::class);
		$this->container->singleton(StyleRegistrar::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(StyleEngine::class)->boot();
		$this->container->get(StyleRegistrar::class)->boot();
	}
}
