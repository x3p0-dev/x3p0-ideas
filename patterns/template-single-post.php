<?php

/**
 * Title: Single Post Template
 * Slug: x3p0-ideas/template-single-post
 * Inserter: no
 * Template Types: attachment, page, single, singular
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:template-part {"slug":"header","className":"site-header"} /-->

<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3"
			}
		}
	},
	"layout":{"type":"default"}
} -->
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
		"tagName":"article",
		"layout":{"type":"default"}
	} -->
	<article class="wp-block-group">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{"name":"Post Header"},
			"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-group">
			<!-- wp:post-title {"level":1} /-->
			<!-- wp:pattern {"slug":"x3p0-ideas/post-byline"} /-->
		</header>
		<!-- /wp:group -->

		<!-- wp:post-content {
			"layout":{"type":"constrained"},
			"className":"is-style-prose"
		} /-->

		<!-- wp:group {
			"tagName":"footer",
			"metadata":{"name":"<?= esc_attr__('Post Footer', 'x3p0-ideas') ?>"},
			"layout":{"type":"constrained"},
			"fontSize":"sm"
		} -->
		<footer class="wp-block-group has-sm-font-size">

			<!-- wp:group {
				"style":{"spacing":{"blockGap":"0"}},
				"layout":{"type":"constrained"}
			} -->
			<div class="wp-block-group">
				<!-- wp:post-terms {"term":"category","className":"is-style-icon"} /-->
				<!-- wp:post-terms {"term":"post_tag","className":"is-style-icon"} /-->
			</div>
			<!-- /wp:group -->

		</footer>
		<!-- /wp:group -->

	</article>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"x3p0-ideas/comments-default"} /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"site-footer"} /-->
