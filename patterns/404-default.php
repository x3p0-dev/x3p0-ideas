<?php
/**
 * Title: 404: Default
 * Slug: x3p0-ideas/404-default
 * Description:
 * Categories: content
 * Keywords: 404
 */
?>
<!-- wp:group {"tagName":"article","layout":{"type":"default"}} -->
<article class="wp-block-group">

	<!-- wp:group {"tagName":"header","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<header class="wp-block-group">
		<!-- wp:heading {"level":1} -->
		<h1 class="wp-block-heading"><?= esc_html__( '404: Nothing Found', 'x3p0-ideas' ) ?></h1>
		<!-- /wp:heading -->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">

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
