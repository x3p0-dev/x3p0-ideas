<?php

/**
 * Media binding class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Bindings;

use WP_Block;
use WP_Block_Bindings_Registry;
use X3P0\Ideas\Contracts\BlockBindingSource;
use X3P0\Ideas\Tools\MediaMeta;

/**
 * Handles registering the `x3p0/media` block bindings source and rendering its
 * output based on the given arguments.
 */
class Media implements BlockBindingSource
{
	/**
	 * Stores the post ID.
	 */
	private int $post_id = 0;

	/**
	 * Stores instances of the `MediaMeta` class by post ID.
	 *
	 * @var MediaMeta[]
	 */
	private array $meta = [];

	/**
	 * Registers the block binding source.
	 */
	public function register(WP_Block_Bindings_Registry $bindings): void
	{
		$bindings->register('x3p0/media', [
			'label'              => __('Media Data', 'x3p0-ideas'),
			'uses_context'       => [ 'postType', 'postId'],
			'get_value_callback' => [ $this, 'callback' ]
		]);
	}

	/**
	 * Returns media data based on the bound attribute.
	 */
	public function callback(array $args, WP_Block $block, string $name): string|int|null
	{
		$this->post_id = $block->context['postId'] ?? get_the_ID();

		// If no key is explicitly passed in, use the attribute name.
		$args['key'] ??= $name;

		return match ($args['key']) {
			'alt'        => $this->renderAlt($args),
			'caption'    => $this->renderCaption($args),
			'id'         => $this->post_id,
			'src', 'url' => $this->renderUrl($args),
			'title'      => esc_html(wp_strip_all_tags(get_the_title($this->post_id))),
			default      => $this->renderMeta($args)
		};
	}

	/**
	 * Renders the attachment title.
	 */
	private function renderTitle(): ?string
	{
		$title = get_the_title($this->post_id);

		return $title ? esc_html(wp_strip_all_tags($title)) : null;
	}

	/**
	 * Returns an attachment source URL.
	 */
	private function renderUrl(array $args): ?string
	{
		if (isset($args['type']) && 'image' === $args['type']) {
			$image = wp_get_attachment_image_src(
				$this->post_id,
				$args['size'] ?? 'full'
			);

			return is_array($image) ? esc_url($image[0]) : null;
		}

		$url = wp_get_attachment_url($this->post_id);

		return $url ? esc_url($url) : null;
	}

	/**
	 * Returns an image attachment alt text.
	 */
	private function renderAlt(): ?string
	{
		$alt = get_post_meta($this->post_id, '_wp_attachment_image_alt', true);

		return $alt ? esc_attr($alt) : null;
	}

	/**
	 * Returns an image attachment alt text.
	 */
	private function renderCaption(): ?string
	{
		$caption = wp_get_attachment_caption($this->post_id);

		return $caption ? esc_html($caption) : null;
	}

	/**
	 * Returns an attachment's media metadata based on key.
	 */
	private function renderMeta(array $args): ?string
	{
		$this->meta[ $this->post_id ] ??= new MediaMeta(get_post($this->post_id));

		$data = $this->meta[ $this->post_id ]->render($args['key']);

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

		return $data ?: null;
	}
}
