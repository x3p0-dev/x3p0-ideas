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
	public function boot(): void
	{
		$this->container->get(TemplatePartAreaRegistrar::class)->boot();
		$this->container->get(TemplateRegistrar::class)->boot();
	}
}
