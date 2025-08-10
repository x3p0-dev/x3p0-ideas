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
			"x3p0Rules":{"rules":[{"type": "if", "callback":"get_comments_number"}]}
		},
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
		"className":"is-style-section-1 has-global-border",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group is-style-section-1 has-global-border" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:comments-title {
			"showPostTitle":false,
			"fontSize":"xl"
		} /-->

		<!-- wp:comment-template -->
			<!-- wp:pattern {"slug":"x3p0-ideas/comment-default"} /-->
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
		"className":"is-style-section-1 has-global-border has-icons"
	} /-->

</div>
<!-- /wp:comments -->
