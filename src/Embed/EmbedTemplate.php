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

namespace X3P0\Ideas\Embed;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Actions and filters wrapper for when a site's post is embedded in a post/page
 * on a third-party website.
 */
final class EmbedTemplate implements Bootable
{
	/**
	 * Maximum number of words in the excerpt.
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const EXCERPT_LENGTH = 24;

	/**
	 * Image shape to use for featured images (`rectangular` or `square`).
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const IMAGE_SHAPE = 'rectangular';

	/**
	 * Image size to use for featured images.
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const IMAGE_SIZE = 'x3p0-wide';

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('excerpt_length', $this->excerptLength(...));
		add_filter('excerpt_more', $this->excerptMore(...), 999999);
		add_filter('embed_thumbnail_image_shape', $this->imageShape(...));
		add_filter('embed_thumbnail_image_size', $this->imageSize(...));
		add_filter('embed_site_title_html', $this->siteTitleHtml(...));
	}

	/**
	 * Adds a custom excerpt length.
	 */
	private function excerptLength(int $number): int
	{
		return is_embed() ? self::EXCERPT_LENGTH : $number;
	}

	/**
	 * Adds a custom excerpt more string.
	 */
	private function excerptMore(string $more_string): string
	{
		return is_embed() ? '&thinsp;&hellip;' : $more_string;
	}

	/**
	 * Sets a custom embed image shape.
	 */
	private function imageShape(string $shape): string
	{
		return self::IMAGE_SHAPE;
	}

	/**
	 * Sets a custom embed image size.
	 */
	private function imageSize(string $size): string
	{
		return self::IMAGE_SIZE;
	}

	/**
	 * Overwrites the embed site title HTML if the site doesn't have a custom
	 * icon. We do this to replace the WordPress logo with an SVG version
	 * that is more customizable via CSS.
	 */
	private function siteTitleHtml(string $site_title): string
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
