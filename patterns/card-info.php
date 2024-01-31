<?php

/**
 * Title: Info Card
 * Slug: x3p0-ideas/card-info
 * Categories: x3p0-card
 * Keywords: card, grid
 * Viewport Width: 480
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|minus-3"
		}
	},
	"className":"is-style-card",
	"layout":{"type":"default"},
	"fontSize":"xs"
} -->
<div class="wp-block-group is-style-card has-xs-font-size">

	<!-- wp:heading {"level":3,"fontSize":"md"} -->
	<h3 class="wp-block-heading has-md-font-size" id="browse-the-resources"><a href="#"><?= esc_html__('Placeholder Text', 'x3p0-ideas') ?></a></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in sollicitudin mi.', 'x3p0-ideas') ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
