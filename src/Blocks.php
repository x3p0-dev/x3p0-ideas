<?php
/**
 * Block-related filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use WP_Block;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\BlockDirectives;
use X3P0\Ideas\Tools\HookAnnotation;

class Blocks implements Bootable
{
	use HookAnnotation;

	/**
	 * Instance of block directives, which is used to determine whether to
	 * show a block.
	 *
	 * @since 1.0.0
	 * @todo  Move to constructor with PHP 8-only support.
	 */
	protected BlockDirectives $directives;

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct( BlockDirectives $directives )
	{
		$this->directives = $directives;
	}

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filters block content.
	 *
	 * @hook  render_block
	 * @since 1.0.0
	 */
	public function renderBlock(
		string $block_content,
		array $block,
		WP_Block $instance
	): string
	{
		// Check if the block can be shown.
		if ( ! $this->directives->isPublic( $block ) ) {
			return '';
		}

		// Custom block handling.
		if ( 'core/calendar' === $block['blockName'] ) {
			return $this->coreCalendar( $block_content );
		} elseif ( 'core/post-content' === $block['blockName'] ) {
			return $this->corePostContent( $block_content, $block, $instance );
		}

		return $block_content;
	}

	/**
	 * Really hacky method to replace the arrows in the calendar to match
	 * the theme's arrows.
	 *
	 * @since 1.0.0
	 */
	private function coreCalendar( string $block_content ): string
	{
		return str_replace(
			[ '&raquo;', '&laquo;' ],
			[ '&rarr;',  '&larr;'  ],
			$block_content
		);
	}

	/**
	 * Filters the post content block when viewing single attachment views
	 * and returns block-based media content.
	 *
	 * @since 1.0.0
	 */
	private function corePostContent(
		string $block_content,
		array $block,
		WP_Block $instance
	): string
	{
		// Bail early if there's no post ID.
		if ( empty( $instance->context['postId'] ) ) {
			return $block_content;
		}

		// Get the post object.
		$post = get_post( $instance->context['postId'] );

		// Bail if we're not specifically viewing the attachment page
		// for this specific post.
		if ( 'attachment' !== $post->post_type || ! is_attachment( $post->ID ) ) {
			return $block_content;
		}

		// Set up some default variables.
		$filename = 'file';
		$html     = '';

		// Checks if the attachment is one of supported types and sets
		// the filename based on that type.
		foreach ( [ 'image', 'video', 'audio'] as $type ) {
			if ( wp_attachment_is( $type, $post ) ) {
				$filename = $type;
				break;
			}
		}

		// Gets a partial (essentially a dynamic pattern) based on the
		// attachment type. Must be valid block content.
		ob_start();
		include get_parent_theme_file_path( "public/partials/attachment-media-{$filename}.php" );
		$media = ob_get_clean();

		// Parse and render the blocks.
		foreach ( parse_blocks( $media ) as $media_block ) {
			$html .= render_block( $media_block );
		}

		return $html . $block_content;
	}
}
