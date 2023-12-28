<?php
/**
 * Title: Header: Default
 * Slug: x3p0-ideas/header-default
 * Description:
 * Categories: header
 * Keywords: header
 * Block Types: core/template-part/header
 * Viewport Width: 1376
 */
?>
<!-- wp:group {
	"metadata":{
		"name":"<?= esc_attr__( 'Header: Container', 'x3p0-ideas' ) ?>"
	},
	"className":"is-style-padded pattern-header-default",
	"layout":{
		"type":"default"
	}
} -->
<div class="wp-block-group is-style-padded pattern-header-default">
	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__( 'Header: Inner Content', 'x3p0-ideas' ) ?>"
		},
		"layout":{
			"type":"flex",
			"justifyContent":"space-between"
		}
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
