<?php

/**
 * Abstract render filter.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use LogicException;
use WP_Block;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Abstract base class for block integrations that render blocks.
 */
abstract class RenderFilter implements Bootable
{
	/**
	 * The type of block being filtered. This is used to register the filter
	 * on the `render_block_{BLOCK_TYPE}` hook.
	 */
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
	 * Filter on the block's rendering process.
	 */
	abstract protected function render(string $content, array $block, WP_Block $instance): string;
}
