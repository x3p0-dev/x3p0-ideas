<?php

/**
 * Navigation block render service.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Filters rendered output for the `core/navigation` block.
 */
final class RenderNavigation implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('block_core_navigation_listable_blocks', $this->listableBlocks(...));
	}

	/**
	 * Adds missing wrapping `<li>` to the Loginout block when used in a
	 * navigation menu.
	 *
	 * @link https://github.com/WordPress/gutenberg/pull/55551
	 */
	private function listableBlocks(array $blocks): array
	{
		return array_merge($blocks, [
			'core/buttons',
			'core/loginout'
		]);
	}
}
