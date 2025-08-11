<?php

/**
 * Title: Post Content: Cover In Cover (Full)
 * Slug: x3p0-ideas/content-post-variant-cover-in-cover-full
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"blockGap":"0"
		}
	},
	"className":"is-style-site-content",
	"layout":{"type":"default"}
} -->
<main class="wp-block-group is-style-site-content">

	<!-- wp:group {
		"tagName":"article",
		"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
		"style":{
			"spacing":{
				"padding":{
					"top":"0px",
					"bottom":"var:preset|spacing|70"
				}
			}
		},
		"layout":{"type":"default"}
	} -->
	<article class="wp-block-group" style="padding-top:0px;padding-bottom:var(--wp--preset--spacing--70)">

		<!-- wp:cover {
			"tagName":"header",
			"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
			"useFeaturedImage":true,
			"dimRatio":0,
			"isUserOverlayColor":true,
			"style":{
				"spacing":{
					"padding":{
						"top":"var:preset|spacing|70",
						"bottom":"var:preset|spacing|70",
						"left":"var:preset|spacing|70",
						"right":"var:preset|spacing|70"
					}
				}
			},
			"className": "is-style-global-border",
			"layout":{"type":"default"}
		} -->
		<header class="wp-block-cover is-style-global-border" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<div class="wp-block-cover__inner-container">

				<!-- wp:cover {
					"dimRatio":80,
					"overlayColor":"black",
					"isUserOverlayColor":true,
					"contentPosition":"center center",
					"style":{
						"spacing":{
							"padding":{
								"top":"var:preset|spacing|90",
								"bottom":"var:preset|spacing|90",
								"left":"var:preset|spacing|90",
								"right":"var:preset|spacing|90"
							},
							"blockGap":"var:preset|spacing|50"
						}
					},
					"className":"has-bounds-border is-style-cover-dark",
					"layout":{"type":"constrained"}
				} -->
				<div class="wp-block-cover has-bounds-border is-style-cover-dark" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--90)">

					<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-80 has-background-dim"></span>
					<div class="wp-block-cover__inner-container">

						<!-- wp:post-title {
							"textAlign":"center",
							"level":1,
							"align":"full",
							"style":{
								"spacing":{
									"padding":{
										"right":"var:preset|spacing|70",
										"left":"var:preset|spacing|70"
									}
								}
							},
							"className":"is-style-text-headline"
						} /-->

						<!-- wp:post-excerpt {
							"textAlign":"center",
							"showMoreOnNewLine":false,
							"excerptLength":25
						} /-->

						<!-- wp:group {
							"layout":{
								"type":"flex",
								"flexWrap":"nowrap",
								"justifyContent":"center"
							}
						} -->
						<div class="wp-block-group">

							<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-avatar"} /-->

						</div>
						<!-- /wp:group -->

					</div>

				</div>
				<!-- /wp:cover -->

			</div>
		</header>
		<!-- /wp:cover -->

		<!-- wp:post-content {
			"layout":{"type":"constrained"},
			"className":"is-style-prose"
		} /-->

		<!-- wp:pattern {"slug":"x3p0-ideas/post-meta-default"} /-->

	</article>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"comments"} /-->

</main>
<!-- /wp:group -->
