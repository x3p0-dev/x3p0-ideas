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

declare(strict_types=1);

namespace X3P0\Ideas;

use WP;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Filter, Hookable};

class Frontend implements Bootable
{
	use Hookable;

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
	 * @since 1.0.0
	 */
	#[Action('wp_enqueue_scripts')]
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
	 * @since 1.0.0
	 */
	#[Action('parse_request')]
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
	 * @since 1.0.0
	 */
	#[Filter('styles_inline_size_limit')]
	public function filterInlineStylesLimit(int $total_inline_limit): int
	{
		return self::INLINE_CSS_LIMIT > $total_inline_limit
			? self::INLINE_CSS_LIMIT
			: $total_inline_limit;
	}

	/**
	 * Adds the style variation to the body class.
	 *
	 * @since 1.0.0
	 */
	#[Filter('body_class')]
	public function filterBodyClass(array $classes): array
	{
		$variation = wp_get_global_settings([ 'custom', 'variation' ]);

		if (is_string($variation)) {
			$classes[] = esc_attr(sanitize_key("variation-{$variation}"));
		}

		return $classes;
	}

	/**
	 * Replaces the space before the required field indicator with a
	 * non-breaking space. This ensures that the indicator doesn't end up on
	 * a line by itself in the comment form. 😢
	 *
	 * @since 1.0.0
	 */
	#[Filter('wp_required_field_message')]
	public function filterRequiredFieldMessage(string $message): string
	{
		$indicator = wp_required_field_indicator();

		return str_replace(" {$indicator}", "&nbsp;{$indicator}", $message);
	}
}
