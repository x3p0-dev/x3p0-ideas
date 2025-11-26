<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class RenderServiceProvider extends ServiceProvider implements Bootable
{
	private const RENDERERS = [
		Archives::class,
		Navigation::class,
		PostExcerpt::class,
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
