<?php

/**
 * Color scheme service provider.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class ColorSchemeServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(ColorSchemeInteractivity::class);
		$this->container->singleton(ColorSchemeService::class);

		$this->container->singleton(
			ColorSchemeResolver::class,
			fn($container) => new ColorSchemeResolver([
				new Storage\UserMeta(),
				new Storage\Cookie()
			])
		);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(ColorSchemeAssets::class)->boot();
		$this->container->get(ColorSchemeMeta::class)->boot();
	}
}
