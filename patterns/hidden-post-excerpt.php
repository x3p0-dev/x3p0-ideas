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
		"style":{"spacing":{"blockGap":"0"}},
		"layout":{"type":"default"}
	} -->
	<header class="wp-block-group">

		<!-- wp:group {
			"metadata":{"name":"<?= esc_attr__('Post Meta', 'x3p0-ideas') ?>"},
			"layout":{"type":"flex","flexWrap":"nowrap"},
			"className":"is-style-post-byline"
		} -->
		<div class="wp-block-group is-style-post-byline">
			<!-- wp:post-date /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-title {"isLink":true} /-->
	</header>
	<!-- /wp:group -->

	<!-- wp:post-excerpt {
		"moreText":"<?= esc_attr__('Continue reading →', 'x3p0-ideas') ?>",
		"showMoreOnNewLine":false
	} /-->

</article>
<!-- /wp:group -->
