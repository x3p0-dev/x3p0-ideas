<?php

/**
 * Title: Comments: Boxed
 * Slug: x3p0-ideas/comments-boxed
 * Keywords: comments, discussion
 * Block Types: core/comments, core/template-part/comments
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:comments {
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-comments">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Comments Container', 'x3p0-ideas') ?>"},
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"right":"var:preset|spacing|70",
					"left":"var:preset|spacing|70"
				}
			}
		},
		"className":"has-bounds-border is-style-section-1",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group has-bounds-border is-style-section-1" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:comments-title {
			"showPostTitle":false,
			"fontSize":"xl"
		} /-->

		<!-- wp:comment-template -->
			<!-- wp:pattern {"slug":"x3p0-ideas/comment-default"} /-->
		<!-- /wp:comment-template -->

		<!-- wp:post-comments-form {"className":"has-icons"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:comments -->
