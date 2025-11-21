<?php

declare(strict_types=1);

namespace X3P0\Ideas\Media;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles custom image size registration and configuration.
 */
final class ImageSizes implements Bootable
{
	/**
	 * Default image size.
	 */
	protected const DEFAULT_SIZE = 'x3p0-wide';

	/**
	 * Width size to scale large images down to.
	 */
	protected const THRESHOLD_WIDTH = 3480;

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('init', $this->register(...));
		add_filter('image_size_names_choose', $this->registerNames(...));
		add_filter('big_image_size_threshold', $this->filterBigImageThreshold(...));
		add_filter('post_thumbnail_size', $this->filterPostThumbnailSize(...));
	}

	/**
	 * Registers custom image sizes.
	 */
	private function register(): void
	{
		add_image_size('x3p0-square',   1024, 1024, true);
		add_image_size('x3p0-wide',     2048, 1152, true);
		add_image_size('x3p0-portrait', 1024, 1365, true);
	}

	/**
	 * Filters the image size dropdown in the editor so our custom sizes
	 * appear for selection.
	 */
	private function registerNames(array $sizes): array
	{
		return [
			...$sizes,
			'x3p0-square'   => __('Square', 'x3p0-ideas'),
			'x3p0-wide'     => __('Wide', 'x3p0-ideas'),
			'x3p0-portrait' => __('Portrait', 'x3p0-ideas')
		];
	}

	/**
	 * Limit the big image threshold to our largest image unless the
	 * threshold is larger.
	 */
	private function filterBigImageThreshold(int $threshold): int
	{
		return max(self::THRESHOLD_WIDTH, $threshold);
	}

	/**
	 * Sets the default `post-thumbnail` size to a theme-specific size.
	 */
	private function filterPostThumbnailSize(string|array $size): string|array
	{
		return 'post-thumbnail' === $size ? self::DEFAULT_SIZE : $size;
	}
}
