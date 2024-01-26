<?php

/**
 * Title: Header: Small
 * Slug: x3p0-ideas/header-small
 * Description:
 * Categories: header
 * Keywords: header
 * Block Types: core/template-part/header
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Header Container', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3"
			}
		}
	},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Header Content', 'x3p0-ideas') ?>"},
		"layout":{"type":"flex","justifyContent":"space-between"}
	} -->
	<div class="wp-block-group">
		<!-- wp:site-title /-->
		<!-- wp:navigation {
			"icon":"menu",
			"layout":{
				"type":"flex",
				"setCascadingProperties":true,
				"justifyContent":"right"
			}
		} /-->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"x3p0-ideas/breadcrumbs"} /-->
