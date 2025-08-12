<?php

/**
 * Title: Hero: Featured
 * Slug: x3p0-ideas/hero-featured
 * Description: Make a statement.
 * Categories: featured, x3p0-hero
 * Keywords: hero, cover, intro, about
 * Block Types: core/cover
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$image = get_theme_file_uri('public/media/images/mountain-road.webp');

?>
<!-- wp:cover {
	"metadata":{"name":"<?= esc_attr__('Hero: Featured', 'x3p0-ideas') ?>"},
	"url":"<?= esc_url($image) ?>",
	"hasParallax":true,
	"dimRatio":100,
	"minHeight":90,
	"minHeightUnit":"vh",
	"gradient":"45-deg-dark-transparent",
	"contentPosition":"bottom left",
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|90",
				"right":"var:preset|spacing|70",
				"bottom":"var:preset|spacing|90",
				"left":"var:preset|spacing|70"
			}
		}
	},
	"className": "is-style-cover-dark",
	"layout":{"type":"default"}
} -->
<div class="wp-block-cover alignfull is-style-cover-dark has-parallax has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--70);min-height:90vh">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim has-background-dim-100 wp-block-cover__gradient-background has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
	<div role="img" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?= esc_url($image) ?>)"></div>

	<div class="wp-block-cover__inner-container">

		<!-- wp:group {
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|30"
				}
			},
			"layout":{
				"type":"constrained",
				"justifyContent":"left"
			}
		} -->
		<div class="wp-block-group">

			<!-- wp:heading {
				"level":1,
				"align":"wide",
				"className":"has-text-shadow-sm",
				"fontSize":"5-xl"
			} -->
			<h1 class="wp-block-heading alignwide has-text-shadow-sm has-5-xl-font-size"><?php esc_html_e("Hello. I&#8217;m Jordan Doe.", 'x3p0-ideas') ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"has-text-shadow-sm","fontSize":"xl"} -->
			<p class="has-text-shadow-sm has-xl-font-size"><?php esc_html_e('Wanderer — Adventurer', 'x3p0-ideas') ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"has-text-shadow-sm"} -->
			<p class="has-text-shadow-sm"><?php esc_html_e("I&#8217;ve walked miles upon miles of desert, climbed mountains, and soared through the skies. Yet, there is so much more to do—a thousand more lifetimes to live, loves to love, and journeys to trek.", 'x3p0-ideas') ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"var:preset|spacing|px"} -->
			<div style="height:var(--wp--preset--spacing--px)" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-button-outlined"} -->
				<div class="wp-block-button is-style-button-outlined">
					<a class="wp-block-button__link wp-element-button"><?php esc_html_e('More About Me →', 'x3p0-ideas') ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->
	</div>

</div>
<!-- /wp:cover -->
