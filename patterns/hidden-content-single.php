<?php
/**
 * Title: Content: Single
 * Slug: x3p0-ideas/content-single
 * Description:
 * Inserter: no
 * Categories: content
 * Keywords: content
 */
?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__( 'Content', 'x3p0-ideas' ) ?>"},
	"tagName":"main",
	"layout":{"type":"default"},
	"className":"is-style-padded-y"
} -->
<main class="is-style-padded-y wp-block-group">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__( 'Post', 'x3p0-ideas' ) ?>"},
		"tagName":"article",
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
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},"layout":{"type":"flex","flexWrap":"wrap"},"fontFamily":"tertiary"} -->
			<div class="wp-block-group has-tertiary-font-family">
				<!-- wp:post-date {
					"metadata":{"name":"<?= esc_attr__( 'Post Date', 'x3p0-ideas' ) ?>"}
				} /-->
			</div>
			<!-- /wp:group -->
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

		<!-- wp:group {
			"metadata":{"name":"<?= esc_attr__( 'Post Footer', 'x3p0-ideas' ) ?>"},
			"tagName":"footer",
			"layout":{"type":"constrained"},
			"fontFamily":"tertiary"
		} -->
		<footer class="wp-block-group has-tertiary-font-family">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:post-terms {"term":"category","className":"is-style-icon"} /-->
				<!-- wp:post-terms {"term":"post_tag","className":"is-style-icon"} /-->
			</div>
			<!-- /wp:group -->
		</footer>
		<!-- /wp:group -->

	</article>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"comments","align":"full"} /-->

</main>
<!-- /wp:group -->
