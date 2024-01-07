<?php
/**
 * Title: Post Grid: Default
 * Slug: x3p0-ideas/post-grid-default
 * Description: Displays an elegant grid of posts.
 * Categories: posts
 * Keywords: query, loop, grid, posts
 * Block Types: core/query
 * Viewport Width: 1376
 */
?>
<!-- wp:query {
	"metadata":{"name":"<?php esc_attr_e( 'Posts Query', 'x3p0-ideas' ) ?>"},
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
	"className":"pattern-post-grid-default",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-query alignfull pattern-post-grid-default">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__( 'Posts Container', 'x3p0-ideas' ) ?>"},
		"align":"full",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group alignfull">

		<!-- wp:group {
			"metadata":{"name":"<?= esc_attr__( 'Posts Inner Container', 'x3p0-ideas' ) ?>"},
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
				"style":{"spacing":{"blockGap":"var:preset|spacing|plus-3"}},
				"className":"is-style-flex-grow",
				"layout":{"type":"grid","columnCount":3}
			} -->

				<!-- wp:group {
					"tagName":"article",
					"metadata":{"name":"<?= esc_attr__( 'Post', 'x3p0-ideas' ) ?>"},
					"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
					"layout":{"type":"default"}
				} -->
				<article class="wp-block-group">

					<!-- wp:post-featured-image {
						"isLink":true,
						"aspectRatio":"16/9",
						"style":{
							"border":{
								"bottom":{
									"color":"var:preset|color|primary-contrast",
									"width":"5px"
								},
								"top":{},
								"right":{},
								"left":{}
							}
						}
					} /-->

					<!-- wp:group {
						"tagName":"header",
						"metadata":{"name":"<?= esc_attr__( 'Post Header', 'x3p0-ideas' ) ?>"},
						"style":{"spacing":{"blockGap":"var:preset|spacing|minus-2"}},
						"layout":{"type":"constrained"}
					} -->
					<header class="wp-block-group">

						<!-- wp:group {
							"metadata":{"name":"<?= esc_attr__( 'Post Meta', 'x3p0-ideas' ) ?>"},
							"layout":{"type":"flex","flexWrap":"nowrap"},
							"fontSize":"sm"
						} -->
						<div class="wp-block-group has-sm-font-size">
							<!-- wp:post-terms {"term":"category"} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:post-title {
							"metadata":{"name":"<?= esc_attr__( 'Post Title', 'x3p0-ideas' ) ?>"},
							"isLink":true
						} /-->

						<!-- wp:group {
							"metadata":{"name":"<?= esc_attr__( 'Post Byline', 'x3p0-ideas' ) ?>"},
							"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
							"layout":{"type":"flex","flexWrap":"nowrap"},
							"fontSize":"sm"
						} -->
						<div class="wp-block-group has-sm-font-size">
							<!-- wp:post-author-name /-->

							<!-- wp:paragraph -->
							<p>·</p>
							<!-- /wp:paragraph -->

							<!-- wp:post-date /-->
						</div>
						<!-- /wp:group -->

					</header>
					<!-- /wp:group -->

					<!-- wp:post-excerpt {
						"metadata":{"name":"<?= esc_attr__( 'Post Summary', 'x3p0-ideas' ) ?>"},
						"moreText":"<?= esc_attr__( 'Continue reading →', 'x3p0-ideas' ) ?>",
						"showMoreOnNewLine":false,
						"excerptLength":20
					} /-->

					<!-- wp:spacer {"height":"0"} -->
					<div style="height:0" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->

				</article>
				<!-- /wp:group -->

			<!-- /wp:post-template -->

		</div>
		<!-- /wp:group -->

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
