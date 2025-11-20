<?php

declare(strict_types=1);

namespace X3P0\Ideas\Template;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class TemplateServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(Parts::class);
		$this->container->singleton(Templates::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(Parts::class)->boot();
		$this->container->get(Templates::class)->boot();
	}
}
