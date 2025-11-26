<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class RenderServiceProvider extends ServiceProvider implements Bootable
{
	private const RENDERERS = [
		Accordion::class,
		Archives::class,
		Button::class,
		Calendar::class,
		Cover::class,
		File::class,
		Loginout::class,
		Navigation::class,
		PostContent::class,
		PostExcerpt::class,
		PostTimeToRead::class,
		TagCloud::class,
		TemplatePart::class
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
