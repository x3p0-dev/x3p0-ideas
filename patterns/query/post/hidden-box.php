<?php

/**
 * Title: Post: Box
 * Slug: x3p0-ideas/post-box
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"article",
	"metadata":{
		"name":"<?= esc_attr__('Post', 'x3p0-ideas') ?>"
	},
	"style":{
		"dimensions":{
			"minHeight":"100%"
		},
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|70",
				"left":"var:preset|spacing|70",
				"right":"var:preset|spacing|70"
			}
		}
	},
	"className":"has-bounds-border is-style-section-1",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"verticalAlignment":"space-between",
		"justifyContent":"stretch"
	}
} -->
<article class="wp-block-group has-bounds-border is-style-section-1" style="min-height:100%;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__('Post Container', 'x3p0-ideas') ?>"
		},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|40"
			}
		},
		"layout":{
			"type":"default"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:post-featured-image {
			"isLink":true,
			"aspectRatio":"16/9"
		} /-->

		<!-- wp:group {
			"tagName":"header",
			"metadata":{
				"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"
			},
			"layout":{"type":"default"}
		} -->
		<header class="wp-block-group">
			<!-- wp:post-title {"isLink":true} /-->
		</header>
		<!-- /wp:group -->

		<!-- wp:post-excerpt {
			"moreText":"<?= esc_html__('Continue reading &rarr;', 'x3p0-ideas') ?>",
			"showMoreOnNewLine":false,
			"excerptLength":20
		} /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"tagName":"footer",
		"metadata":{
			"name":"<?= esc_attr__('Post Footer', 'x3p0-ideas') ?>"
		},
		"layout":{"type":"default"}
	} -->
	<footer class="wp-block-group">
		<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-short"} /-->
	</footer>
	<!-- /wp:group -->

</article>
<!-- /wp:group -->
