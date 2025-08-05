<?php

/**
 * Title: Search Header: Default
 * Slug: x3p0-ideas/search-header-default
 * Inserter: no
 * Categories: x3p0-layout
 * Viewport Width: 1376
 * Block Types: core/template-part/search-header
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Search Header Container', 'x3p0-ideas') ?>"},
	"align":"full",
	"className": "is-style-archive-header",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull is-style-archive-header">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Search Header Content', 'x3p0-ideas') ?>"},
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
			"type":"search",
			"showPrefix":false,
			"align":"wide",
			"className":"is-style-text-headline"
		} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
