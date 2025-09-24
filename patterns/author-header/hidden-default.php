<?php

/**
 * Title: Author Header: Default
 * Slug: x3p0-ideas/author-header-default
 * Inserter: no
 * Categories: x3p0-layout
 * Viewport Width: 1376
 * Block Types: core/template-part/author-header
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Author Header Container', 'x3p0-ideas') ?>"},
	"className": "is-style-query-header",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group is-style-query-header">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Author Header Content', 'x3p0-ideas') ?>"},
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

		<!-- wp:group {
			"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},
			"layout":{"type":"flex","flexWrap":"nowrap"}
		} -->
		<div class="wp-block-group">
			<!-- wp:avatar {"size":64} /-->
			<!-- wp:query-title {
				"type":"archive",
				"showPrefix":false,
				"className":"is-style-text-headline"
			} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-author-biography {"metadata":{
			"x3p0/rules":{"rules":[{"type": "unless", "callback":"is_paged"}]}
		}} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
