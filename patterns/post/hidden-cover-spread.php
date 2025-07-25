<?php

/**
 * Title: Post: Cover (Spread)
 * Slug: x3p0-ideas/post-cover-spread
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:cover {
	"useFeaturedImage":true,
	"isUserOverlayColor":true,
	"minHeightUnit":"rem",
	"gradient":"45-deg-dark-transparent",
	"contentPosition":"center center",
	"tagName":"article",
	"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|70",
				"right":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|70",
				"left":"var:preset|spacing|70"
			}
		},
		"dimensions":{
			"aspectRatio":"3/4"
		}
	},
	"className":"is-style-cover-stretch",
	"layout":{"type":"default"}
} -->
<article class="wp-block-cover alignfull is-style-cover-stretch" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {
			"style":{
				"dimensions":{
					"minHeight":"100%"
				}
			},
			"layout":{
				"type":"flex",
				"orientation":"vertical",
				"verticalAlignment":"space-between",
				"justifyContent":"stretch"
			}
		} -->
		<div class="wp-block-group" style="min-height:100%">

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__('Post Meta', 'x3p0-ideas') ?>"},
				"layout":{
					"type":"flex",
					"flexWrap":"nowrap",
					"justifyContent":"space-between"
				}
			} -->
			<div class="wp-block-group">

				<!-- wp:post-terms {
					"term":"category",
					"className":"is-style-buttons-primary"
				} /-->

				<!-- wp:group {
					"metadata":{"name":"<?= esc_attr__('Post Date', 'x3p0-ideas') ?>"},
					"style":{"spacing":{"blockGap":"0"}},
					"layout":{
						"type":"flex",
						"orientation":"vertical",
						"justifyContent":"center"
					}
				} -->
				<div class="wp-block-group">

					<!-- wp:post-date {
						"format":"d",
						"style":{
							"typography":{
								"fontStyle":"normal",
								"fontWeight":"900"
							}
						},
						"fontSize":"3-xl"
					} /-->

					<!-- wp:post-date {
						"format":"M",
						"style":{"typography":{"textTransform":"uppercase"}}
					} /-->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {
				"tagName":"header",
				"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
				"style":{"spacing":{"blockGap":"0"}},
				"layout":{"type":"default"}
			} -->
			<header class="wp-block-group">
				<!-- wp:post-title {"isLink":true} /-->
			</header>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>

</article>
<!-- /wp:cover -->
