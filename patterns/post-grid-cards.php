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
				"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
				"style":{
					"spacing":{
						"padding":{
							"top":"0",
							"bottom":"0",
							"left":"0",
							"right":"0"
						},
						"blockGap":"0"
					},
					"dimensions":{"minHeight":"100%"}
				},
				"className":"is-style-card",
				"layout":{"type":"flex","orientation":"vertical"}
			} -->
			<article class="wp-block-group is-style-card" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100%">

				<!-- wp:post-featured-image {
					"isLink":true,
					"aspectRatio":"auto",
					"width":"100%",
					"height":"18rem",
					"style":{
						"border":{
							"radius":"0px"
						},
						"layout":{
							"selfStretch":"fixed",
							"flexSize":"18rem"
						}
					},
					"className":"is-style-borderless"
				} /-->

				<!-- wp:group {
					"metadata":{"name":"<?= esc_attr__('Post Container', 'x3p0-ideas') ?>"},
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
							"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
							"style":{"spacing":{"blockGap":"var:preset|spacing|minus-2"}},
							"layout":{"type":"constrained"}
						} -->
						<header class="wp-block-group">
							<!-- wp:post-title {"isLink":true} /-->
						</header>
						<!-- /wp:group -->

						<!-- wp:post-excerpt {
							"moreText":"<?= esc_attr__(' Continue reading →', 'x3p0-ideas') ?>",
							"showMoreOnNewLine":false,
							"excerptLength":20
						} /-->

					</div>
					<!-- /wp:group -->

					<!-- wp:group {
						"tagName":"footer",
						"metadata":{"name":"<?= esc_attr__('Post Footer', 'x3p0-ideas') ?>"},
						"layout":{"type":"constrained"}
					} -->
					<footer class="wp-block-group">

						<!-- wp:group {
							"metadata":{"name":"<?= esc_attr__('Post Meta', 'x3p0-ideas') ?>"},
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
										"color":"var:preset|color|neutral-100",
										"width":"1px"
									}
								}
							},
							"layout":{"type":"flex","flexWrap":"wrap"},
							"fontSize":"sm"
						} -->
						<div class="wp-block-group has-sm-font-size" style="border-top-color:var(--wp--preset--color--neutral-100);border-top-width:1px;padding-top:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3)">

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
