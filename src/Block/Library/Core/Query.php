<?php

/**
 * Query Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

/**
 * Filters settings and rendered output for the `core/query` block.
 */
class Query implements Bootable
{
	use Hookable;

	/**
	 * Adds spacing support to the Query Loop block and disables
	 * interactivity.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/query' === $settings['name']) {
			$settings['supports']['spacing']             ??= [];
			$settings['supports']['spacing']['blockGap'] ??= true;
			$settings['supports']['spacing']['padding']  ??= true;
		}

		return $settings;
	}

	/**
	 * Disables the enhanced pagination feature for the Query Loop block.
	 * There is currently no `theme.json`-supported method of disabling it,
	 * so the only method is to filter the block data itself before render.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/57623
	 * @link https://developer.wordpress.org/reference/hooks/render_block_data/
	 */
	#[Filter('render_block_data')]
	public function renderData(array $parsed_block): array
	{
		if ('core/query' === $parsed_block['blockName']) {
			$parsed_block['attrs']['enhancedPagination'] = false;
		}

		return $parsed_block;
	}
}
