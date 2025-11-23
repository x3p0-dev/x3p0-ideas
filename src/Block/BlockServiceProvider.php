<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class BlockServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(BlockStylesheets::class);
		$this->container->singleton(Support\ColorScheme::class);
		$this->container->singleton(Support\HtmlAttributes::class);

		// TODO: Create binding source registry and factory.
		$this->container->singleton(
			Bindings\Component::class,
			fn() => new Bindings\Component(
				$this->container->get(WP_Block_Bindings_Registry::class),
				[
					Bindings\Comment::class,
					Bindings\General::class,
					Bindings\Media::class,
					Bindings\Post::class,
					Bindings\Site::class,
					Bindings\Superpower::class,
					Bindings\Theme::class
				]
			)
		);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(BlockStylesheets::class)->boot();
		$this->container->get(Bindings\Component::class)->boot();
		$this->container->get(Support\ColorScheme::class)->boot();
	}
}
