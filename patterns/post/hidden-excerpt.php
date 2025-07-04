<?php

/**
 * Title: Post: Excerpt
 * Slug: x3p0-ideas/post-excerpt
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"article",
	"metadata":{"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|base"
		}
	},
	"layout":{"type":"default"}
} -->
<article class="wp-block-group">

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

</article>
<!-- /wp:group -->
