<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class RenderServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(Accordion::class);
		$this->container->singleton(Archives::class);
		$this->container->singleton(Button::class);
		$this->container->singleton(Calendar::class);
		$this->container->singleton(Cover::class);
		$this->container->singleton(File::class);
		$this->container->singleton(Loginout::class);
		$this->container->singleton(Navigation::class);
		$this->container->singleton(PostContent::class);
		$this->container->singleton(PostExcerpt::class);
		$this->container->singleton(PostTimeToRead::class);
		$this->container->singleton(TagCloud::class);
		$this->container->singleton(TemplatePart::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(Accordion::class)->boot();
		$this->container->get(Archives::class)->boot();
		$this->container->get(Button::class)->boot();
		$this->container->get(Calendar::class)->boot();
		$this->container->get(Cover::class)->boot();
		$this->container->get(File::class)->boot();
		$this->container->get(Loginout::class)->boot();
		$this->container->get(Navigation::class)->boot();
		$this->container->get(PostContent::class)->boot();
		$this->container->get(PostExcerpt::class)->boot();
		$this->container->get(PostTimeToRead::class)->boot();
		$this->container->get(TagCloud::class)->boot();
		$this->container->get(TemplatePart::class)->boot();
	}
}
