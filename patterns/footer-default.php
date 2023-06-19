<?php
/**
 * Title: Footer: Default
 * Slug: x3p0-ideas/footer-default
 * Description:
 * Categories: theme
 * Keywords: footer
 * Block Types: core/template-part/footer
 * Viewport Width: 1376
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|plus-6","right":"var:preset|spacing|plus-3","bottom":"var:preset|spacing|plus-6","left":"var:preset|spacing|plus-3"}}}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-6);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-6);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:social-links {"showLabels":true,"size":"has-normal-icon-size","className":"is-style-outline","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-visible-labels is-style-outline">
		<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
		<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
		<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
		<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
		<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
	</ul>
	<!-- /wp:social-links -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"textAlign":"center","isLink":false,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} /-->

		<?php if ( ! WP_Block_Type_Registry::get_instance()->is_registered( 'x3p0/powered-by' ) ) : ?>
			<!-- wp:x3p0/powered-by {"poweredByType":"emoji","textAlign":"center"} /-->
		<?php else : ?>
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php esc_html_e( 'Powered by WordPress, crazy ideas, and passion.', 'x3p0-ideas' ) ?></p>
			<!-- /wp:paragraph -->
		<?php endif ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
