<?php

/**
 * Title: Post Grid: Cover
 * Slug: x3p0-ideas/post-grid-cover
 * Description: Displays the queried posts in a three-column grid. Each post is wrapped in a Cover block with a featured image background.
 * Categories: portfolio, posts
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
		"perPage":6,
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
		"backgroundColor":"black",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group alignfull has-black-background-color has-background">

		<!-- wp:post-template {
			"align":"full",
			"style":{"spacing":{"blockGap":"0"}},
			"className":"is-style-flex-grow",
			"layout":{"type":"grid","columnCount":3}
		} -->

			<!-- wp:group {
				"tagName":"article",
				"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
				"layout":{"type":"constrained"}
			} -->
			<article class="wp-block-group">

				<!-- wp:cover {
					"metadata":{"name":"<?= esc_attr__('Post Container', 'x3p0-ideas') ?>"},
					"useFeaturedImage":true,
					"dimRatio":50,
					"minHeight":32,
					"minHeightUnit":"rem",
					"contentPosition":"bottom left",
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
					"layout":{"type":"constrained"}
				} -->
				<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:32rem">

					<span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
					<div class="wp-block-cover__inner-container">

						<!-- wp:group {
							"tagName":"header",
							"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
							"style":{"spacing":{"blockGap":"0"}},
							"layout":{"type":"constrained"}
						} -->
						<header class="wp-block-group">

							<!-- wp:post-title {"isLink":true} /-->

							<!-- wp:group {
								"metadata":{"name":"<?= esc_attr__('Post Meta', 'x3p0-ideas') ?>"},
								"layout":{"type":"flex","flexWrap":"nowrap"}
							} -->
							<div class="wp-block-group">
								<!-- wp:post-date /-->
							</div>
							<!-- /wp:group -->

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
