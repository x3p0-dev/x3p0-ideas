<?php

/**
 * Post Content Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use WP_Block;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};
use X3P0\Ideas\Views\Engine;

/**
 * Filters settings and rendered output for the `core/post-content` block.
 */
class PostContent implements Bootable
{
	use Hookable;

	/**
	 * Sets up the object state.
	 */
	public function __construct(protected Engine $views)
	{}

	/**
	 * Boots the component, running its actions/filters.
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filters the post content block when viewing single attachment views
	 * and returns block-based media content.
	 */
	#[Filter('render_block_core/post-content')]
	public function render(
		string $content,
		array $block,
		WP_Block $instance
	): string {
		// Bail early if there's no post ID or not specifically viewing
		// the attachment page for this specific post.
		if (
			empty($instance->context['postId'])
			|| ! is_attachment($instance->context['postId'])
		) {
			return $content;
		}

		// Assign needed data.
		$post_id = absint($instance->context['postId']);
		$data    = [ 'post_id' => $post_id ];

		// Get the media view names.
		$media = $this->attachmentViewNames(
			'media',
			[ 'video', 'audio', 'pdf' ],
			$post_id
		);

		// Renders the media + block content + meta.
		return $this->views->renderIf($media, $data) . $content;
	}

	/**
	 * Returns the rendered attachment partial.
	 */
	private function attachmentViewNames(string $name, array $types, int $post_id): array
	{
		foreach ($types as $type) {
			if (wp_attachment_is($type, $post_id)) {
				return [
					"attachment/{$name}-{$type}",
					"attachment/{$name}"
				];
			}
		}

		return [ "attachment-{$name}" ];
	}
}
