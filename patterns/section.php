<?php

/**
 * Title: Section
 * Slug: x3p0-ideas/section
 * Categories: x3p0-layout
 * Viewport Width: 640
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"section",
	"metadata":{"name":"<?= esc_attr__('Section', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"right":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3",
				"top":"var:preset|spacing|plus-4",
				"bottom":"var:preset|spacing|plus-4"
			}
		}
	},
	"align":"full",
	"className":"is-style-section-4",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-group alignfull is-style-section-4" style="padding-top:var(--wp--preset--spacing--plus-4);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-4);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:pattern {"slug":"x3p0-ideas/section-header"} /-->

	<!-- wp:group {
		"lock":{
			"move":true,
			"remove":true
		},
		"metadata":{"name":"<?= esc_attr__('Section Content', 'x3p0-ideas') ?>"},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group"></div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
