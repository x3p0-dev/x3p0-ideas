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

use X3P0\Ideas\Tools\Language;

$url = home_url();

?>
<!-- wp:group {
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|minus-3"
		}
	},
	"className":"has-global-border is-style-section-1",
	"layout":{"type":"default"},
	"fontSize":"xs"
} -->
<div class="wp-block-group has-global-border is-style-section-1 has-xs-font-size">

	<!-- wp:heading {"level":3,"fontSize":"md"} -->
	<h3 class="wp-block-heading has-md-font-size" id="browse-the-resources"><a href="<?= esc_url($url) ?>"><?= esc_html__('Placeholder Text', 'x3p0-ideas') ?></a></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?= esc_html(Language::loremIpsum(12)) ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
