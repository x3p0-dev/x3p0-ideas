<?php
/**
 * Title: Content: 404
 * Slug: x3p0-ideas/content-404
 * Description:
 * Categories: x3p0-content
 * Keywords: 404, content
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
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {"tagName":"article"} -->
	<article class="wp-block-group">

		<!-- wp:group {
			"tagName":"header",
			"style":{"spacing":{"blockGap":"0"}},
			"layout":{"type":"constrained"}
		} -->
		<header class="wp-block-group">
			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading">
				<?= esc_html__( '404: Nothing Found', 'x3p0-ideas' ) ?>
			</h1>
			<!-- /wp:heading -->
		</header>
		<!-- /wp:group -->

		<!-- wp:group {
			"layout":{"type":"constrained"},
			"className":"is-style-prose"
		} -->
		<div class="wp-block-group is-style-prose">

			<!-- wp:paragraph -->
			<p><?= esc_html__( 'It looks like you stumbled upon a page that does not exist. Perhaps rolling the dice with a search might help:', 'x3p0-ideas' ) ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:search {
				"label":"<?= esc_html__( 'Search', 'x3p0-ideas' ) ?>",
				"showLabel":false,
				"placeholder":"<?= esc_attr__( 'Enter search terms...', 'x3p0-ideas' ) ?>",
				"buttonText":"<?= esc_html__( 'Search', 'x3p0-ideas' ) ?>",
				"buttonPosition":"button-inside"
			} /-->

		</div>
		<!-- /wp:group -->

	</article>
	<!-- /wp:group -->

</main>
<!-- /wp:group -->
