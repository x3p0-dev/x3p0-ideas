<?php

/**
 * Comment Content Block class.
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
 * Filters settings and rendered output for the `core/comment-content` block.
 */
class CommentContent implements Bootable
{
	use Hookable;

	/**
	 * Boots the component, running its actions/filters.
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Adds layout and block gap support to the Comment Content block.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/comment-content' === $settings['name']) {
			$settings['supports']['layout'] ??= true;

			$settings['supports']['spacing']             ??= [];
			$settings['supports']['spacing']['blockGap'] ??= true;
		}

		return $settings;
	}
}
