<?php
/**
 * Title: Single Template
 * Slug: x3p0-ideas/template-single
 * Inserter: no
 * Template Types: attachment, page, single, singular
 */
?>
<!-- wp:template-part {"slug":"header","className":"site-header"} /-->

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
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__( 'Post', 'x3p0-ideas' ) ?>"},
		"tagName":"article",
		"layout":{"type":"default"}
	} -->
	<article class="wp-block-group">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{"name":"<?= esc_attr__( 'Post Header', 'x3p0-ideas' ) ?>"},
			"style":{"spacing":{"blockGap":"0"}},
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-group">

			<!-- wp:group {
				"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
				"layout":{"type":"flex","flexWrap":"wrap"},
				"fontFamily":"tertiary"
			} -->
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
			"tagName":"footer",
			"metadata":{"name":"<?= esc_attr__( 'Post Footer', 'x3p0-ideas' ) ?>"},
			"layout":{"type":"constrained"},
			"fontFamily":"tertiary"
		} -->
		<footer class="wp-block-group has-tertiary-font-family">

			<!-- wp:group {
				"style":{"spacing":{"blockGap":"0"}},
				"layout":{"type":"constrained"}
			} -->
			<div class="wp-block-group">
				<!-- wp:post-terms {"term":"category","className":"is-style-icon"} /-->
				<!-- wp:post-terms {"term":"post_tag","className":"is-style-icon"} /-->
			</div>
			<!-- /wp:group -->

		</footer>
		<!-- /wp:group -->

	</article>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"x3p0-ideas/comments-default"} /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"site-footer"} /-->
