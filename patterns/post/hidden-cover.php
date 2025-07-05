<?php

/**
 * Title: Post: Cover
 * Slug: x3p0-ideas/post-cover
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:cover {
	"useFeaturedImage":true,
	"isUserOverlayColor":true,
	"minHeight":100,
	"minHeightUnit":"vh",
	"gradient":"45-deg-dark-transparent",
	"tagName":"article",
	"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|70",
				"right":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|70",
				"left":"var:preset|spacing|70"
			}
		}
	},
	"layout":{"type":"constrained"}
} -->
<article class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70);min-height:100vh">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|20"
				}
			},
			"layout":{"type":"default"}
		} -->
		<header class="wp-block-group">

			<!-- wp:post-title {"textAlign":"center","isLink":true} /-->

			<!-- wp:group {
				"layout":{
					"type":"flex",
					"flexWrap":"nowrap",
					"verticalAlignment":"center",
					"justifyContent":"center"
				}
			} -->
			<div class="wp-block-group">
				<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-short"} /-->
			</div>
			<!-- /wp:group -->

		</header>
		<!-- /wp:group -->

	</div>

</article>
<!-- /wp:cover -->
