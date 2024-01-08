<?php
/**
 * Title: Table of Contents
 * Slug: x3p0-ideas/table-of-contents
 * Description: Displays a post's table of contents within a Group block with a Heading.
 * Categories: text
 * Keywords: table, contents, list
 * Block Types: core/table-of-contents
 * Viewport Width: 640
 */
?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__( 'Table of Contents Container', 'x3p0-ideas' ) ?>"},
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|base",
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3"
			}
		}
	},
	"className":"has-color-var-neutral",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group has-color-var-neutral" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:paragraph {"fontFamily":"primary"} -->
	<p class="has-primary-font-family">
		<strong><?= esc_html__( 'Table of Contents', 'x3p0-ideas' ) ?></strong>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:table-of-contents /-->

</div>
<!-- /wp:group -->
