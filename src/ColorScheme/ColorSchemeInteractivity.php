<?php

/**
 * Color scheme interactivity handler.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

/**
 * Manages Interactivity API state for color scheme switching.
 */
final class ColorSchemeInteractivity
{
	/**
	 * Sets up the initial object state.
	 */
	public function __construct(
		private readonly ColorSchemeResolver $resolver,
		private readonly ColorSchemeAssets $assets
	) {}

	/**
	 * Helper function for enabling interactivity and enqueuing assets. Note
	 * that assets are necessary for making interactive elements.
	 */
	public function enable(): void
	{
		$this->setState();
		$this->assets->enqueue();
	}

	/**
	 * Sets the interactivity state.
	 */
	private function setState(): void
	{
		wp_interactivity_state(ColorSchemeConfig::INTERACTIVE_STORE, [
			'colorScheme'       => $this->resolver->getCurrentScheme(),
			'isDark'            => $this->resolver->isDark(),
			'userId'            => get_current_user_id(),
			'name'              => ColorSchemeConfig::NAME,
			'switchableSchemes' => ColorSchemeConfig::SWITCHABLE_SCHEMES,
			'cookiePath'        => COOKIEPATH,
			'cookieDomain'      => COOKIE_DOMAIN
		]);
	}
}
