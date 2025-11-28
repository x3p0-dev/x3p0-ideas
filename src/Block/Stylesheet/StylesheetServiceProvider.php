<?php

/**
 * Block stylesheet service provider.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Stylesheet;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

class StylesheetServiceProvider extends ServiceProvider implements Bootable
{
	private const STYLESHEETS_PATH = 'public/css/blocks';

	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(
			StylesheetDiscovery::class,
			fn() => new StylesheetDiscovery(self::STYLESHEETS_PATH)
		);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(StylesheetService::class)->boot();
	}
}
