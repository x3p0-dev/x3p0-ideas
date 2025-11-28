<?php

/**
 * Block render service provider.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class RenderServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * Classes that hook into specific block's rendering process.
	 */
	private const RENDERERS = [
		RenderArchives::class,
		RenderNavigation::class,
		RenderPostExcerpt::class,
		Filters\Accordion::class,
		Filters\Button::class,
		Filters\Calendar::class,
		Filters\Cover::class,
		Filters\File::class,
		Filters\Loginout::class,
		Filters\PostContent::class,
		Filters\PostTimeToRead::class,
		Filters\TagCloud::class,
		Filters\TemplatePart::class
	];

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		foreach (self::RENDERERS as $renderer) {
			$this->container->get($renderer)->boot();
		}
	}
}
