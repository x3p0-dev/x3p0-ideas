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

use WP;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Frontend implements Bootable
{
	use HookAnnotation;

	/**
	 * Inline CSS limit.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
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
	 * When using a paged Query Loop block, WordPress doesn't set the `paged`
	 * query var. So functions like `is_paged()` do not work correctly for
	 * these types of paginated views, and the `paged` body class is missing.
	 * This action checks for that case and sets sets the `paged` query var.
	 *
	 * @hook  parse_request
	 * @since 1.0.0
	 */
	public function parseRequest(WP $wp): void
	{
		$page = $this->getQueryBlockPage();

		if (1 < $page) {
			$wp->query_vars['paged'] = $page;
		}
	}

	/**
	 * Gets the current page number when there's a paginated Query Loop
	 * block. WordPress doesn't have a conditional function for this.
	 *
	 * @since 1.0.0
	 */
	private function getQueryBlockPage(): int
	{
		// Get the URL query for the requested URI.
		$request = isset($_SERVER['REQUEST_URI'])
			? esc_url_raw(wp_unslash($_SERVER['REQUEST_URI']))
			: '';

		$query = wp_parse_url($request, PHP_URL_QUERY);

		// Bail early if this is not a paginated page.
		if (
			! $query
			|| ! str_contains($query, 'query-')
			|| ! str_contains($query, 'page=')
		) {
			return 0;
		}

		// Checks for `?query-page={x}` and `query-{x}-page={y}`.
		preg_match('#query-([0-9]\d*-)?page=([0-9]\d*)#i', $query, $matches);

		return isset($matches[2]) ? absint($matches[2]) : 0;
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
}
