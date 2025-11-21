<?php

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Bindings_Registry;
use WP_Block_Pattern_Categories_Registry;
use WP_Block_Patterns_Registry;
use WP_Block_Styles_Registry;
use WP_Block_Type_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;
use X3P0\Ideas\Pattern\PatternRegistrar;

final class ThemeServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		// WP services.
		$this->container->singleton(
			WP_Block_Bindings_Registry::class,
			fn() => WP_Block_Bindings_Registry::get_instance()
		);
		$this->container->singleton(
			WP_Block_Type_Registry::class,
			fn() => WP_Block_Type_Registry::get_instance()
		);
		$this->container->singleton(
			WP_Block_Patterns_Registry::class,
			fn() => WP_Block_Patterns_Registry::get_instance()
		);
		$this->container->singleton(
			WP_Block_Pattern_Categories_Registry::class,
			fn() => WP_Block_Pattern_Categories_Registry::get_instance()
		);
		$this->container->singleton(
			WP_Block_Styles_Registry::class,
			fn() => WP_Block_Styles_Registry::get_instance()
		);
		// End WP service provider.

		$this->container->singleton(Editor::class);
		$this->container->singleton(Embeds::class);
		$this->container->singleton(Frontend::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(Editor::class)->boot();
		$this->container->get(Embeds::class)->boot();
		$this->container->get(Frontend::class)->boot();
	}
}
