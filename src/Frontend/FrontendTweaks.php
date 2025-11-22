<?php

/**
 * Frontend Tweaks class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Frontend;

use WP;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles WordPress query variable fixes and modifications.
 */
final class FrontendTweaks implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('parse_request', $this->parseRequest(...));
		add_filter('wp_required_field_message', $this->requiredFieldMessage(...));
	}

	/**
	 * When using a paged Query Loop block, WordPress doesn't set the `paged`
	 * query var. So functions like `is_paged()` do not work correctly for
	 * these types of paginated views, and the `paged` body class is missing.
	 * This action checks for that case and sets the `paged` query var.
	 */
	private function parseRequest(WP $wp): void
	{
		$page = $this->getQueryBlockPage();

		if (1 < $page) {
			$wp->query_vars['paged'] = $page;
		}
	}

	/**
	 * Gets the current page number when there's a paginated Query Loop
	 * block. WordPress doesn't have a conditional function for this.
	 */
	private function getQueryBlockPage(): int
	{
		// Get the URL query for the requested URI.
		$query = wp_parse_url(esc_url_raw(add_query_arg([])), PHP_URL_QUERY);

		// Bail early if this is not a paginated page.
		if (
			! $query
			|| ! str_contains($query, 'query-')
			|| ! str_contains($query, 'page=')
		) {
			return 0;
		}

		// Checks for `?query-page={x}` and `query-{x}-page={y}`.
		preg_match('#query-(\d+-)?page=(\d+)#', $query, $matches);

		return isset($matches[2]) ? absint($matches[2]) : 0;
	}

	/**
	 * Replaces the space before the required field indicator with a
	 * non-breaking space. This ensures that the indicator doesn't end up on
	 * a line by itself in the comment form. 😢
	 */
	private function requiredFieldMessage(string $message): string
	{
		$indicator = wp_required_field_indicator();

		return str_replace(" {$indicator}", "&nbsp;{$indicator}", $message);
	}
}
