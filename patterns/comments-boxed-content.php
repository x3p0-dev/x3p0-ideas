<?php

/**
 * Title: Comments: Boxed Content
 * Slug: x3p0-ideas/comments-boxed-content
 * Keywords: comments, discussion
 * Block Types: core/comments, core/template-part/comments
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
		"metadata":{
			"name":"<?= esc_attr__('Comments Container', 'x3p0-ideas') ?>",
			"@if":"get_comments_number"
		}
	} -->
	<div class="wp-block-group">
		<!-- wp:comments-title {
			"showPostTitle":false,
			"fontSize":"xl"
		} /-->

		<!-- wp:comment-template -->
			<!-- wp:pattern {"slug":"x3p0-ideas/comment-boxed-content"} /-->
		<!-- /wp:comment-template -->

	</div>
	<!-- /wp:group -->

	<!-- wp:post-comments-form {
		"className":"is-style-section-3 has-global-border has-icons"
	} /-->

</section>
<!-- /wp:comments -->
