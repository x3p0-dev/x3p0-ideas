<?php

/**
 * Title: Header: Centered
 * Slug: x3p0-ideas/header-centered
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
	"metadata":{"name":"<?= esc_attr__('Header Content', 'x3p0-ideas') ?>"},
	"align":"full",
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
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"center"
	},
	"className":"is-style-site-header"
} -->
<div class="wp-block-group alignfull is-style-site-header" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Branding', 'x3p0-ideas') ?>"},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|minus-1"
			},
			"layout":{
				"selfStretch":"fill",
				"flexSize":null
			}
		},
		"layout":{
			"type":"flex",
			"flexWrap":"nowrap",
			"justifyContent":"center"
		}
	} -->
	<div class="wp-block-group">
		<!-- wp:site-logo /-->
		<!-- wp:site-title /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:navigation {
		"icon":"menu",
		"layout":{
			"type":"flex",
			"setCascadingProperties":true,
			"justifyContent":"center"
		}
	} /-->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"x3p0-ideas/breadcrumbs"} /-->
