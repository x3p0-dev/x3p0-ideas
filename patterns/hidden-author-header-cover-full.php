<?php

/**
 * Title: Author Header: Cover (Full)
 * Slug: x3p0-ideas/author-header-cover-full
 * Inserter: no
 * Categories: x3p0-layout
 * Viewport Width: 1376
 * Block Types: core/template-part/author-header
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:cover {
	"metadata":{"name":"<?= esc_attr__('Author Header Content', 'x3p0-ideas') ?>"},
	"useFeaturedImage":true,
	"isUserOverlayColor":true,
	"minHeightUnit":"rem",
	"gradient":"45-deg-dark-transparent",
	"contentPosition":"bottom left",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-5",
				"bottom":"var:preset|spacing|plus-5",
				"left":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3"
			}
		},
		"elements":{
			"link":{
				"color":{
					"text":"var:preset|color|white"
				}
			}
		}
	},
	"textColor":"white",
	"backgroundColor":"neutral-950",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left has-white-color has-link-color has-text-color has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--plus-5);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-5);padding-left:var(--wp--preset--spacing--plus-3)">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:spacer {"height":"var:preset|spacing|plus-8"} -->
		<div style="height:var(--wp--preset--spacing--plus-8)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|base"},"dimensions":{"minHeight":""}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:query-title {
				"type":"archive",
				"showPrefix":false,
				"className":"is-style-text-headline"
			} /-->

			<!-- wp:post-author-biography /-->
		</div>
		<!-- /wp:group -->

	</div>

</div>
<!-- /wp:cover -->
