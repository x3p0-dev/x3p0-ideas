<?php

/**
 * Title: Post Grid: Featured
 * Slug: x3p0-ideas/post-grid-featured
 * Description: Displays the queried posts in a four-column grid with the first post spanning all columns.
 * Categories: posts
 * Keywords: query, cover, grid, posts
 * Block Types: core/query
 * Viewport Width: 1376
 */

declare(strict_types=1);

$columns = get_option('posts_per_page') % 4 === 1 ? 4 : 3;

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
					"top":"var:preset|spacing|plus-3",
					"right":"var:preset|spacing|plus-3",
					"bottom":"var:preset|spacing|plus-3",
					"left":"var:preset|spacing|plus-3"
				}
			}
		},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

		<!-- wp:post-template {
			"align":"full",
			"style":{"spacing":{"blockGap":"var:preset|spacing|px"}},
			"className":"is-style-featured-col-span-all",
			"layout":{
				"type":"grid",
				"columnCount":<?= absint($columns) ?>
			}
		} -->

			<!-- wp:group {
				"tagName":"article",
				"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
				"layout":{"type":"default"}
			} -->
			<article class="wp-block-group">

				<!-- wp:cover {
					"useFeaturedImage":true,
					"dimRatio":50,
					"minHeight":32,
					"minHeightUnit":"rem",
					"contentPosition":"center center",
					"isDark":false,
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
					"className":"is-style-stretch",
					"layout":{"type":"default"}
				} -->
				<div class="wp-block-cover alignfull is-light is-style-stretch" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:32rem">

					<span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
					<div class="wp-block-cover__inner-container">

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

				</div>
				<!-- /wp:cover -->

			</article>
			<!-- /wp:group -->

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
