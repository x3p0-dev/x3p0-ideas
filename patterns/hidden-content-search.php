<?php
/**
 * Title: Content: Search Results
 * Slug: x3p0-ideas/content-search
 * Description:
 * Inserter: no
 * Categories: content
 * Keywords: content
 */
?>
<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Content', 'x3p0-ideas' ) ?>"},"tagName":"main","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__( 'Search Header', 'x3p0-ideas' ) ?>"},
		"align":"full",
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|plus-3",
					"right":"var:preset|spacing|plus-3",
					"bottom":"var:preset|spacing|plus-3",
					"left":"var:preset|spacing|plus-3"
				},
				"blockGap":"var:preset|spacing|base"
			}
		},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">
		<!-- wp:query-title {"type":"search"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"loop","align":"full","className":"loop"} /-->

</main>
<!-- /wp:group -->
