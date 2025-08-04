<?php

/**
 * Title: Post List: Excerpt
 * Slug: x3p0-ideas/query-list-excerpt
 * Categories: posts
 * Keywords: query, posts
 * Block Types: core/query
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:query {
	"metadata":{"name":"<?= esc_attr__('Posts Query', 'x3p0-ideas') ?>"},
	"queryId":0,
	"query":{
		"perPage":3,
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
	"align":"full",
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|100",
			"padding":{
				"top":"var:preset|spacing|100",
				"right":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|100",
				"left":"var:preset|spacing|70"
			}
		}
	},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-query alignfull" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:post-template {
		"align":"full",
		"style":{"spacing":{"blockGap":"var:preset|spacing|100"}},
		"layout":{"type":"constrained"}
	} -->

		<!-- wp:pattern {"slug":"x3p0-ideas/post-excerpt"} /-->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {
		"paginationArrow":"arrow",
		"align":"center",
		"style":{
			"spacing":{
				"margin":{
					"top":"var:preset|spacing|100"
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
				"x3p0Rules":{"rules":[{"type": "ifAttribute", "attribute": "content"}]}
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
