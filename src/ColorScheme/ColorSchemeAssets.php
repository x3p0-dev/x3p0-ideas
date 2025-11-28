<?php

/**
 * Color scheme assets.
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
 * Manages color scheme script and style assets.
 */
final class ColorSchemeAssets implements Bootable
{
	/**
	 * Sets up the initial object state.
	 */
	public function __construct(private readonly ColorSchemeResolver $resolver)
	{}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('wp_enqueue_scripts', $this->register(...));
		add_action('enqueue_block_assets', $this->enqueueInlineStyles(...));
	}

	/**
	 * Enqueues assets.
	 */
	public function enqueue(): void
	{
		if (is_user_logged_in()) {
			wp_enqueue_script('wp-api-fetch');
		}

		wp_enqueue_script_module(ColorSchemeConfig::NAME);
	}

	/**
	 * Registers assets.
	 */
	private function register(): void
	{
		$script = include get_parent_theme_file_path('public/js/views/color-scheme.asset.php');

		wp_register_script_module(
			ColorSchemeConfig::NAME,
			get_parent_theme_file_uri('public/js/views/color-scheme.js'),
			$script['dependencies'],
			$script['version']
		);
	}

	/**
	 * Enqueues inline styles. Essentially, we're just dynamically setting
	 * the color scheme for the root element.
	 */
	private function enqueueInlineStyles(): void
	{
		$css = sprintf(
			':root {color-scheme: %s;}',
			esc_attr($this->resolver->getCurrentScheme())
		);

		wp_register_style(ColorSchemeConfig::NAME, false);
		wp_add_inline_style(ColorSchemeConfig::NAME, $css);
		wp_enqueue_style(ColorSchemeConfig::NAME);
	}
}
