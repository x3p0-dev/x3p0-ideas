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
use X3P0\Ideas\Contracts\BlockBindingsSource;
use X3P0\Ideas\Tools\Superpower;

class Theme implements BlockBindingsSource
{
	/**
	 * Map of keys to their associated methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const KEY_METHODS = [
		'name'       => 'boundName',
		'url'        => 'boundUrl',
		'link'       => 'boundLink',
		'superpower' => 'boundSuperpower',
		'helloDolly' => 'boundHelloDolly'
	];

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
		if (isset($args['key']) && isset(self::KEY_METHODS[ $args['key'] ])) {
			$method = self::KEY_METHODS[ $args['key'] ];

			return $this->$method($args);
		}

		return false;
	}

	/**
	 * Returns the theme name.
	 *
	 * @since 1.0.0
	 */
	private function boundName(): string
	{
		return esc_html(wp_get_theme(get_template())->display('Name'));
	}

	/**
	 * Returns the theme URL.
	 *
	 * @since 1.0.0
	 */
	private function boundUrl(): string
	{
		$url = wp_get_theme(get_template())->display('ThemeURI');

		return $url ? esc_url($url) : '';
	}

	/**
	 * Returns the theme link.
	 *
	 * @since 1.0.0
	 */
	private function boundLink(): string
	{
		if ($url = $this->boundUrl()) {
			return sprintf(
				'<a href="%s" class="theme-name theme-name--link">%s</a>',
				esc_url($url),
				esc_html($this->boundName())
			);
		}

		return sprintf(
			'<span class="theme-name">%s</span>',
			esc_html($this->boundName())
		);
	}

	/**
	 * Returns a randomly-generated "powered by" message.
	 *
	 * @since 1.0.0
	 */
	private function boundSuperpower(array $args): string
	{
		return esc_html((new Superpower())->text($args['type'] ?? ''));
	}

	/**
	 * Returns a random lyric from the Hello Dolly plugin if available.
	 *
	 * @since 1.0.0
	 */
	private function boundHelloDolly(): string
	{
		if (function_exists('hello_dolly_get_lyric')) {
			return esc_html(sprintf(
				// Translators: %s is a lyric from the Hello Dolly plugin.
				__('🎺 🎶 %s', 'x3p0-ideas'),
				hello_dolly_get_lyric()
			));
		}

		return '';
	}
}
