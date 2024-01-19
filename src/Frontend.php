<?php

/**
 * The Frontend class handles actions and filters that are needed for running on
 * the frontend of a website.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Helpers;
use X3P0\Ideas\Tools\HookAnnotation;

class Frontend implements Bootable
{
	use HookAnnotation;

	/**
	 * Inline CSS limit.
	 *
	 * @since 1.0.0
	 * @todo  Add `int` type with PHP 8.3-only support.
	 */
	protected const INLINE_CSS_LIMIT = 50000;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();

		// Disable the emoji script.
		remove_action('wp_head', 'print_emoji_detection_script', 7);
	}

	/**
	 * Enqueue scripts/styles for the front end.
	 *
	 * @hook  wp_enqueue_scripts
	 * @since 1.0.0
	 */
	public function enqueueAssets(): void
	{
		$asset = include get_parent_theme_file_path('public/css/screen.asset.php');

		// Loads the primary stylesheet.
		wp_enqueue_style(
			'x3p0-ideas-style',
			get_parent_theme_file_uri('public/css/screen.css'),
			$asset['dependencies'],
			$asset['version']
		);
	}

	/**
	 * Custom inline CSS size limit.
	 *
	 * @hook styles_inline_size_limit
	 * @since 1.0.0
	 */
	public function filterInlineStylesLimit(int $total_inline_limit): int
	{
		return self::INLINE_CSS_LIMIT > $total_inline_limit
			? self::INLINE_CSS_LIMIT
			: $total_inline_limit;
	}

	/**
	 * Filter the body class.
	 *
	 * @hook  body_class
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/body_class/
	 */
	public function filterBodyClass(array $classes): array
	{
		if (Helpers::isPagedQueryBlock() && ! in_array('paged', $classes, true)) {
			$classes[] = 'paged';
		}

		return $classes;
	}
}
