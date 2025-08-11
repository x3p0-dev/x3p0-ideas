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
	"metadata":{"name":"<?= esc_attr__('Site Header', 'x3p0-ideas') ?>"},
	"align":"full",
	"className": "is-style-site-header",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull is-style-site-header">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Header Content', 'x3p0-ideas') ?>"},
		"align":"full",
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|70",
					"right":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70"
				}
			}
		},
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"justifyContent":"center"
		}
	} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:group {
			"metadata":{"name":"<?= esc_attr__('Branding', 'x3p0-ideas') ?>"},
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|30"
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

	<!-- wp:pattern {"slug":"x3p0-ideas/breadcrumbs-centered"} /-->

</div>
<!-- /wp:group -->
