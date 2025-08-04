<?php

/**
 * Title: Post Content: Section 2
 * Slug: x3p0-ideas/content-post-variant-section-2
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"Content"},
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
		"metadata":{"name":"Post"},
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70"
				}
			}
		},
		"layout":{"type":"default"}
	} -->
	<article class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{"name":"Post Header"},
			"style":{
				"spacing":{
					"padding":{
						"right":"var:preset|spacing|70",
						"left":"var:preset|spacing|70"
					}
				}
			},
			"layout":{"type":"default"}
		} -->
		<header class="wp-block-group" style="padding-right:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

			<!-- wp:group {
				"className":"has-global-border is-style-section-2",
				"style":{
					"spacing":{
						"padding":{
							"top":"var:preset|spacing|90",
							"bottom":"var:preset|spacing|90",
							"left":"var:preset|spacing|90",
							"right":"var:preset|spacing|90"
						}
					}
				},
				"layout":{
					"type":"flex",
					"orientation":"vertical",
					"verticalAlignment":"bottom"
				}
			} -->
			<div class="wp-block-group has-global-border is-style-section-2" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--90)">

				<!-- wp:spacer {"height":"var:preset|spacing|120"} -->
				<div style="height:var(--wp--preset--spacing--120)" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:group {
					"style":{
						"spacing":{
							"blockGap":"var:preset|spacing|40",
							"padding":{
								"right":"0",
								"left":"0"
							}
						},
						"dimensions":{
							"minHeight":""
						}
					},
					"layout":{"type":"constrained"}
				} -->
				<div class="wp-block-group" style="padding-right:0;padding-left:0">
					<!-- wp:post-title {"level":1,"className":"is-style-text-headline"} /-->
					<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-default"} /-->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</header>
		<!-- /wp:group -->

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
