<?php

/**
 * Title: Hero: Media Right
 * Slug: x3p0-ideas/hero-media-right
 * Categories: featured, x3p0-hero
 * Keywords: hero, intro, about
 * Block Types: core/columns
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$image = get_theme_file_uri('public/media/images/mountain-road.webp');

?>
<!-- wp:group {
	"tagName":"section",
	"metadata":{
		"name":"<?= esc_attr__('Hero: Media Right', 'x3p0-ideas') ?>"
	},
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-4",
				"bottom":"var:preset|spacing|plus-4"
			}
		}
	},
	"className":"is-style-section",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-group alignfull is-style-section" style="padding-top:var(--wp--preset--spacing--plus-4);padding-bottom:var(--wp--preset--spacing--plus-4)">

	<!-- wp:columns {
		"verticalAlignment":"center",
		"align":"full",
		"style":{
			"spacing":{
				"blockGap":{
					"left":"var:preset|spacing|plus-5"
				}
			}
		}
	} -->
	<div class="wp-block-columns alignfull are-vertically-aligned-center">

		<!-- wp:column {
			"verticalAlignment":"center",
			"width":"",
			"layout":{
				"type":"constrained",
				"justifyContent":"left"
			}
		} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"fontSize":"6-xl"} -->
			<h2 class="wp-block-heading has-6-xl-font-size"><?= esc_html__('Jump start your next project with our open-source engine', 'x3p0-ideas') ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum turpis quis metus aliquam, id pharetra arcu dignissim.', 'x3p0-ideas') ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">

				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill">
					<a class="wp-block-button__link wp-element-button"><?= esc_html__('Download', 'x3p0-ideas') ?></a>
				</div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline">
					<a class="wp-block-button__link wp-element-button"><?= esc_html__('Learn More &rarr;', 'x3p0-ideas') ?></a>
				</div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {
			"verticalAlignment":"center",
			"width":"",
			"layout":{"type":"default"}
		} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:image {
				"lightbox":{"enabled":false},
				"aspectRatio":"4/3",
				"scale":"cover",
				"sizeSlug":"full",
				"style":{
					"layout":{
						"selfStretch":"fill",
						"flexSize":null
					}
				}
			} -->
			<figure class="wp-block-image size-full">
				<img src="<?= esc_url($image) ?>" alt="" style="aspect-ratio:4/3;object-fit:cover"/>
			</figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
