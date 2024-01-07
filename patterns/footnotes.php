<?php
/**
 * Title: Footnotes
 * Slug: x3p0-ideas/footnotes
 * Description: Displays a post's footnotes within a Group block with a Heading.
 * Categories: text
 * Keywords: footnotes, text, cite
 * Block Types: core/footnotes
 * Viewport Width: 640
 */
?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__( 'Footnotes Container', 'x3p0-ideas' ) ?>"},
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"className":"pattern-footnotes has-color-var-neutral",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group pattern-footnotes has-color-var-neutral">
	<!-- wp:paragraph -->
		<p><strong><?php esc_html_e( 'Footnotes', 'x3p0-ideas' ) ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:footnotes {"className":"is-style-pull"} /-->
</div>
<!-- /wp:group -->
