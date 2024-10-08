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
	 * @since 1.0.0
	 */
	public function callback(array $args, WP_Block $block, string $name): ?string
	{
		return match ($args['key'] ?? null) {
			'copyright' => $this->renderCopyright(),
			'year'      => $this->renderYear(),
			default     => null
		};
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
		return esc_html(wp_date('Y'));
	}
}
