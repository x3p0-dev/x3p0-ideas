<?php

declare(strict_types=1);

namespace X3P0\Ideas\Embed;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class EmbedServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(EmbedAssets::class);
		$this->container->singleton(EmbedTemplate::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(EmbedAssets::class)->boot();
		$this->container->get(EmbedTemplate::class)->boot();
	}
}
