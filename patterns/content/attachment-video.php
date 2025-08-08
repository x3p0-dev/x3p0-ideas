<?php

/**
 * Title: Video Attachment Content
 * Slug: x3p0-ideas/content-attachment-video
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
			"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
			"style":{"spacing":{"blockGap":"0"}},
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-group">
			<!-- wp:post-title {"level":1,"className":"is-style-text-headline"} /-->
		</header>
		<!-- /wp:group -->

		<!-- wp:pattern {"slug":"x3p0-ideas/attachment-media-video"} /-->

		<!-- wp:post-content {
			"layout":{"type":"constrained"},
			"className":"is-style-prose"
		} /-->

		<!-- wp:pattern {"slug":"x3p0-ideas/attachment-meta-video"} /-->

	</article>
	<!-- /wp:group -->

</main>
<!-- /wp:group -->
