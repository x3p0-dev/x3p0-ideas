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
<!-- wp:template-part {"slug":"header","className":"is-style-site-header"} /-->

<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"blockGap":"0"
		}
	},
	"className":"is-style-site-main",
	"layout":{"type":"default"}
} -->
<main class="wp-block-group is-style-site-main">

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
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|40"
				}
			},
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-group">
			<!-- wp:post-title {"level":1,"className":"is-style-text-headline"} /-->
			<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-default"} /-->
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

<!-- wp:template-part {"slug":"footer","className":"is-style-site-footer"} /-->
