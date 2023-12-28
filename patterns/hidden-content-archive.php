<?php
/**
 * Title: Content: Archive
 * Slug: x3p0-ideas/content-archive
 * Description:
 * Inserter: no
 * Categories: content
 * Keywords: archive, content
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
		"metadata":{"name":"<?= esc_attr__( 'Archive Header', 'x3p0-ideas' ) ?>"},
		"align":"full",
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"constrained"},
		"className":"is-style-padded"
	} -->
	<div class="is-style-padded wp-block-group alignfull">
		<!-- wp:query-title {"type":"archive","showPrefix":false} /-->
		<!-- wp:term-description /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"loop","align":"full","className":"loop"} /-->

</main>
<!-- /wp:group -->
