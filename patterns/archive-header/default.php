<?php

/**
 * Title: Archive Header: Default
 * Slug: x3p0-ideas/archive-header-default
 * Inserter: no
 * Categories: x3p0-layout
 * Viewport Width: 1376
 * Block Types: core/template-part/archive-header
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Archive Header Content', 'x3p0-ideas') ?>"},
	"align":"full",
	"className":"is-style-section-2",
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|base",
			"padding":{
				"top":"var:preset|spacing|plus-6",
				"bottom":"var:preset|spacing|plus-6"
			}
		}
	},
	"layout":{
		"type":"constrained",
		"justifyContent":"left"
	}
} -->
<div class="wp-block-group alignfull is-style-section-2" style="padding-top:var(--wp--preset--spacing--plus-6);padding-bottom:var(--wp--preset--spacing--plus-6)">

	<!-- wp:query-title {
		"type":"archive",
		"showPrefix":false,
		"align":"wide",
		"className":"is-style-text-headline"
	} /-->

	<!-- wp:term-description {"metadata":{"@unless":"is_paged"}} /-->

</div>
<!-- /wp:group -->
