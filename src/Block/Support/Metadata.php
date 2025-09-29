<?php

/**
 * Block metadata trait.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Support;

/**
 * The Metadata trait makes it easy to get or check specific metadata defined
 * via a block's `metadata` attribute.
 */
trait Metadata
{
	/**
	 * Returns a block's meta value by key.
	 */
	protected function getMetaValue(array $block, string $key): mixed
	{
		return $this->hasMetaValue($block, $key)
			? $block['attrs']['metadata'][$key]
			: null;
	}

	/**
	 * Checks if a block meta value exists by key.
	 */
	protected function hasMetaValue(array $block, string $key): bool
	{
		return isset($block['attrs']['metadata'][$key]);
	}
}
