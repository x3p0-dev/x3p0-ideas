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

namespace X3P0\Ideas\Block\Binding\Sources;

use WP_Block;
use X3P0\Ideas\Block\Binding\BindingSource;

/**
 * Handles registering the `x3p0/media` block bindings source and rendering its
 * output based on the given arguments.
 */
final class Media extends BindingSource
{
	protected const NAME = 'x3p0/media';

	/**
	 * Stores the post ID.
	 */
	private int $post_id = 0;

	/**
	 * @inheritDoc
	 */
	public function getLabel(): string
	{
		return __('Media Data', 'x3p0-ideas');
	}

	/**
	 * @inheritDoc
	 */
	public function usesContext(): array
	{
		return ['postType', 'postId'];
	}

	/**
	 * @inheritDoc
	 */
	public function callback(array $args, WP_Block $block, string $name): string|int|null
	{
		$this->post_id = $block->context['postId'] ?? get_the_ID();

		// If no key is explicitly passed in, use the attribute name.
		$args['key'] ??= $name;

		return match ($args['key']) {
			'alt'        => $this->renderAlt(),
			'caption'    => $this->renderCaption(),
			'id'         => $this->post_id,
			'src', 'url' => $this->renderUrl($args),
			'title'      => $this->renderTitle(),
			default      => null
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
}
