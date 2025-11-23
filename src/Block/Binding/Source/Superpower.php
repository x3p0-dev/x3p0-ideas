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

namespace X3P0\Ideas\Block\Binding\Source;

use WP_Block;
use X3P0\Ideas\Block\Binding\BindingSource;
use X3P0\Ideas\Tools\Superpower as Super;

/**
 * Handles registering the `x3p0/super` block bindings source and rendering its
 * output based on the given arguments.
 */
class Superpower implements BindingSource
{
	public function getName(): string
	{
		return 'x3p0/superpower';
	}

	public function getLabel(): string
	{
		return __('Superpower', 'x3p0-ideas');
	}

	public function getContext(): array
	{
		return [];
	}

	/**
	 * Returns the Superpower message.
	 */
	public function callback(array $args, WP_Block $block, string $name): ?string
	{
		return esc_html((new Super())->render($args['type'] ?? ''));
	}
}
