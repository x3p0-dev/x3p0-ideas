<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class BlockServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(BlockStylesheets::class)->boot();
	}
}
