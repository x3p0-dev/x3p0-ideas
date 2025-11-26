<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Binding;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class BindingServiceProvider extends ServiceProvider implements Bootable
{
	private const BINDING_SOURCES = [
		Sources\Comment::class,
		Sources\General::class,
		Sources\Media::class,
		Sources\Post::class,
		Sources\Site::class,
		Sources\Superpower::class,
		Sources\Theme::class
	];

	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(
			BindingSourceRegistrar::class,
			fn() => new BindingSourceRegistrar(
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
		$this->container->get(BindingSourceRegistrar::class)->boot();
	}
}
