<?php

/**
 * Title: Post List: Table of Contents
 * Slug: x3p0-ideas/query-list-table-of-contents
 * Description: Displays the queried posts in a ToC-style list with the date, title, and post meta.
 * Categories: posts
 * Keywords: query, posts
 * Block Types: core/query
 * Viewport Width: 1152
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:query {
	"metadata":{"name":"<?= esc_attr__('Posts Query', 'x3p0-ideas') ?>"},
	"queryId":0,
	"query":{
		"perPage":"6",
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
	"layout":{"type":"constrained"},
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|70",
				"left":"var:preset|spacing|70",
				"right":"var:preset|spacing|70"
			}
		}
	}
} -->
<div class="wp-block-query alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:post-template {
		"align":"wide",
		"layout":{"type":"default"}
	} -->

		<!-- wp:columns {
			"isStackedOnMobile":false,
			"className":"has-bounds-border is-style-section-1",
			"style":{
				"spacing":{
					"padding":{
						"top":"var:preset|spacing|10",
						"right":"var:preset|spacing|10",
						"bottom":"var:preset|spacing|10",
						"left":"var:preset|spacing|10"
					},
					"blockGap":{
						"top":"var:preset|spacing|px",
						"left":"var:preset|spacing|10"
					}
				}
			}
		} -->
		<div class="wp-block-columns is-not-stacked-on-mobile has-bounds-border is-style-section-1" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">

			<!-- wp:column {
				"verticalAlignment":"stretch",
				"width":"8ch",
				"className":"is-style-section-2",
				"style":{
					"spacing":{
						"padding":{
							"right":"0",
							"left":"0",
							"top":"0",
							"bottom":"0"
						}
					}
				},
				"layout":{"type":"default"}
			} -->
			<div class="wp-block-column is-vertically-aligned-stretch is-style-section-2" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:8ch">

				<!-- wp:group {
					"style":{
						"spacing":{"blockGap":"0"},
						"dimensions":{"minHeight":"100%"}
					},
					"layout":{
						"type":"flex",
						"orientation":"vertical",
						"verticalAlignment":"center",
						"justifyContent":"center"
					}
				} -->
				<div class="wp-block-group" style="min-height:100%">

					<!-- wp:post-date {
						"format":"j",
						"style":{
							"typography":{
								"fontStyle":"normal",
								"fontWeight":"900"
							},
							"layout":{
								"selfStretch":"fit",
								"flexSize":null
							}
						},
						"fontSize":"4-xl"
					} /-->

					<!-- wp:post-date {
						"format":"M",
						"style":{
							"typography":{
								"fontStyle":"normal",
								"fontWeight":"100",
								"textTransform":"uppercase"
							},
							"layout":{
								"selfStretch":"fit",
								"flexSize":null
							}
						},
						"fontSize":"2-xl"
					} /-->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {
				"verticalAlignment":"center",
				"width":"",
				"style":{
					"spacing":{"blockGap":"var:preset|spacing|10"}
				},
				"layout":{"type":"default"}
			} -->
			<div class="wp-block-column is-vertically-aligned-center">

				<!-- wp:group {
					"className":"is-style-section-2",
					"style":{
						"spacing":{
							"padding":{
								"top":"var:preset|spacing|40",
								"bottom":"var:preset|spacing|40",
								"left":"var:preset|spacing|40",
								"right":"var:preset|spacing|40"
							}
						}
					},
					"layout":{"type":"default"}
				} -->
				<div class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

					<!-- wp:post-title {
						"isLink":true,
						"fontSize":"lg"
					} /-->

				</div>
				<!-- /wp:group -->

				<!-- wp:columns {
					"style":{
						"spacing":{
							"blockGap":{
								"top":"var:preset|spacing|10",
								"left":"var:preset|spacing|10"
							}
						},
						"layout":{
							"selfStretch":"fit",
							"flexSize":null
						}
					}
				} -->
				<div class="wp-block-columns">

					<!-- wp:column {
						"className":"is-style-section-2",
						"style":{
							"spacing":{
								"padding":{
									"top":"var:preset|spacing|40",
									"right":"var:preset|spacing|40",
									"bottom":"var:preset|spacing|40",
									"left":"var:preset|spacing|40"
								}
							}
						}
					} -->
					<div class="wp-block-column is-style-section-2" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

						<!-- wp:group {
							"className":"is-style-meta",
							"layout":{"type":"constrained"}
						} -->
						<div class="wp-block-group is-style-meta">
							<!-- wp:post-author-name {"isLink":true} /-->
						</div>
						<!-- /wp:group -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {
						"className":"is-style-section-2",
						"style":{
							"spacing":{
								"padding":{
									"right":"var:preset|spacing|40",
									"left":"var:preset|spacing|40",
									"top":"var:preset|spacing|40",
									"bottom":"var:preset|spacing|40"
								}
							}
						}
					} -->
					<div class="wp-block-column is-style-section-2" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

						<!-- wp:group {
							"className":"is-style-meta",
							"layout":{"type":"constrained"}
						} -->
						<div class="wp-block-group is-style-meta">
							<!-- wp:post-terms {"term":"category"} /-->
						</div>
						<!-- /wp:group -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

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
					"top":"var:preset|spacing|70"
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
