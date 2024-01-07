<?php
/**
 * Title: Hero: Featured
 * Slug: x3p0-ideas/hero-featured
 * Description: Make a statement.
 * Categories: featured
 * Keywords: hero, cover, intro, about
 * Block Types: core/cover
 * Viewport Width: 1376
 */
$image = get_theme_file_uri( 'public/media/images/purple-sunset.webp' );
?>
<!-- wp:cover {
	"metadata":{"name":"<?php esc_attr_e( 'Hero: Featured', 'x3p0-ideas' ) ?>"},
	"url":"<?= esc_url( $image ) ?>",
	"id":2268,
	"hasParallax":true,
	"dimRatio":50,
	"minHeight":90,
	"minHeightUnit":"vh",
	"gradient":"fabled-sunset",
	"contentPosition":"bottom left",
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-5",
				"right":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-5",
				"left":"var:preset|spacing|plus-3"
			}
		}
	},
	"layout":{"type":"default"}
} -->
<div class="wp-block-cover alignfull has-parallax has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--plus-5);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-5);padding-left:var(--wp--preset--spacing--plus-3);min-height:90vh">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-fabled-sunset-gradient-background"></span>
	<div role="img" class="wp-block-cover__image-background wp-image-2268 has-parallax" style="background-position:50% 50%;background-image:url(<?= esc_url( $image ) ?>)"></div>

	<div class="wp-block-cover__inner-container">

		<!-- wp:group {
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|minus-1"
				}
			},
			"layout":{
				"type":"constrained",
				"justifyContent":"left"
			}
		} -->
		<div class="wp-block-group">

			<!-- wp:heading {
				"align":"wide",
				"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},
				"className":"has-text-shadow-sm",
				"fontSize":"5-xl"
			} -->
			<h2 class="wp-block-heading alignwide has-text-shadow-sm has-5-xl-font-size" style="font-style:normal;font-weight:900"><?php esc_html_e( "Hello. I'm Jordan Doe.", 'x3p0-ideas' ) ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"has-text-shadow-sm","fontSize":"xl"} -->
			<p class="has-text-shadow-sm has-xl-font-size"><?php esc_html_e( 'Wanderer — Adventurer', 'x3p0-ideas' ) ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"has-text-shadow-sm"} -->
			<p class="has-text-shadow-sm"><?php esc_html_e( "I've walked miles upon miles of desert, climbed mountains, and soared through the skies. Yet, there is so much more to do—a thousand more lifetimes to live, loves to love, and journeys to trek.", 'x3p0-ideas' ) ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"var:preset|spacing|px"} -->
			<div style="height:var(--wp--preset--spacing--px)" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline">
					<a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'More About Me →', 'x3p0-ideas' ) ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->
	</div>

</div>
<!-- /wp:cover -->
