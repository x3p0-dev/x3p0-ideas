<?php
/**
 * Title: Index Template
 * Slug: x3p0-ideas/template-index
 * Description:
 * Inserter: no
 * Template Types: home, archive
 * Categories: x3p0-content
 */
?>
<!-- wp:template-part {"slug":"header","className":"site-header"} /-->

<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__( 'Content', 'x3p0-ideas' ) ?>"},
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group">
	<!-- wp:template-part {"slug":"loop","align":"full","className":"loop"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"site-footer"} /-->
