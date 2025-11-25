<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use LogicException;
use WP_Block;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Abstract base class for block integrations that render blocks.
 */
abstract class RendersBlock implements Bootable
{
	protected const BLOCK_TYPE = '';

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		if (static::BLOCK_TYPE === '') {
			throw new LogicException(sprintf(
				// Translators: %s is a PHP classname.
				__('%s must define the BLOCK_TYPE constant', 'x3p0-ideas'),
				static::class
			));
		}

		add_filter('render_block_' . static::BLOCK_TYPE, $this->render(...), 999999, 3);
	}

	/**
	 * Renders the block content.
	 */
	abstract protected function render(string $content, array $block, WP_Block $instance): string;
}
