<?php

/**
 * Title: Post: Picturesque
 * Slug: x3p0-ideas/post-picturesque
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"article",
	"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
	"layout":{"type":"constrained"}
} -->
<article class="wp-block-group">

	<!-- wp:post-featured-image {
		"isLink":true,
		"aspectRatio":"21/9",
		"width":"",
		"height":"",
		"align":"wide"
	} /-->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Post Container', 'x3p0-ideas') ?>"},
		"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
			"layout":{"type":"default"}
		} -->
		<header class="wp-block-group">
			<!-- wp:post-title {"isLink":true} /-->
		</header>
		<!-- /wp:group -->

		<!-- wp:post-excerpt {
			"moreText":"<?= esc_attr__('Continue reading &rarr;', 'x3p0-ideas') ?>",
			"showMoreOnNewLine":false,
			"excerptLength":35
		} /-->

		<!-- wp:group {
			"tagName":"footer",
			"metadata":{"name":"<?= esc_attr__('Post Footer', 'x3p0-ideas') ?>"},
			"layout":{"type":"default"}
		} -->
		<footer class="wp-block-group">
			<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-short"} /-->
		</footer>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</article>
<!-- /wp:group -->
