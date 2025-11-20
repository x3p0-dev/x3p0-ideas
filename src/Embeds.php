<?php

/**
 * Embeds class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Filter, Hookable};

/**
 * Actions and filters wrapper for when a site's post is embedded in a post/page
 * on a third-party website.
 */
class Embeds implements Bootable
{
	use Hookable;

	/**
	 * Maximum number of words in the excerpt.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	protected const EXCERPT_LENGTH = 24;

	/**
	 * Image shape to use for featured images (`rectangular` or `square`).
	 *
	 * @link https://developer.wordpress.org/reference/hooks/embed_thumbnail_image_shape/
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	#[Filter('embed_thumbnail_image_shape')]
	protected const IMAGE_SHAPE = 'rectangular';

	/**
	 * Image size to use for featured images.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/embed_thumbnail_image_size/
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	#[Filter('embed_thumbnail_image_size')]
	protected const IMAGE_SIZE = 'x3p0-wide';

	/**
	 * Loads assets needed for the embed.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/enqueue_embed_scripts/
	 */
	#[Action('enqueue_embed_scripts')]
	public function enqueueAssets(): void
	{
		$embed_styles = file_get_contents(get_parent_theme_file_path('public/css/embed.css'));
		$style_asset  = include get_parent_theme_file_path('public/css/embed.asset.php');

		// Register empty stylesheet so that our inline styles can
		// piggyback off of it. Use the core `wp-embed-template` style
		// as a dependency so that our styles will load afterward. We
		// cannot add our inline styles directly to it due to the way
		// that its own inline styles are loaded (no way to add ours
		// after it's been enqueued).
		wp_register_style(
			'x3p0-ideas-embed',
			false,
			[ 'wp-embed-template' ],
			$style_asset['version']
		);

		// Add inline styles.
		wp_add_inline_style('x3p0-ideas-embed', wp_get_global_stylesheet());
		wp_add_inline_style('x3p0-ideas-embed', $embed_styles);

		// Enqueue embed style.
		wp_enqueue_style('x3p0-ideas-embed');
	}

	/**
	 * Adds a custom excerpt length.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
	 */
	#[Filter('excerpt_length')]
	public function filterExcerptLength(int $number): int
	{
		return is_embed() ? self::EXCERPT_LENGTH : $number;
	}

	/**
	 * Adds a custom excerpt more string.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
	 */
	#[Filter('excerpt_more', 'last')]
	public function filterExcerptMore(string $more_string): string
	{
		return is_embed() ? '&thinsp;&hellip;' : $more_string;
	}

	/**
	 * Overwrites the embed site title HTML if the site doesn't have a custom
	 * icon. We do this to replace the WordPress logo with an SVG version
	 * that is more customizable via CSS.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/embed_site_title_html/
	 */
	#[Filter('embed_site_title_html')]
	public function filterSiteTitleHtml(string $site_title): string
	{
		// Bail if the site has an icon.
		if (get_site_icon_url()) {
			return $site_title;
		}

		return sprintf(
			'<div class="wp-embed-site-title">
				<a href="%s" target="_top">%s<span>%s</span></a>
			</div>',
			esc_url(home_url()),
			// phpcs:ignore WordPress.WP.CapitalPDangit
			block_core_social_link_get_icon('wordpress'),
			esc_html(get_bloginfo('name'))
		);
	}
}
