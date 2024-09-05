<?php

/**
 * Title: Comments: Boxed
 * Slug: x3p0-ideas/comments-boxed
 * Keywords: comments, discussion
 * Block Types: core/comments
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:comments {
	"tagName":"section",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-comments">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Comments Container', 'x3p0-ideas') ?>"},
		"className":"has-global-border is-style-section-3",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group has-global-border is-style-section-3">

		<!-- wp:comments-title {
			"showPostTitle":false,
			"fontSize":"xl"
		} /-->

		<!-- wp:comment-template -->
			<!-- wp:pattern {"slug":"x3p0-ideas/comment"} /-->
		<!-- /wp:comment-template -->

		<!-- wp:post-comments-form {"className":"has-icons"} /-->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:comments -->
