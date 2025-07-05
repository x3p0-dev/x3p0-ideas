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
	"queryId":1,
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
		"inherit":true,
		"taxQuery":null,
		"parents":[]
	},
	"className":"alignfull",
	"layout":{"type":"constrained"},
	"style":{
		"spacing":{
			"padding":{
				"right":"0",
				"left":"0",
				"top":"var:preset|spacing|px",
				"bottom":"var:preset|spacing|px"
			},
			"blockGap":"0"
		}
	}
} -->
<div class="wp-block-query alignfull" style="padding-top:var(--wp--preset--spacing--px);padding-right:0;padding-bottom:var(--wp--preset--spacing--px);padding-left:0">

	<!-- wp:post-template {
		"align":"full",
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|px"
			}
		},
		"layout":{
			"type":"grid",
			"columnCount":3
		}
	} -->
		<!-- wp:pattern {"slug":"x3p0-ideas/post-cover-spread"} /-->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {
		"paginationArrow":"arrow",
		"style":{
			"spacing":{
				"margin":{
					"top":"0"
				},
				"padding":{
					"top":"var:preset|spacing|70",
					"right":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70"
				}
			}
		},
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
				},
				"@ifAttribute":"content"
			},
			"placeholder":"<?= esc_attr__('Page 3 / 7:', 'x3p0-ideas') ?>",
			"className":"pagination-label"
		} -->
		<p class="pagination-label"></p>
		<!-- /wp:paragraph -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
