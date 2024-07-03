<?php

/**
 * Title: Section Header
 * Slug: x3p0-ideas/section-header
 * Categories: x3p0-layout
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\Ideas\Tools\Language;

?>
<!-- wp:group {
	"allowedBlocks":[
		"core/heading",
		"core/paragraph",
		"core/buttons"
	],
	"lock":{
		"move":true,
		"remove":true
	},
	"tagName":"header",
	"metadata":{"name":"<?= esc_attr__('Section Header', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|base"
		}
	},
	"typography":{"textAlign":"center"},
	"layout":{"type":"constrained"}
} -->
<header class="wp-block-group has-text-align-center">

	<!-- wp:heading {
		"lock":{
			"move":false,
			"remove":true
		}
	} -->
	<h2 class="wp-block-heading"><?= esc_html__('Placeholder Heading', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?= esc_html(Language::loremIpsum()) ?></p>
	<!-- /wp:paragraph -->

</header>
<!-- /wp:group -->
