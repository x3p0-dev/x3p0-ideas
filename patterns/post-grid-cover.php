<?php

/**
 * Title: Post Grid: Cover
 * Slug: x3p0-ideas/post-grid-cover
 * Description: Displays the queried posts in a three-column grid of covers.
 * Categories: posts
 * Keywords: query, cover, grid, posts
 * Block Types: core/query
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:query {
	"metadata":{"name":"<?= esc_attr__('Posts Query', 'x3p0-ideas') ?>"},
	"queryId":0,
	"query":{
		"perPage":5,
		"pages":0,
		"offset":0,
		"postType":"post",
		"order":"desc",
		"orderBy":"date",
		"author":"",
		"search":"",
		"exclude":[],
		"sticky":"",
		"inherit":true
	},
	"align":"full",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-query alignfull">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Posts Container', 'x3p0-ideas') ?>"},
		"align":"full",
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|px",
					"bottom":"var:preset|spacing|px"
				}
			}
		},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--px);padding-bottom:var(--wp--preset--spacing--px)">

		<!-- wp:post-template {
			"align":"full",
			"style":{"spacing":{"blockGap":"var:preset|spacing|px"}},
			"layout":{
				"type":"grid",
				"columnCount":3
			}
		} -->

			<!-- wp:cover {
				"tagName":"article",
				"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
				"useFeaturedImage":true,
				"isUserOverlayColor":true,
				"minHeight":20,
				"minHeightUnit":"rem",
				"gradient":"45-deg-dark-transparent",
				"contentPosition":"center center",
				"align":"full",
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
				"layout":{"type":"default"}
			} -->
			<article class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:20rem">

				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
				<div class="wp-block-cover__inner-container">

					<!-- wp:group {
						"style":{
							"dimensions":{"minHeight":"28rem"}
						},
						"layout":{
							"type":"flex",
							"orientation":"vertical",
							"verticalAlignment":"space-between"
						}
					} -->
					<div class="wp-block-group" style="min-height:28rem">

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
								"className":"is-style-button"
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

		<!-- /wp:post-template -->

	</div>
	<!-- /wp:group -->

	<!-- wp:query-pagination {
		"paginationArrow":"arrow",
		"layout":{"type":"flex","justifyContent":"space-between"}
	} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
