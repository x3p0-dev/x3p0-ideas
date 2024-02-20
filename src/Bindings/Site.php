<?php

/**
 * Site binding class.
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

class Site implements BindingsSource
{
	/**
	 * Map of keys to their associated methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const KEY_METHODS = [
		'copyright' => 'boundCopyright',
		'year'      => 'boundYear'
	];

	/**
	 * Returns the name of the bindings source.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function name(): string
	{
		return 'x3p0/site';
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
			'label'              => __('Site Data', 'x3p0-ideas'),
			'get_value_callback' => [ $this, 'callback' ]
		];
	}

	/**
	 * Returns site data based on the bound attribute.
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
	 * Returns the site copyright statement.
	 *
	 * @since 1.0.0
	 */
	private function boundCopyright(): string
	{
		return esc_html(sprintf(
			// Translators: %s is the current year.
			__('Copyright &copy; %s', 'x3p0-ideas'),
			$this->boundYear()
		));
	}

	/**
	 * Returns the current year.
	 *
	 * @since 1.0.0
	 */
	private function boundYear(): string
	{
		return esc_html(date_i18n('Y'));
	}
}
