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
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"className":"is-style-card",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group is-style-card">

	<!-- wp:paragraph {"fontFamily":"primary"} -->
	<p class="has-primary-font-family"><strong><?= esc_html__('Footnotes', 'x3p0-ideas') ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:footnotes {"className":"is-style-pull"} /-->

</div>
<!-- /wp:group -->
