<?php
/**
 * Block-related filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
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
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Disables the enhanced pagination feature for the Query Loop block.
	 * There is currently no `theme.json`-supported method of disabling it,
	 * so the only method is to filter the block data itself before render.
	 * @link  https://github.com/WordPress/gutenberg/issues/57623
	 *
	 * @hook  render_block_data
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/render_block_data/
	 */
	public function renderCoreQueryData( array $parsed_block ): array
	{
		if ( 'core/query' === $parsed_block['blockName'] ) {
			$parsed_block['attrs']['enhancedPagination'] = false;
		}

		return $parsed_block;
	}

	/**
	 * Filters block content.
	 *
	 * @hook  render_block  last
	 * @since 1.0.0
	 */
	public function renderBlockByDirective(
		string $block_content,
		array $block
	): string {
		return $this->directives->isPublic( $block )
		       ? $block_content
		       : '';
	}

	/**
	 * Really hacky method to replace the arrows in the calendar to match
	 * the theme's arrows.
	 *
	 * @hook  render_block
	 * @since 1.0.0
	 */
	public function renderCoreCalendar(
		string $block_content,
		array $block
	): string {
		if ( 'core/calendar' !== $block['blockName'] ) {
			return $block_content;
		}

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
	 * @hook  render_block
	 * @since 1.0.0
	 */
	public function renderCorePostContent(
		string $block_content,
		array $block,
		WP_Block $instance
	): string {
		// Bail early if there's no post ID or not specifically viewing
		// the attachment page for this specific post.
		if (
			'core/post-content' !== $block['blockName']
			|| empty( $instance->context['postId'] )
			|| ! is_attachment( $instance->context['postId'] )
		) {
			return $block_content;
		}

		// Set up some default variables.
		$partials = [];
		$html     = '';

		// Checks if the attachment is one of supported types and sets
		// the filename based on that type.
		foreach ( [ 'image', 'video', 'audio'] as $type ) {
			if ( wp_attachment_is( $type, $instance->context['postId'] ) ) {
				$partials[] = "public/partials/attachment-media-{$type}.php";
				break;
			}
		}

		// Add fallback partial template.
		$partials[] = 'public/partials/attachment-media.php';

		// Gets a partial (essentially a dynamic pattern) based on the
		// attachment type. Must be valid block content.
		ob_start();
		locate_template( $partials, true, false, [
			'post_id' => $instance->context['postId']
		] );
		$media = ob_get_clean();

		// Parse and render the blocks.
		foreach ( parse_blocks( $media ) as $media_block ) {
			$html .= render_block( $media_block );
		}

		return $html . $block_content;
	}
}
