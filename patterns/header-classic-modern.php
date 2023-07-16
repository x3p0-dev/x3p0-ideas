<?php
/**
 * Title: Header: Classic Modern
 * Slug: x3p0-ideas/header-classic-modern
 * Description:
 * Categories: header
 * Keywords: header
 * Block Types: core/template-part/header
 * Viewport Width: 1376
 */
$image = get_theme_file_uri( 'public/media/purple-sunset.webp' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","margin":{"bottom":"var:preset|spacing|plus-3"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|plus-2","bottom":"var:preset|spacing|plus-2","right":"var:preset|spacing|plus-3","left":"var:preset|spacing|plus-3"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-2);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-2);padding-left:var(--wp--preset--spacing--plus-3)">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group">
			<!-- wp:site-title /-->
			<!-- wp:site-tagline {"style":{"typography":{"fontStyle":"italic","fontWeight":"400"}},"fontSize":"sm","fontFamily":"tertiary"} /-->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:cover {"url":"<?= esc_url( $image ) ?>","id":2268,"dimRatio":0,"focalPoint":{"x":0.5,"y":1},"minHeight":24,"minHeightUnit":"rem","align":"full","style":{"color":{}}} -->
	<div class="wp-block-cover alignfull" style="min-height:24rem">

		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
		<img class="wp-block-cover__image-background wp-image-2268" alt="" src="<?= esc_url( $image ) ?>" style="object-position:50% 100%" data-object-fit="cover" data-object-position="50% 100%"/>

		<div class="wp-block-cover__inner-container">
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"></p>
			<!-- /wp:paragraph -->
		</div>

	</div>
	<!-- /wp:cover -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|base","bottom":"var:preset|spacing|base","right":"var(\u002d\u002dtheme-spacing\u002d\u002dplus-3)","left":"var(\u002d\u002dtheme-spacing\u002d\u002dplus-3)"}}},"backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--base);padding-right:var(--theme-spacing--plus-3);padding-bottom:var(--wp--preset--spacing--base);padding-left:var(--theme-spacing--plus-3)">

		<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group">

			<!-- wp:navigation {"ref":113,"icon":"menu","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left"}} /-->

			<!-- wp:social-links {"iconBackgroundColor":{},"size":"has-normal-icon-size","className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
			<ul class="wp-block-social-links has-normal-icon-size is-style-default">
				<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
				<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
				<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
			</ul>
			<!-- /wp:social-links -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
