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

use X3P0\Ideas\Tools\Placeholder;

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
				"top":"var:preset|spacing|90",
				"bottom":"var:preset|spacing|90",
				"left":"var:preset|spacing|70",
				"right":"var:preset|spacing|70"
			}
		}
	},
	"className":"is-style-section-1",
	"layout":{"type":"default"}
} -->
<section class="wp-block-group alignfull is-style-section-1" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:columns {
		"verticalAlignment":"center",
		"style":{
			"spacing":{
				"blockGap":{
					"top":"var:preset|spacing|70",
					"left":"var:preset|spacing|90"
				}
			}
		}
	} -->
	<div class="wp-block-columns are-vertically-aligned-center">

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
			<h2 class="wp-block-heading has-6-xl-font-size"><?= esc_html(Placeholder::text(8, '')) ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?= esc_html(Placeholder::text(20)) ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">

				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill">
					<a class="wp-block-button__link wp-element-button"><?= esc_html__('Download', 'x3p0-ideas') ?></a>
				</div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-button-secondary"} -->
				<div class="wp-block-button is-style-button-secondary">
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
				<img src="<?= esc_url(Placeholder::image('placeholder-01-square.webp')) ?>" alt="" style="aspect-ratio:4/3;object-fit:cover"/>
			</figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
