<?php

/**
 * Title: Footnotes Card
 * Slug: x3p0-ideas/card-footnotes
 * Description: Displays a post's footnotes within a Group block with a Heading.
 * Categories: text, x3p0-card
 * Keywords: footnotes, text, cite
 * Block Types: core/footnotes
 * Viewport Width: 640
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Footnotes Card', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|40",
			"padding":{
				"top":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|70",
				"left":"var:preset|spacing|70",
				"right":"var:preset|spacing|70"
			}
		}
	},
	"className":"has-global-border is-style-section-1",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group has-global-border is-style-section-1" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:paragraph {"fontFamily":"primary"} -->
	<p class="has-primary-font-family"><strong><?= esc_html__('Footnotes', 'x3p0-ideas') ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:footnotes {"className":"is-style-list-pull"} /-->

</div>
<!-- /wp:group -->
