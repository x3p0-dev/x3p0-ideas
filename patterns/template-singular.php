<?php
/**
 * Title: Singular Template
 * Slug: x3p0-ideas/template-singular
 * Inserter: no
 * Template Types: attachment, page, single, singular
 */
?>
<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__( 'Content', 'x3p0-ideas' ) ?>"},
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3"
			}
		}
	},
	"layout":{"type":"default"}
} -->
<!-- wp:template-part {"slug":"header","className":"site-header"} /-->

<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"tagName":"article",
		"metadata":{"name":"<?= esc_attr__( 'Post', 'x3p0-ideas' ) ?>"},
		"layout":{"type":"default"}
	} -->
	<article class="wp-block-group">

		<!-- wp:group {
			"metadata":{"name":"<?= esc_attr__( 'Post Header', 'x3p0-ideas' ) ?>"},
			"tagName":"header",
			"style":{"spacing":{"blockGap":"0"}},
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-group">
			<!-- wp:post-title {
				"metadata":{"name":"<?= esc_attr__( 'Post Title', 'x3p0-ideas' ) ?>"},
				"level":1
			} /-->
		</header>
		<!-- /wp:group -->

		<!-- wp:post-content {
			"metadata":{"name":"<?= esc_attr__( 'Post Content', 'x3p0-ideas' ) ?>"},
			"layout":{"type":"constrained"},
			"className":"is-style-prose"
		} /-->

	</article>
	<!-- /wp:group -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"site-footer"} /-->
