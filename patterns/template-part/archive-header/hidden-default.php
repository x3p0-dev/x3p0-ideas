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
			"blockGap":"var:preset|spacing|40",
			"padding":{
				"top":"var:preset|spacing|100",
				"bottom":"var:preset|spacing|100"
			}
		}
	},
	"layout":{
		"type":"constrained",
		"justifyContent":"left"
	}
} -->
<div class="wp-block-group alignfull is-style-section-2" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">

	<!-- wp:query-title {
		"type":"archive",
		"showPrefix":false,
		"align":"wide",
		"className":"is-style-text-headline"
	} /-->

	<!-- wp:paragraph {
		"metadata": {
			"bindings":{
				"content":{
					"source":"x3p0/general",
					"args":{
						"key":"queryDescription"
					}
				}
			},
			"x3p0Rules": {"rules":[
				{"type": "unless", "callback": "is_paged"},
				{"type": "ifAttribute", "attribute": "content"}
			]}
		},
		"placeholder":"<?= esc_attr__('You are viewing the site archives.', 'x3p0-ideas') ?>"
	} -->
	<p></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
