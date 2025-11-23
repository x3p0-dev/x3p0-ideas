<?php

declare(strict_types=1);

namespace X3P0\Ideas\Editor;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class EditorServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(EditorAssets::class)->boot();
		$this->container->get(EditorSettings::class)->boot();
	}
}
