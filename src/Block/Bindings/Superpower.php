<?php

/**
 * Superpower binding class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Bindings;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Tools\Superpower as Super;

/**
 * Handles registering the `x3p0/super` block bindings source and rendering its
 * output based on the given arguments.
 */
class Superpower implements BlockBindingSource
{
	/**
	 * Registers the block binding source.
	 */
	public function register(WP_Block_Bindings_Registry $bindings): void
	{
		$bindings->register('x3p0/superpower', [
			'label'              => __('Superpower', 'x3p0-ideas'),
			'get_value_callback' => [ $this, 'callback' ]
		]);
	}

	/**
	 * Returns the Superpower message.
	 */
	public function callback(array $args): ?string
	{
		return esc_html((new Super())->render($args['type'] ?? ''));
	}
}
