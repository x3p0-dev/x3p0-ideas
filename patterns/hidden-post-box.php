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
		}
	},
	"className":"is-style-box",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"verticalAlignment":"space-between"
	}
} -->
<article class="wp-block-group is-style-box" style="min-height:100%">

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__('Post Container', 'x3p0-ideas') ?>"
		},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|base"
			}
		},
		"layout":{
			"type":"default"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:post-featured-image {
			"isLink":true,
			"aspectRatio":"16/9",
			"className":"is-style-borderless"
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
			"moreText":"<?= esc_html('Continue reading &rarr;', 'x3p0-ideas') ?>",
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
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|base"
			}
		},
		"layout":{
			"type":"flex",
			"flexWrap":"wrap"
		},
		"className":"is-style-post-byline"
	} -->
	<footer class="wp-block-group is-style-post-byline">

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

</article>
<!-- /wp:group -->
