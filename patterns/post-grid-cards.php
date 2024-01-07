<?php
/**
 * Title: Post Grid: Cards
 * Slug: x3p0-ideas/post-grid-cards
 * Description: Displays a grid of post cards.
 * Categories: posts
 * Keywords: query, loop, grid, posts, card
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
	"className":"pattern-post-grid-cards",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-query alignfull pattern-post-grid-cards">

	<!-- wp:group {
		"metadata":{"name":"<?php esc_attr_e( 'Posts Container', 'x3p0-ideas' ) ?>"},
		"align":"full",
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull">

		<!-- wp:group {
			"metadata":{"name":"<?php esc_attr_e( 'Posts Inner Container', 'x3p0-ideas' ) ?>"},
			"align":"wide",
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
		<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

			<!-- wp:post-template {
				"style":{"spacing":{"blockGap":"var:preset|spacing|plus-3"}},
				"className":"is-style-flex-grow",
				"layout":{"type":"grid","columnCount":3}
			} -->

				<!-- wp:group {
					"tagName":"article",
					"metadata":{"name":"<?php esc_attr_e( 'Post', 'x3p0-ideas' ) ?>"},
					"style":{
						"spacing":{"blockGap":"0"},
						"dimensions":{"minHeight":"100%"}
					},
					"className":"is-style-card",
					"layout":{"type":"flex","orientation":"vertical"}
				} -->
				<article class="wp-block-group is-style-card" style="min-height:100%">

					<!-- wp:post-featured-image {
						"isLink":true,
						"aspectRatio":"auto",
						"width":"100%",
						"height":"18rem",
						"style":{
							"border":{
								"radius":"0px",
								"bottom":{
									"color":"var:preset|color|primary-contrast",
									"width":"5px"
								},
								"top":{},
								"right":{},
								"left":{}
							},
							"layout":{
								"selfStretch":"fixed",
								"flexSize":"18rem"
							}
						}
					} /-->

					<!-- wp:group {
						"metadata":{"name":"<?php esc_attr_e( 'Post Container', 'x3p0-ideas' ) ?>"},
						"style":{
							"dimensions":{"minHeight":""},
							"layout":{"selfStretch":"fill","flexSize":null},
							"spacing":{
								"blockGap":"0",
								"padding":{
									"right":"var:preset|spacing|plus-3",
									"left":"var:preset|spacing|plus-3"
								}
							}
						},
						"layout":{
							"type":"flex",
							"orientation":"vertical",
							"justifyContent":"stretch",
							"verticalAlignment":"space-between"
						}
					} -->
					<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

						<!-- wp:group {
							"style":{
								"spacing":{
									"padding":{
										"top":"var:preset|spacing|plus-3",
										"bottom":"var:preset|spacing|plus-3"
									},
									"blockGap":"var:preset|spacing|base"
								}
							},
							"layout":{"type":"constrained"}
						} -->
						<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3)">

							<!-- wp:group {
								"tagName":"header",
								"metadata":{"name":"<?= esc_attr__( 'Post Header', 'x3p0-ideas' ) ?>"},
								"style":{"spacing":{"blockGap":"var:preset|spacing|minus-2"}},
								"layout":{"type":"constrained"}
							} -->
							<header class="wp-block-group">
								<!-- wp:post-title {"isLink":true} /-->
							</header>
							<!-- /wp:group -->

							<!-- wp:post-excerpt {
								"moreText":"<?= esc_attr__(' Continue reading →', 'x3p0-ideas' ) ?>",
								"showMoreOnNewLine":false,
								"excerptLength":20
							} /-->

						</div>
						<!-- /wp:group -->

						<!-- wp:group {
							"tagName":"footer",
							"metadata":{"name":"<?php esc_attr_e( 'Post Footer', 'x3p0-ideas' ) ?>"},
							"layout":{"type":"constrained"}
						} -->
						<footer class="wp-block-group">

							<!-- wp:group {
								"metadata":{"name":"<?php esc_attr_e( 'Post Meta', 'x3p0-ideas' ) ?>"},
								"style":{
									"spacing":{
										"padding":{
											"top":"var:preset|spacing|plus-3",
											"bottom":"var:preset|spacing|plus-3"
										},
										"blockGap":"var:preset|spacing|base"
									},
									"border":{
										"top":{
											"color":"var:preset|color|neutral-subtle",
											"width":"1px"
										}
									}
								},
								"layout":{"type":"flex","flexWrap":"wrap"},
								"fontSize":"sm"
							} -->
							<div class="wp-block-group has-sm-font-size" style="border-top-color:var(--wp--preset--color--neutral-subtle);border-top-width:1px;padding-top:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3)">

								<!-- wp:post-author-name {"isLink":true,"className":"is-style-icon"} /-->
								<!-- wp:post-date {"className":"is-style-icon"} /-->

							</div>
							<!-- /wp:group -->

						</footer>
						<!-- /wp:group -->

					</div>
					<!-- /wp:group -->

				</article>
				<!-- /wp:group -->

			<!-- /wp:post-template -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:query-pagination {
		"paginationArrow":"arrow",
		"layout":{
			"type":"flex",
			"justifyContent":"space-between"
		}
	} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
