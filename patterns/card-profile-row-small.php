<?php

/**
 * Title: Small Horizontal Profile Card
 * Slug: x3p0-ideas/card-profile-row-small
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
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|base",
				"bottom":"var:preset|spacing|base",
				"left":"var:preset|spacing|base",
				"right":"var:preset|spacing|base"
			},
			"blockGap":"var:preset|spacing|base"
		}
	},
	"gradient":"180-deg-transparent-base",
	"className":"is-style-card",
	"layout":{
		"type":"flex",
		"flexWrap":"nowrap"
	},
	"fontSize":"sm"
} -->
<div class="wp-block-group is-style-card has-180-deg-transparent-base-gradient-background has-background has-sm-font-size" style="padding-top:var(--wp--preset--spacing--base);padding-right:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--base);padding-left:var(--wp--preset--spacing--base)">

	<!-- wp:avatar {
		"userId":1,
		"size":80,
		"isLink":true,
		"className":""
	} /-->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
		"style":{"spacing":{"blockGap":"0"}},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group">

		<!-- wp:heading {
			"level":3,
			"textColor":"contrast",
			"fontSize":"lg"
		} -->
		<h3 class="wp-block-heading has-contrast-color has-text-color has-lg-font-size"><?= esc_html__('User Name', 'x3p0-ideas') ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?= esc_html__('User Role', 'x3p0-ideas') ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
