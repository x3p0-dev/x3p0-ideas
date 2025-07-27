<?php

/**
 * Title: Call to Action
 * Slug: x3p0-ideas/call-to-action
 * Categories: banner, call-to-action, text
 * Block Types: x3p0/call-to-action
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\Ideas\Tools\Placeholder;

?>
<!-- wp:group {
	"align":"wide",
	"className":"is-style-section-1",
	"style":{
		"typography":{
			"textAlign":"center"
		}
	},
	"layout":{
		"type":"constrained"
	}
} -->
<div class="wp-block-group has-text-align-center alignwide is-style-section-1">

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?= esc_html__('Placeholder Heading', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?= esc_html(Placeholder::text()) ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {
		"layout":{
			"type":"flex",
			"justifyContent":"center"
		}
	} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?= esc_html__('Placeholder Button', 'x3p0-ideas')?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
