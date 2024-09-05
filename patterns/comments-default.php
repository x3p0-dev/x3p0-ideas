<?php

/**
 * Title: Comments: Default
 * Slug: x3p0-ideas/comments-default
 * Keywords: comments, discussion
 * Block Types: core/comments, core/template-part/comments
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:comments {"layout":{"type":"constrained"}} -->
<div class="wp-block-comments">

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__('Comments Container', 'x3p0-ideas') ?>",
			"@if":"get_comments_number"
		},
		"className":"is-style-section-3 has-global-border",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group is-style-section-3 has-global-border">

		<!-- wp:comments-title {
			"showPostTitle":false,
			"fontSize":"xl"
		} /-->

		<!-- wp:comment-template -->
			<!-- wp:pattern {"slug":"x3p0-ideas/comment"} /-->
		<!-- /wp:comment-template -->

	</div>
	<!-- /wp:group -->

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

	<!-- wp:post-comments-form {
		"className":"is-style-section-3 has-global-border has-icons"
	} /-->

</div>
<!-- /wp:comments -->
