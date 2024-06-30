<?php

/**
 * Title: Comments: Default
 * Slug: x3p0-ideas/comments-default
 * Keywords: comments, discussion
 * Block Types: core/comments
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:comments {"tagName":"section"} -->
<section class="wp-block-comments">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Comments Container', 'x3p0-ideas') ?>"},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group">

		<!-- wp:comments-title {"showPostTitle":false} /-->

		<!-- wp:comment-template -->

			<!-- wp:pattern {"slug":"x3p0-ideas/comment"} /-->

		<!-- /wp:comment-template -->

		<?php if (get_option('page_comments')) : ?>

			<!-- wp:comments-pagination {
				"paginationArrow":"arrow",
				"layout":{
					"type":"flex",
					"justifyContent":"space-between"
				}
			} -->
				<!-- wp:comments-pagination-previous /-->
				<!-- wp:comments-pagination-numbers /-->
				<!-- wp:comments-pagination-next /-->
			<!-- /wp:comments-pagination -->

		<?php endif ?>

		<!-- wp:post-comments-form {"className":"is-style-icons"} /-->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:comments -->
