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
				"top":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3"
			}
		}
	},
	"layout":{"type":"constrained"}
} -->
<article class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:100vh">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|minus-2"
				}
			},
			"layout":{"type":"default"}
		} -->
		<header class="wp-block-group">

			<!-- wp:post-title {"textAlign":"center","isLink":true} /-->

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__('Post Meta', 'x3p0-ideas') ?>"},
				"layout":{
					"type":"flex",
					"flexWrap":"nowrap",
					"verticalAlignment":"center",
					"justifyContent":"center"
				}
			} -->
			<div class="wp-block-group">
				<!-- wp:post-date /-->
			</div>
			<!-- /wp:group -->

		</header>
		<!-- /wp:group -->

	</div>

</article>
<!-- /wp:cover -->
