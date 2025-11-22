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

final class ThemeServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * WordPress services that we pass to our classes.
	 * @var class-string[]
	 */
	private const WP_SERVICES = [
		WP_Block_Bindings_Registry::class,
		WP_Block_Type_Registry::class,
		WP_Block_Patterns_Registry::class,
		WP_Block_Pattern_Categories_Registry::class,
		WP_Block_Styles_Registry::class,
	];

	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		foreach (self::WP_SERVICES as $service) {
			/** @var class-string<object> $service */
			$this->container->singleton(
				$service,
				fn() => $service::get_instance()
			);
		}

		$this->container->singleton(ThemeSetup::class);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(ThemeSetup::class)->boot();
	}
}
