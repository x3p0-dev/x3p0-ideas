<?php

/**
 * Title: Header: Cover for Single Post
 * Slug: x3p0-ideas/header-single-post-cover
 * Description:
 * Categories: header
 * Keywords: header
 * Block Types: core/template-part/header
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Site Header', 'x3p0-ideas') ?>"},
	"align":"full",
	"className": "is-style-site-header",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull is-style-site-header">

	<!-- wp:cover {
		"useFeaturedImage":true,
		"hasParallax":true,
		"minHeightUnit":"vh",
		"isDark":false,
		"style":{
			"spacing":{
				"padding":{
					"top":"0",
					"right":"0",
					"bottom":"0",
					"left":"0"
				},
				"blockGap":"0"
			}
		},
		"align":"full",
		"className":"is-style-cover-fade-in",
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-cover alignfull is-light has-parallax is-style-cover-fade-in" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim"></span>
		<div class="wp-block-cover__inner-container">

			<!-- wp:pattern {"slug":"x3p0-ideas/header-content"} /-->

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__('Post Header','x3p0-ideas') ?>"},
				"style":{
					"spacing":{
						"blockGap":"var:preset|spacing|40",
						"padding":{
							"top":"var:preset|spacing|70",
							"right":"var:preset|spacing|70",
							"bottom":"var:preset|spacing|70",
							"left":"var:preset|spacing|70"
						}
					},
					"dimensions":{
						"minHeight":"28rem"
					}
				},
				"layout":{
					"type":"flex",
					"orientation":"vertical",
					"justifyContent":"center",
					"verticalAlignment":"bottom"
				}
			} -->
			<div class="wp-block-group" style="min-height:28rem;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

				<!-- wp:post-title {
					"textAlign":"center",
					"level":1,
					"className":"is-style-text-headline"
				} /-->

				<!-- wp:group {
					"layout":{
						"type":"flex",
						"flexWrap":"wrap",
						"orientation":"vertical",
						"justifyContent":"center"
					}
				} -->
				<div class="wp-block-group">
					<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-default"} /-->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>

	</div>
	<!-- /wp:cover -->

</div>
<!-- /wp:group -->
