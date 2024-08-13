<?php

/**
 * Comment binding class.
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
use X3P0\Ideas\Contracts\BlockBindingSource;

class Comment implements BlockBindingSource
{
	/**
	 * Map of keys to their associated methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const KEY_METHODS = [
		'parentLink' => 'boundParentLink'
	];

	/**
	 * Stores the comment ID.
	 *
	 * @since 1.0.0
	 */
	private int $comment_id = 0;

	/**
	 * Registers the block binding source.
	 *
	 * @since 1.0.0
	 */
	public function register(WP_Block_Bindings_Registry $bindings): void
	{
		$bindings->register('x3p0/comment', [
			'label'              => __('Comment Data', 'x3p0-ideas'),
			'get_value_callback' => [ $this, 'callback' ],
			'uses_context'       => [ 'commentId' ]
		]);
	}

	/**
	 * Returns media data based on the bound attribute.
	 *
	 * @since  1.0.0
	 * @return string|null
	 * @todo   Add union return type with PHP 8.0+ requirement.
	 */
	public function callback(array $args, WP_Block $block, string $name)
	{
		$this->comment_id = absint($block->context['commentId'] ?? get_comment_ID());

		if (isset($args['key']) && isset(self::KEY_METHODS[ $args['key'] ])) {
			$method = self::KEY_METHODS[ $args['key'] ];

			return $this->$method($args, $block);
		}

		return null;
	}

	/**
	 * Renders a comment's parent link.
	 *
	 * @since  1.0.0
	 * @return string|null
	 * @todo   Add union return type with PHP 8.0+ requirement.
	 */
	private function boundParentLink(array $args, WP_Block $block)
	{
		if (
			0 >= $this->comment_id
			|| ! get_option('thread_comments')
			|| 3 >= get_option('thread_comments_depth')
			|| 3 > $GLOBALS['comment_depth']
		) {
			return null;
		}

		$parent_id = absint(get_comment($this->comment_id)->comment_parent);

		return sprintf(
			'<a class="comment-parent-link__anchor" href="%s">%s</a>',
			esc_url(get_comment_link($parent_id)),
			esc_html(sprintf(
				__('In reply to %s', 'x3p0-ideas'),
				get_comment_author($parent_id)
			))
		);
	}
}
