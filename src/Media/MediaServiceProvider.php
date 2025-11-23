<?php

declare(strict_types=1);

namespace X3P0\Ideas\Media;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class MediaServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(Emoticons::class)->boot();
		$this->container->get(ImageSizes::class)->boot();
	}
}
