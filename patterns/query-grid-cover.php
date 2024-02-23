<?php

/**
 * Title: Post Grid: Cover
 * Slug: x3p0-ideas/query-grid-cover
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

			<!-- wp:pattern {"slug":"x3p0-ideas/post-cover-spread"} /-->

		<!-- /wp:post-template -->

	</div>
	<!-- /wp:group -->

	<!-- wp:query-pagination {
		"paginationArrow":"arrow",
		"layout":{
			"type":"flex",
			"justifyContent":"right"
		}
	} -->
		<!-- wp:paragraph {
			"metadata":{
				"bindings":{
					"content":{
						"source":"x3p0/theme",
						"args":{
							"key":"paginationLabel"
						}
					}
				}
			},
			"className":"pagination-label"
		} -->
		<p class="pagination-label"><?= esc_html__('Page 3 / 7:', 'x3p0-ideas') ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
