<?php

/**
 * Media binding class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Bindings;

use WP_Block;
use X3P0\Ideas\Tools\MediaMeta;

class Media
{
	/**
	 * Stores the post ID.
	 *
	 * @since 1.0.0
	 */
	private int $post_id = 0;

	/**
	 * Stores instances of the `MediaMeta` class by post ID.
	 *
	 * @since 1.0.0
	 */
	private array $meta = [];

	/**
	 * Returns the block bindings source name.
	 *
	 * @since 1.0.0
	 */
	public function name(): string
	{
		return 'x3p0/media';
	}

	/**
	 * Returns the block bindings source label.
	 *
	 * @since 1.0.0
	 */
	public function label(): string
 	{
		return __('Media Data', 'x3p0-ideas');
	}

	/**
	 * Returns the context.
	 *
	 * @since 1.0.0
	 */
	public function usesContext(): array
	{
		return [ 'postType', 'postId' ];
	}

	/**
	 * Returns media data based on the bound attribute.
	 *
	 * @since 1.0.0
	 * @return mixed
	 */
	public function callback(array $args, WP_Block $block, string $name)
	{
		$this->post_id = $block->context['postId'] ?? get_the_ID();

		switch ($name) {
			case 'url':
				return $this->boundUrl($args);
			case 'src':
				return $this->boundSrc();
			case 'alt':
				return $this->boundAlt();
			default:
				return $this->boundMeta($args);
		}
	}

	/**
	 * Returns an attachment source URL.
	 *
	 * @since 1.0.0
	 */
	private function boundUrl(array $args)
	{
		if (isset($args['type']) && 'image' === $args['type']) {
			$image = wp_get_attachment_image_src(
				$this->post_id,
				$args['size'] ?? 'full'
			);

			return is_array($image) ? esc_url($image[0]) : false;
		}

		return $this->boundSrc($args);
	}

	/**
	 * Returns an attachment source URL.
	 *
	 * @since 1.0.0
	 */
	private function boundSrc()
	{
		return esc_url(wp_get_attachment_url($this->post_id));
	}

	/**
	 * Returns an image attachment alt text.
	 *
	 * @since 1.0.0
	 */
	private function boundAlt()
	{
		$alt = get_post_meta($this->post_id, '_wp_attachment_image_alt', true);

		return $alt ? esc_attr($alt) : false;
	}

	/**
	 * Returns an attachment's media metadata based on key.
	 *
	 * @since 1.0.0
	 */
	private function boundMeta(array $args)
	{
		if (! isset($args['key'])) {
			return false;
		}

		$meta = $this->meta[ $this->post_id ] ?? new MediaMeta($this->post_id);

		$data = $meta->render($args['key']);

		// If there's a label, let's wrap it and the metadata in some
		// markup. Basically, this is our way of doing conditionals at
		// the moment.
		if ($data && isset($args['label'])) {
			$data = sprintf(
				'<span class="media-data__label" style="font-weight:500">%s</span>
				<span class="media-data__content has-xs-font-size has-mono-font-family">%s</span>',
				esc_html($args['label']),
				$data
			);
		}

		return $data ?: false;
	}
}
