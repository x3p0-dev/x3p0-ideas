<?php

/**
 * Frontend Assets class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Frontend;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles frontend asset loading and configuration.
 */
final class FrontendAssets implements Bootable
{
	/**
	 * Inline CSS limit.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	protected const INLINE_CSS_LIMIT = 50000;

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('wp_enqueue_scripts', $this->enqueue(...));
		add_filter('styles_inline_size_limit', $this->inlineStylesLimit(...));

		// Disable the emoji script.
		remove_action('wp_head', 'print_emoji_detection_script', 7);
	}

	/**
	 * Enqueue scripts/styles for the front end.
	 */
	private function enqueue(): void
	{
		$screen_style = include get_parent_theme_file_path('public/css/screen.asset.php');

		// Loads the primary stylesheet.
		wp_enqueue_style(
			'x3p0-ideas-style',
			get_parent_theme_file_uri('public/css/screen.css'),
			$screen_style['dependencies'],
			$screen_style['version']
		);

		// Add path data so the stylesheet can potentially be inlined.
		wp_style_add_data(
			'x3p0-ideas-style',
			'path',
			get_parent_theme_file_path('public/css/screen.css')
		);
	}

	/**
	 * Custom inline CSS size limit.
	 */
	private function inlineStylesLimit(int $total_inline_limit): int
	{
		return max(self::INLINE_CSS_LIMIT, $total_inline_limit);
	}
}
