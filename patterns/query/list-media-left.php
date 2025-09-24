<?php

/**
 * Title: Post List: Media Left
 * Slug: x3p0-ideas/query-list-media-left
 * Description: Displays the queried posts with each post in a column. The title, byline, and excerpt are on the right and the featured media is on the left.
 * Categories: posts
 * Keywords: query, posts
 * Block Types: core/query
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$content_size = wp_get_global_settings([ 'layout', 'contentSize' ]);

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
	"layout":{
		"type":"constrained",
		"wideSize":"80rem",
		"contentSize":"<?= esc_attr(is_string($content_size) ? $content_size : '40rem') ?>"
	}
} -->
<div class="wp-block-query alignfull" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:post-template {
		"align":"wide",
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|100"
			}
		},
		"layout":{"type":"default"}
	} -->

		<!-- wp:columns -->
		<div class="wp-block-columns">

			<!-- wp:column {"width":"60%"} -->
			<div class="wp-block-column" style="flex-basis:60%">
				<!-- wp:post-featured-image {
					"isLink":true,
					"aspectRatio":"16/9",
					"width":"",
					"height":"",
					"align":"wide"
				} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {
				"verticalAlignment":"center",
				"width":"40%",
				"style":{
					"spacing":{
						"blockGap":"var:preset|spacing|40"
					}
				},
				"layout":{"type":"constrained"}
			} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">

				<!-- wp:group {
					"tagName":"header",
					"style":{
						"spacing":{
							"blockGap":"var:preset|spacing|20"
						}
					},
					"layout":{"type":"constrained"}
				} -->
				<header class="wp-block-group">
					<!-- wp:post-title {"isLink":true} /-->
					<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-short"} /-->
				</header>
				<!-- /wp:group -->

				<!-- wp:post-excerpt {
					"moreText":"<?= esc_attr__('Continue reading &rarr;', 'x3p0-ideas') ?>",
					"showMoreOnNewLine":false,
					"excerptLength":25
				} /-->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {
		"paginationArrow":"arrow",
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
				"x3p0/rules":{"rules":[{"type": "ifAttribute", "attribute": "content"}]}
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
