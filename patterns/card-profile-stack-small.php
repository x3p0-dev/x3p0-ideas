<?php

/**
 * Title: Small Vertical Profile Card
 * Slug: x3p0-ideas/card-profile-stack-small
 * Categories: team, x3p0-card
 * Keywords: card, grid, profile, team
 * Viewport Width: 480
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{"blockGap":"var:preset|spacing|base"}
	},
	"textColor":"neutral-500",
	"gradient":"180-deg-transparent-base",
	"className":"is-style-card",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"center"
	},
	"fontSize":"sm"
} -->
<div class="wp-block-group is-style-card has-neutral-500-color has-180-deg-transparent-base-gradient-background has-text-color has-background has-sm-font-size">

	<!-- wp:avatar {
		"userId":1,
		"isLink":true,
		"className":""
	} /-->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"},
		"style":{"spacing":{"blockGap":"0"}},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group">

		<!-- wp:heading {
			"textAlign":"center",
			"level":3,
			"textColor":"contrast",
			"fontSize":"lg"
		} -->
		<h3 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-lg-font-size"><?= esc_html__('User Name', 'x3p0-ideas') ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?= esc_html__('Placeholder Text', 'x3p0-ideas') ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
