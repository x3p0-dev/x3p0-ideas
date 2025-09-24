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
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|70"
			}
		}
	},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-comments" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__('Comments Container', 'x3p0-ideas') ?>",
			"x3p0/rules":{"rules":[{"type": "if", "callback":"get_comments_number"}]}
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
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				}
			}
		},
		"className":"is-style-section-1 has-bounds-border has-icons"
	} /-->

</div>
<!-- /wp:comments -->
