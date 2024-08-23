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

namespace X3P0\Ideas\Block\Bindings;

use WP_Block;
use WP_Block_Bindings_Registry;
use X3P0\Ideas\Contracts\BlockBindingSource;

class Site implements BlockBindingSource
{
	/**
	 * Map of keys to their associated methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const KEY_METHODS = [
		'copyright' => 'renderCopyright',
		'year'      => 'renderYear'
	];

	/**
	 * Registers the block binding source.
	 *
	 * @since 1.0.0
	 */
	public function register(WP_Block_Bindings_Registry $bindings): void
	{
		$bindings->register('x3p0/site', [
			'label'              => __('Site Data', 'x3p0-ideas'),
			'get_value_callback' => [ $this, 'callback' ]
		]);
	}

	/**
	 * Returns site data based on the bound attribute.
	 *
	 * @since  1.0.0
	 * @return string|null
	 * @todo   Add union return type with PHP 8.0+ requirement.
	 */
	public function callback(array $args, WP_Block $block, string $name)
	{
		if (isset($args['key']) && isset(self::KEY_METHODS[ $args['key'] ])) {
			$method = self::KEY_METHODS[ $args['key'] ];

			return $this->$method($args);
		}

		return null;
	}

	/**
	 * Returns the site copyright statement.
	 *
	 * @since 1.0.0
	 */
	private function renderCopyright(): string
	{
		return esc_html(sprintf(
			// Translators: %s is the current year.
			__('Copyright &copy; %s', 'x3p0-ideas'),
			$this->renderYear()
		));
	}

	/**
	 * Returns the current year.
	 *
	 * @since 1.0.0
	 */
	private function renderYear(): string
	{
		return esc_html(date_i18n('Y'));
	}
}
