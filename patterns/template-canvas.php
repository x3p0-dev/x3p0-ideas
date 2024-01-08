<?php
/**
 * Title: Canvas Template
 * Slug: x3p0-ideas/template-canvas
 * Description:
 * Inserter: no
 * Template Types: attachment, page, single, singular
 * Categories: x3p0-content
 */
?>
<!-- wp:template-part {"slug":"header","className":"site-header"} /-->

<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__( 'Content', 'x3p0-ideas' ) ?>"},
	"layout":{"type":"default"}
} -->
<main class="wp-block-group">
	<!-- wp:post-content {
		"metadata":{"name":"<?= esc_attr__( 'Post Content', 'x3p0-ideas' ) ?>"},
		"layout":{"type":"constrained"},
		"className":"is-style-prose"
	} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"site-footer"} /-->
