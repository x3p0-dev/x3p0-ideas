<?php

/**
 * Title: Table of Contents Card
 * Slug: x3p0-ideas/card-table-of-contents
 * Description: Displays a post's table of contents within a Group block with a Heading.
 * Categories: text, x3p0-card
 * Keywords: table, contents, list
 * Block Types: core/table-of-contents
 * Viewport Width: 640
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Table of Contents Card', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|base"
		}
	},
	"className":"is-style-card",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group is-style-card">

	<!-- wp:paragraph {"fontFamily":"primary"} -->
	<p class="has-primary-font-family"><strong><?= esc_html__('Table of Contents', 'x3p0-ideas') ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:table-of-contents {"className":"is-style-pull"} /-->

</div>
<!-- /wp:group -->
