<?php

/**
 * Title: Post Content: Cover (Full)
 * Slug: x3p0-ideas/content-post-variant-cover-full
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
			"metadata":{"name":"Post Header"},
			"useFeaturedImage":true,
			"isUserOverlayColor":true,
			"minHeightUnit":"rem",
			"gradient":"45-deg-dark-transparent",
			"contentPosition":"bottom left",
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
			"className": "is-style-cover-dark",
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-cover is-style-cover-dark has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--90)">

			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
			<div class="wp-block-cover__inner-container">

				<!-- wp:spacer {"height":"var:preset|spacing|120"} -->
				<div style="height:var(--wp--preset--spacing--120)" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:group {"metadata":{"name":"Post Header"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"},"dimensions":{"minHeight":""}},"layout":{"type":"default"}} -->
				<div class="wp-block-group">
					<!-- wp:post-title {"level":1,"className":"is-style-text-headline"} /-->
					<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-default"} /-->
				</div>
				<!-- /wp:group -->

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
