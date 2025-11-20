<?php

declare(strict_types=1);

namespace X3P0\Ideas\Views;

use X3P0\Ideas\Framework\Core\ServiceProvider;

final class ViewServiceProvider extends ServiceProvider
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(Engine::class);
	}
}
