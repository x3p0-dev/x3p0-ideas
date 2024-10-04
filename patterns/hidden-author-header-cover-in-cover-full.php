<?php

/**
 * Title: Author Header: Cover in Cover (Full)
 * Slug: x3p0-ideas/author-header-cover-in-cover-full
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
	"dimRatio":0,
	"isUserOverlayColor":true,
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3"
			}
		}
	},
	"backgroundColor":"neutral-950",
	"layout":{"type":"default"}
} -->
<div class="wp-block-cover has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:cover {
			"dimRatio":80,
			"overlayColor":"black",
			"isUserOverlayColor":true,
			"contentPosition":"center center",
			"style":{
				"spacing":{
					"padding":{
						"top":"var:preset|spacing|plus-5",
						"bottom":"var:preset|spacing|plus-5",
						"left":"var:preset|spacing|plus-5",
						"right":"var:preset|spacing|plus-5"
					},
					"blockGap":"var:preset|spacing|plus-1"
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
			"className":"is-style-global-border",
			"layout":{"type":"constrained"}
		} -->
		<div class="wp-block-cover is-style-global-border has-white-color has-link-color has-text-color" style="padding-top:var(--wp--preset--spacing--plus-5);padding-right:var(--wp--preset--spacing--plus-5);padding-bottom:var(--wp--preset--spacing--plus-5);padding-left:var(--wp--preset--spacing--plus-5)">

			<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-80 has-background-dim"></span>
			<div class="wp-block-cover__inner-container">

				<!-- wp:group {
					"align":"full",
					"style":{
						"spacing":{
							"blockGap":"var:preset|spacing|base",
							"padding":{
								"right":"var:preset|spacing|plus-3",
								"left":"var:preset|spacing|plus-3"
							}
						}
					},
					"layout":{
						"type":"flex",
						"flexWrap":"nowrap",
						"justifyContent":"center"
					}
				} -->
				<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">
					<!-- wp:avatar {"size":64} /-->
					<!-- wp:query-title {
						"type":"archive",
						"showPrefix":false,
						"className":"is-style-text-headline"
					} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-author-biography {
					"metadata":{"@unless":"is_paged"},
					"textAlign": "center"
				} /-->

			</div>

		</div>
		<!-- /wp:cover -->

	</div>
</div>
<!-- /wp:cover -->
