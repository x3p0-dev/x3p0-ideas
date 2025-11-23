<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Middleware;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class MiddlewareServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(InjectAttributes::class)->boot();
		$this->container->get(Visibility::class)->boot();
	}
}
