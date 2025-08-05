<?php

/**
 * Title: Taxonomy Header: Default
 * Slug: x3p0-ideas/taxonomy-header-default
 * Inserter: no
 * Categories: x3p0-layout
 * Viewport Width: 1376
 * Block Types: core/template-part/taxonomy-header
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Taxonomy Header Container', 'x3p0-ideas') ?>"},
	"className": "is-style-query-header",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group is-style-query-header">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Taxonomy Header Content', 'x3p0-ideas') ?>"},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|40"
			}
		},
		"layout":{
			"type":"constrained",
			"justifyContent":"left"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:query-title {
			"type":"archive",
			"showPrefix":false,
			"align":"wide",
			"className":"is-style-text-headline"
		} /-->

		<!-- wp:term-description {"metadata":{
			"x3p0Rules":{"rules":[{"type": "unless", "callback":"is_paged"}]}
		}} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
