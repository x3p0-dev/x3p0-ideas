<?php

/**
 * Title: Post List: Cover
 * Slug: x3p0-ideas/query-list-cover
 * Description: Displays the queried posts in a list. Each post is wrapped in a full-height and width Cover block with a featured image background.
 * Categories: portfolio, posts
 * Keywords: query, cover, portfolio, posts, query, loop
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
	"style":{
		"spacing":{
			"blockGap":"0",
			"padding":{
				"right":"0",
				"left":"0"
			}
		}
	},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-query alignfull" style="padding-right:0;padding-left:0">

	<!-- wp:post-template {
		"align":"full",
		"style":{"spacing":{"blockGap":"0"}}
	} -->

		<!-- wp:pattern {"slug":"x3p0-ideas/post-cover"} /-->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {
		"paginationArrow":"arrow",
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
