<?php
/**
 * Title: Content: Author
 * Slug: x3p0-ideas/content-author
 * Description:
 * Inserter: no
 * Categories: content
 * Keywords: author, user, content
 */
?>
<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Content', 'x3p0-ideas' ) ?>"},"tagName":"main","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group">

	<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Archive Header', 'x3p0-ideas' ) ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|plus-3","right":"var:preset|spacing|plus-3","bottom":"var:preset|spacing|plus-3","left":"var:preset|spacing|plus-3"},"blockGap":"var:preset|spacing|base"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|plus-2"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:avatar {"size":64} /-->
			<!-- wp:query-title {"type":"archive","showPrefix":false} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-author-biography /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"loop","align":"full","className":"loop"} /-->

</main>
<!-- /wp:group -->
