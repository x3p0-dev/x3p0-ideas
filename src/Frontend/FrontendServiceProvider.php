<?php

declare(strict_types=1);

namespace X3P0\Ideas\Frontend;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class FrontendServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(FrontendAssets::class)->boot();
		$this->container->get(FrontendTweaks::class)->boot();
	}
}
