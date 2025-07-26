<?php

/**
 * The Render class handles filters on block rendering.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

class Render implements Bootable
{
	use Hookable;

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(protected Rules $rules)
	{}

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filters block content, determining if it should be shown according to
	 * any rules passed in via attributes.
	 *
	 * @since 1.0.0
	 */
	#[Filter('render_block', 'last')]
	public function renderByRule(
		string $content,
		array $block,
		WP_Block $instance
	): string {
		return $this->rules->isPublic($block, $instance) ? $content : '';
	}
}
