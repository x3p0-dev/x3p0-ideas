<?php
/**
 * Title: Post List: Cover
 * Slug: x3p0-ideas/post-list-cover
 * Description: Displays the queried posts in a list. Each post is wrapped in a full-height and width Cover block with a featured image background.
 * Categories: portfolio, posts
 * Keywords: query, cover, portfolio, posts, query, loop
 * Block Types: core/query
 * Viewport Width: 1376
 */
?>
<!-- wp:query {
	"metadata":{"name":"<?= esc_attr__( 'Posts Query', 'x3p0-ideas' ) ?>"},
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
	"className":"pattern-post-list-cover",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-query alignfull pattern-post-list-cover">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__( 'Posts Container', 'x3p0-ideas' ) ?>"},
		"align":"full",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group alignfull">

		<!-- wp:post-template {"align":"full","style":{"spacing":{"blockGap":"0"}}} -->

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__( 'Post', 'x3p0-ideas' ) ?>"},
				"tagName":"article",
				"className":"has-link-color",
				"layout":{"type":"constrained"}
			} -->
			<article class="wp-block-group has-link-color">

				<!-- wp:cover {
					"useFeaturedImage":true,
					"dimRatio":50,
					"minHeight":100,
					"minHeightUnit":"vh",
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
				<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:100vh">

					<span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
					<div class="wp-block-cover__inner-container">

						<!-- wp:group {
							"metadata":{"name":"<?= esc_attr__( 'Post Header', 'x3p0-ideas' ) ?>"},
							"tagName":"header",
							"style":{"spacing":{"blockGap":"var:preset|spacing|minus-2"}},
							"layout":{"type":"constrained"}
						} -->
						<header class="wp-block-group">
							<!-- wp:post-title {"isLink":true} /-->

							<!-- wp:group {
								"metadata":{"name":"<?= esc_attr__( 'Post Meta', 'x3p0-ideas' ) ?>"},
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
