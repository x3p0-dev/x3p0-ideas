<?php

declare(strict_types=1);

namespace X3P0\Ideas\View;

use X3P0\Ideas\Framework\Core\ServiceProvider;

final class ViewServiceProvider extends ServiceProvider
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(ViewEngine::class);
	}
}
