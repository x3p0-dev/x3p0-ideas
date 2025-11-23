<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class RuleServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(RuleEngine::class);
		$this->container->singleton(RuleFactory::class);
		$this->container->singleton(RuleRegistry::class);
		$this->container->singleton(RuleRepository::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		RuleRegistrar::register($this->container->get(RuleRegistry::class));
	}
}
