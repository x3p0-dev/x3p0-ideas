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
		"aspectRatio":"16/9",
		"width":"",
		"height":"",
		"align":"wide"
	} /-->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Post Container', 'x3p0-ideas') ?>"},
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
			"align":"wide",
			"style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}},
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-group alignwide">
			<!-- wp:post-title {"isLink":true} /-->
		</header>
		<!-- /wp:group -->

		<!-- wp:post-excerpt {
			"moreText":"<?= esc_attr__('Continue reading →', 'x3p0-ideas') ?>",
			"showMoreOnNewLine":false,
			"excerptLength":35
		} /-->

		<!-- wp:group {
			"tagName":"footer",
			"metadata":{"name":"<?= esc_attr__('Post Footer', 'x3p0-ideas') ?>"},
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|base"
				}
			},
			"layout":{"type":"flex","flexWrap":"nowrap"},
			"fontSize":"sm"
		} -->
		<footer class="wp-block-group has-sm-font-size">
			<!-- wp:post-author-name {
				"isLink":true
			} /-->

			<!-- wp:paragraph {
				"metadata":{
					"name":"<?= esc_attr('Separator', 'x3p0-ideas') ?>"
				}
			} -->
			<p><?=
				// Translators: Metadata separator.
				esc_html__('&middot;', 'x3p0-ideas')
			?></p>
			<!-- /wp:paragraph -->

			<!-- wp:post-date /-->
		</footer>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</article>
<!-- /wp:group -->
