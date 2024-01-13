<?php
/**
 * Embed filters and actions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Embeds implements Bootable
{
	use HookAnnotation;

	/**
	 * Image size to use for featured images.
	 *
	 * @since 1.0.0
	 * @todo  Add `string` type with PHP 8.3-only support.
	 */
	protected const IMAGE_SIZE = 'x3p0-21x9-lg';

	/**
	 * Image shape to use for featured images (`rectangular` or `square`).
	 *
	 * @since 1.0.0
	 * @todo  Add `string` type with PHP 8.3-only support.
	 */
	protected const IMAGE_SHAPE = 'rectangular';

	/**
	 * Maximum number of words in the excerpt.
	 *
	 * @since 1.0.0
	 * @todo  Add `int` type with PHP 8.3-only support.
	 */
	protected const EXCERPT_LENGTH = 24;

	/**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Loads assets needed for the embed.
	 *
	 * @hook  enqueue_embed_scripts
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/enqueue_embed_scripts/
	 */
	public function enqueueAssets(): void
	{
		$embed_styles = file_get_contents( get_parent_theme_file_path( 'public/css/embed.css' ) );

		// Register empty stylesheet so that our inline styles can
		// piggyback off of it. Use the core `wp-embed-template` style
		// as a dependency so that our styles will load afterward. We
		// cannot add our inline styles directly to it due to the way
		// that its own inline styles are loaded (no way to add ours
		// after it's been enqueued).
		wp_register_style( 'x3p0-ideas-embed', false, [ 'wp-embed-template' ] );

		// Add inline styles.
		wp_add_inline_style( 'x3p0-ideas-embed', wp_get_global_stylesheet() );
		wp_add_inline_style( 'x3p0-ideas-embed', $embed_styles );

		// Enqueue embed style.
		wp_enqueue_style( 'x3p0-ideas-embed' );
	}

	/**
	 * Replaces the default size with our custom image size.
	 *
	 * @hook  embed_thumbnail_image_size
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/embed_thumbnail_image_size/
	 */
	public function filterImageSize(): string
	{
		return self::IMAGE_SIZE;
	}

	/**
	 * Ensures that the featured image shape is set to match our size. This
	 * also affects how the embed is laid out.
	 *
	 * @hook  embed_thumbnail_image_shape
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/embed_thumbnail_image_shape/
	 */
	public function filterImageShape(): string
	{
		return self::IMAGE_SHAPE;
	}

	/**
	 * Adds a custom excerpt length.
	 *
	 * @hook excerpt_length
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/excerpt_length/
	 */
	public function filterExcerptLength( int $number ): int
	{
		return is_embed() ? self::EXCERPT_LENGTH : $number;
	}

	/**
	 * Adds a custom excerpt more string.
	 *
	 * @hook  excerpt_more last
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/excerpt_more/
	 */
	public function filterExcerptMore( string $more_string ): string
	{
		return is_embed() ? '&thinsp;&hellip;' : $more_string;
	}

	/**
	 * Overwrites the embed site title HTML if the site doesn't have a custom
	 * icon. We do this to replace the WordPress logo with an SVG version
	 * that is more customizable via CSS.
	 *
	 * @hook  embed_site_title_html
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/embed_site_title_html/
	 */
	public function filterSiteTitleHtml( string $site_title ): string
	{
		// Bail if the site has an icon.
		if ( get_site_icon_url() ) {
			return $site_title;
		}

		// https://github.com/WordPress/gutenberg/blob/trunk/packages/icons/src/library/wordpress.js
		$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" width="48" height="48" aria-hidden="true" focusable="false"><path d="M20 10c0-5.51-4.49-10-10-10C4.48 0 0 4.49 0 10c0 5.52 4.48 10 10 10 5.51 0 10-4.48 10-10zM7.78 15.37L4.37 6.22c.55-.02 1.17-.08 1.17-.08.5-.06.44-1.13-.06-1.11 0 0-1.45.11-2.37.11-.18 0-.37 0-.58-.01C4.12 2.69 6.87 1.11 10 1.11c2.33 0 4.45.87 6.05 2.34-.68-.11-1.65.39-1.65 1.58 0 .74.45 1.36.9 2.1.35.61.55 1.36.55 2.46 0 1.49-1.4 5-1.4 5l-3.03-8.37c.54-.02.82-.17.82-.17.5-.05.44-1.25-.06-1.22 0 0-1.44.12-2.38.12-.87 0-2.33-.12-2.33-.12-.5-.03-.56 1.2-.06 1.22l.92.08 1.26 3.41zM17.41 10c.24-.64.74-1.87.43-4.25.7 1.29 1.05 2.71 1.05 4.25 0 3.29-1.73 6.24-4.4 7.78.97-2.59 1.94-5.2 2.92-7.78zM6.1 18.09C3.12 16.65 1.11 13.53 1.11 10c0-1.3.23-2.48.72-3.59C3.25 10.3 4.67 14.2 6.1 18.09zm4.03-6.63l2.58 6.98c-.86.29-1.76.45-2.71.45-.79 0-1.57-.11-2.29-.33.81-2.38 1.62-4.74 2.42-7.1z"></path></svg>';

		return sprintf(
			'<div class="wp-embed-site-title">
				<a href="%s" target="_top">%s<span>%s</span></a>
			</div>',
			esc_url( home_url() ),
			$icon,
			esc_html( get_bloginfo( 'name' ) )
		);
	}
}
