<?php

/**
 * Theme binding class.
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
use WP_Query;
use X3P0\Ideas\Contracts\BlockBindingSource;
use X3P0\Ideas\Tools\Superpower;

class Theme implements BlockBindingSource
{
	/**
	 * Map of keys to their associated methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const KEY_METHODS = [
		'name'              => 'renderName',
		'url'               => 'renderUrl',
		'link'              => 'renderLink',
		'superpower'        => 'renderSuperpower',
		'helloDolly'        => 'renderHelloDolly',
		'paginationLabel'   => 'renderPaginationLabel'
	];

	/**
	 * Registers the block binding source.
	 *
	 * @since 1.0.0
	 */
	public function register(WP_Block_Bindings_Registry $bindings): void
	{
		$bindings->register('x3p0/theme', [
			'label'              => __('Theme Data', 'x3p0-ideas'),
			'get_value_callback' => [ $this, 'callback' ],
			'uses_context'       => [ 'queryId', 'query' ]
		]);
	}

	/**
	 * Returns media data based on the bound attribute.
	 *
	 * @since 1.0.0
	 */
	public function callback(array $args, WP_Block $block, string $name): ?string
	{
		if (isset($args['key']) && isset(self::KEY_METHODS[ $args['key'] ])) {
			$method = self::KEY_METHODS[ $args['key'] ];

			return $this->$method($args, $block);
		}

		return null;
	}

	/**
	 * Returns the theme name.
	 *
	 * @since 1.0.0
	 */
	private function renderName(): string
	{
		return esc_html(wp_get_theme(get_template())->display('Name'));
	}

	/**
	 * Returns the theme URL.
	 *
	 * @since 1.0.0
	 */
	private function renderUrl(): string
	{
		$url = wp_get_theme(get_template())->display('ThemeURI');

		return $url ? esc_url($url) : '';
	}

	/**
	 * Returns the theme link.
	 *
	 * @since 1.0.0
	 */
	private function renderLink(): string
	{
		if ($url = $this->renderUrl()) {
			return sprintf(
				'<a href="%s" class="theme-name theme-name--link">%s</a>',
				esc_url($url),
				esc_html($this->renderName())
			);
		}

		return sprintf(
			'<span class="theme-name">%s</span>',
			esc_html($this->renderName())
		);
	}

	/**
	 * Returns a randomly-generated "powered by" message.
	 *
	 * @since 1.0.0
	 */
	private function renderSuperpower(array $args): string
	{
		return esc_html((new Superpower())->text($args['type'] ?? ''));
	}

	/**
	 * Returns a random lyric from the Hello Dolly plugin if available.
	 *
	 * @since 1.0.0
	 */
	private function renderHelloDolly(): ?string
	{
		if (function_exists('hello_dolly_get_lyric')) {
			return esc_html(sprintf(
				// Translators: %s is a lyric from the Hello Dolly plugin.
				__('🎺 🎶 %s', 'x3p0-ideas'),
				hello_dolly_get_lyric()
			));
		}

		return null;
	}

	/**
	 * Returns a pagination label: "Page 00 / 00". This is intended to be
	 * used within the Query Pagination block.
	 *
	 * @since 1.0.0
	 */
	private function renderPaginationLabel(array $args, WP_Block $block): ?string
	{
		// Bail early if there's no query.
		if (! isset($block->context['query'])) {
			return null;
		}

		$query = $block->context['query']['inherit'] ? $GLOBALS['wp_query'] : false;

		// If this is a custom query.
		if (! $query) {
			$key = isset($block->context['queryId'])
				? "query-{$block->context['queryId']}-page"
				: 'query-page';

			$page  = absint($_GET[ $key ] ?? 1);
			$query = new WP_Query(
				build_query_vars_from_query_block($block, $page)
			);

			// Reset the global post data.
			wp_reset_postdata();
		}

		// Get the max number of pages and digit count for padding with
		// leading zeroes.
		$max = $query->max_num_pages;
		$pad = $max !== 0 ? absint(floor(log10($max) + 1)) : 1;

		// Bail if there's no more than one page.
		if (1 >= $max) {
			return null;
		}

		// Get the current page and pad it with leading zeroes to match
		// the max number of pages.
		$page ??= $query->query_vars['paged'] > 0 ? $query->query_vars['paged'] : 1;
		$page = str_pad(strval($page), $pad, "0", STR_PAD_LEFT);

		return sprintf(
			// Translators: 1 is the current page, 2 is the total pages.
			__('Page %1$s / %2$s:', 'x3p0-ideas'),
			esc_html($page), // This is a padded string.
			absint($max)
		);
	}
}
