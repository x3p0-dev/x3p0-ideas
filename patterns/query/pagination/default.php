<?php

/**
 * Title: Query Pagination: Default
 * Slug: x3p0-ideas/query-pagination-default
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:query-pagination {
	"paginationArrow":"arrow",
	"layout":{
		"type":"flex",
		"justifyContent":"right"
	}
} -->
	<!-- wp:paragraph {
		"metadata":{
			"bindings":{
				"content":{
					"source":"x3p0/theme",
					"args":{
						"key":"paginationLabel"
					}
				}
			},
			"x3p0/rules":{"rules":[{"type": "ifAttribute", "attribute": "content"}]}
		},
		"placeholder":"<?= esc_attr__('Page 3 / 7:', 'x3p0-ideas') ?>",
		"className":"pagination-label"
	} -->
	<p class="pagination-label"></p>
	<!-- /wp:paragraph -->
	<!-- wp:query-pagination-previous /-->
	<!-- wp:query-pagination-numbers /-->
	<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->
