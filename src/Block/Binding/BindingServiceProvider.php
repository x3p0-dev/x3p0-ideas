<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Binding;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class BindingServiceProvider extends ServiceProvider implements Bootable
{
	private const BINDING_SOURCES = [
		Source\Comment::class,
		Source\General::class,
		Source\Media::class,
		Source\Post::class,
		Source\Site::class,
		Source\Superpower::class,
		Source\Theme::class
	];

	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(
			BindingSourceManager::class,
			fn() => new BindingSourceManager(
				$this->container->get(WP_Block_Bindings_Registry::class),
				self::BINDING_SOURCES
			)
		);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(BindingAttributeSupport::class)->boot();
		$this->container->get(BindingSourceManager::class)->boot();
	}
}
