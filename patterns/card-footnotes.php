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
			"blockGap":"var:preset|spacing|base"
		}
	},
	"className":"has-global-border is-style-section-3",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group has-global-border is-style-section-3">

	<!-- wp:paragraph {"fontFamily":"primary"} -->
	<p class="has-primary-font-family"><strong><?= esc_html__('Footnotes', 'x3p0-ideas') ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:footnotes {"className":"is-style-pull"} /-->

</div>
<!-- /wp:group -->
