<?php

/**
 * Color scheme meta registrar.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Registers user meta for storing color scheme preferences.
 */
final class ColorSchemeMeta implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('init', $this->register(...));
	}

	/**
	 * Registers user meta for storing the color scheme.
	 */
	private function register(): void
	{
		register_meta('user', ColorSchemeConfig::NAME, [
			'label'             => __('Color Scheme', 'x3p0-ideas'),
			'description'       => __('Stores the preferred color scheme for the site.', 'x3p0-ideas'),
			'default'           => '',
			'sanitize_callback' => $this->sanitize(...),
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string'
		]);
	}

	/**
	 * Sanitizes a color scheme using whitelist validation.
	 */
	private function sanitize(string $value): string
	{
		return ColorSchemeConfig::isValidUserScheme($value) ? $value : '';
	}
}
