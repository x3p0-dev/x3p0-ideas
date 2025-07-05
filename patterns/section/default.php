<?php

/**
 * Title: Section
 * Slug: x3p0-ideas/section-default
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
				"right":"var:preset|spacing|70",
				"left":"var:preset|spacing|70",
				"top":"var:preset|spacing|80",
				"bottom":"var:preset|spacing|80"
			}
		}
	},
	"align":"full",
	"className":"is-style-section-1",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-group alignfull is-style-section-1" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--70)">

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
