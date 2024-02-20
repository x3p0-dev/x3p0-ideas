<?php

/**
 * Theme binding class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Bindings;

use WP_Block;
use X3P0\Ideas\Contracts\BindingsSource;
use X3P0\Ideas\Tools\Superpower;

class Theme implements BindingsSource
{
	/**
	 * Returns the name of the bindings source.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function name(): string
	{
		return 'x3p0/theme';
	}

	/**
	 * Returns the bindings source registration arguments.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function options(): array
	{
		return [
			'label'              => __('Theme Data', 'x3p0-ideas'),
			'get_value_callback' => [ $this, 'callback' ]
		];
	}

	/**
	 * Returns media data based on the bound attribute.
	 *
	 * @since  1.0.0
	 * @return string|false
	 * @todo   Add union return type with PHP 8.0+ requirement.
	 */
	public function callback(array $args, WP_Block $block, string $name)
	{
		$args['key'] ??= '';

		switch ($args['key']) {
			case 'superpower':
				return $this->superpower($args);
			default:
				return '';
		}
	}

	/**
	 * Returns an attachment source URL.
	 *
	 * @since  1.0.0
	 * @return string|false
	 * @todo   Add union return type with PHP 8.0+ requirement.
	 */
	private function superpower(array $args)
	{
		return esc_html((new Superpower())->text($args['type'] ?? ''));
	}
}
