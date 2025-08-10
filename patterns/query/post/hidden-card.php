<?php

/**
 * Title: Post: Card
 * Slug: x3p0-ideas/post-card
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
			"padding":{
				"top":"0",
				"bottom":"0",
				"left":"0",
				"right":"0"
			},
			"blockGap":"0"
		},
		"dimensions":{"minHeight":"100%"}
	},
	"className":"has-global-border is-style-section-1",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"stretch"
	}
} -->
<article class="wp-block-group has-global-border is-style-section-1" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100%">

	<!-- wp:post-featured-image {
		"isLink":true,
		"aspectRatio":"auto",
		"width":"100%",
		"height":"18rem",
		"style":{
			"border":{
				"radius":"0px"
			},
			"layout":{
				"selfStretch":"fixed",
				"flexSize":"18rem"
			}
		},
		"className":"is-style-borderless"
	} /-->

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__('Post Container', 'x3p0-ideas') ?>"
		},
		"style":{
			"dimensions":{
				"minHeight":""
			},
			"layout":{
				"selfStretch":"fill",
				"flexSize":null
			},
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				},
				"blockGap":"var:preset|spacing|40"
			}
		},
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"justifyContent":"stretch"
		}
	} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{
				"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"
			},
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|20"
				}
			},
			"layout":{
				"type":"constrained"
			}
		} -->
		<header class="wp-block-group">
			<!-- wp:post-title {"isLink":true} /-->
		</header>
		<!-- /wp:group -->

		<!-- wp:post-excerpt {
			"moreText":"<?= esc_attr__('Continue reading &rarr;', 'x3p0-ideas') ?>",
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
				"padding":{
					"top":"var:preset|spacing|40",
					"bottom":"var:preset|spacing|40",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				}
			}
		},
		"className":"is-style-section-2",
		"layout":{"type":"default"}
	} -->
	<footer class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-short"} /-->

	</footer>
	<!-- /wp:group -->

</article>
<!-- /wp:group -->
