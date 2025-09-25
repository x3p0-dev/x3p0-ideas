<?php

/**
 * Query Pagination Block class.
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
 * Filters settings and rendered output for the `core/query-pagination` block.
 */
class QueryPagination implements Bootable
{
	use Hookable;

	/**
	 * Adds support for Paragraphs to the Query Pagination block. This is
	 * specifically needed for binding a pagination label. Also adds spacing
	 * support.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/query-pagination' === $settings['name']) {
			$settings['allowed_blocks'][] = 'core/paragraph';

			$settings['supports']['spacing']            ??= [];
			$settings['supports']['spacing']['margin']  ??= [ 'top', 'bottom' ];
			$settings['supports']['spacing']['padding'] ??= true;
		}

		return $settings;
	}
}
