<?php
/**
 * Title: Content: Search Results
 * Slug: x3p0-ideas/content-search
 * Description:
 * Categories: x3p0-content
 * Keywords: content
 */
?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__( 'Content', 'x3p0-ideas' ) ?>"},
	"tagName":"main",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__( 'Search Header', 'x3p0-ideas' ) ?>"},
		"align":"full",
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"constrained"},
		"className":"is-style-padded"
	} -->
	<div class="is-style-padded wp-block-group alignfull">
		<!-- wp:query-title {"type":"search"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"loop","align":"full","className":"loop"} /-->

</main>
<!-- /wp:group -->
