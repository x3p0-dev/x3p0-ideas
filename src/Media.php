<?php
/**
 * Media filters and actions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Media implements Bootable
{
	use HookAnnotation;

	/**
	 * Width size to scale large images down to.
	 *
	 * @since 1.0.0
	 * @todo  Add `int` type with PHP 8.3-only support.
	 */
	protected const THRESHOLD_WIDTH = 3480;

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
	 * Registers custom image sizes.
	 *
	 * @hook  init
	 * @since 1.0.0
	 */
	public function registerImageSizes(): void
	{
		add_image_size( 'x3p0-16x9-lg', 2048, 1152, true );
		add_image_size( 'x3p0-21x9-lg', 2048,  864, true );
		add_image_size( 'x3p0-9x16-md', 1024, 1820, true );
		add_image_size( 'x3p0-3x4-md',  1024, 1365, true );
		add_image_size( 'x3p0-1x1-md',  1024, 1024, true );
	}

	/**
	 * Filters the image size dropdown in the editor so our custom sizes
	 * appear for selection.
	 *
	 * @hook  image_size_names_choose
	 * @since 1.0.0
	 */
	public function registerImageSizeNames( array $sizes ): array
	{
		$sizes['x3p0-16x9-lg'] = __( '16:9 (Landscape)', 'x3p0-ideas' );
		$sizes['x3p0-21x9-lg'] = __( '21:9 (Landscape)', 'x3p0-ideas' );
		$sizes['x3p0-9x16-md'] = __( '9:16 (Portrait)',  'x3p0-ideas' );
		$sizes['x3p0-3x4-md']  = __( '3:4 (Portrait)',   'x3p0-ideas' );
		$sizes['x3p0-1x1-md']  = __( '1:1 (Square)',     'x3p0-ideas' );

		return $sizes;
	}

	/**
	 * Limit the big image threshold to our largest image.
	 *
	 * @hook  big_image_size_threshold 5
	 * @since 1.0.0
	 */
	public function filterBigImageThreshold( int $threshold ): int
	{
		return self::THRESHOLD_WIDTH > $threshold
		       ? self::THRESHOLD_WIDTH
		       : $threshold;
	}

	/**
	 * Sets the default `post-thumbnail` size to a theme-specific size.
	 *
	 * @hook  post_thumbnail_size 5
	 * @since 1.0.0
	 */
	public function filterPostThumbnailSize( string $size ): string
	{
		return 'post-thumbnail' === $size ? 'x3p0-16x9-lg' : $size;
	}
}
