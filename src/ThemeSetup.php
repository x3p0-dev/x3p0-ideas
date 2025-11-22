<?php

/**
 * Theme setup class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles theme setup and feature registration.
 */
final class ThemeSetup implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('after_setup_theme', $this->setup(...));
	}

	/**
	 * Adds theme support for various WordPress features.
	 */
	private function setup(): void
	{
		// Adds support for the View Transitions plugin.
		// @link https://wordpress.org/plugins/view-transitions/
		add_theme_support('view-transitions', [
			'default-animation' => 'fade'
		]);
	}
}
