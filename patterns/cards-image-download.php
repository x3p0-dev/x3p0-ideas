<?php

/**
 * Title: Image Download Cards
 * Slug: x3p0-ideas/cards-image-download
 * Categories: gallery, x3p0-grid
 * Keywords: card, download, file, gallery, grid, image, media
 * Viewport Width: 1376
 */

$image = get_theme_file_uri('public/media/images/purple-sunset.webp');
?>
<!-- wp:group {
	"tagName":"section",
	"metadata":{"name":"<?= esc_attr__('Cards Container', 'x3p0-ideas') ?>"},
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"right":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3",
				"top":"var:preset|spacing|plus-4",
				"bottom":"var:preset|spacing|plus-4"
			}
		}
	},
	"gradient":"90-deg-primary-50-transparent",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-group alignfull has-90-deg-primary-50-transparent-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--plus-4);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-4);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"tagName":"header",
		"metadata":{"name":"<?= esc_attr__('Cards Header', 'x3p0-ideas') ?>"},
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"constrained"}
	} -->
	<header class="wp-block-group">

		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?= esc_html__('Placeholder Heading', 'x3p0-ideas') ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum turpis quis metus aliquam, id pharetra arcu dignissim. Sed in sollicitudin mi.', 'x3p0-ideas') ?></p>
		<!-- /wp:paragraph -->

	</header>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Grid', 'x3p0-ideas') ?>"},
		"align":"wide",
		"layout":{"type":"grid","minimumColumnWidth":"16rem"}
	} -->
	<div class="wp-block-group alignwide">

		<?php foreach ($icons as $icon) : ?>

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
				"style":{"spacing":{"blockGap":"0"}},
				"gradient":"180-deg-transparent-base",
				"className":"is-style-card",
				"layout":{
					"type":"flex",
					"orientation":"vertical",
					"justifyContent":"stretch",
					"verticalAlignment":"space-between"
				},
				"fontSize":"sm"
			} -->
			<div class="wp-block-group is-style-card has-180-deg-transparent-base-gradient-background has-background has-sm-font-size">

				<!-- wp:image {
					"lightbox":{"enabled":false},
					"aspectRatio":"16/9",
					"scale":"cover",
					"sizeSlug":"x3p0-16x9-lg",
					"linkDestination":"none",
					"style":{"border":{"radius":"0px"}}
				} -->
				<figure class="wp-block-image size-x3p0-16x9-lg has-custom-border">
					<img src="<?= esc_url($image) ?>" alt="" style="border-radius:0px;aspect-ratio:16/9;object-fit:cover"/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:group {
					"metadata":{"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"},
					"style":{
						"spacing":{
							"blockGap":"var:preset|spacing|base",
							"padding":{
								"top":"var:preset|spacing|plus-4",
								"bottom":"var:preset|spacing|plus-4",
								"left":"var:preset|spacing|plus-3",
								"right":"var:preset|spacing|plus-3"
							}
						}
					},
					"layout":{"type":"constrained"}
				} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-4);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-4);padding-left:var(--wp--preset--spacing--plus-3)">

					<!-- wp:heading {"fontSize":"xl"} -->
					<h2 class="wp-block-heading has-xl-font-size"><?= esc_html__('Placeholder', 'x3p0-ideas') ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'x3p0-ideas') ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {
					"metadata":{"name":"<?= esc_attr__('Card Footer', 'x3p0-ideas') ?>"},
					"style":{
						"typography":{
							"fontStyle":"normal",
							"fontWeight":"600"
						}
					},
					"backgroundColor":"neutral-50",
					"layout":{"type":"default"},
					"fontSize":"xs"
				} -->
				<div class="wp-block-group has-neutral-50-background-color has-background has-xs-font-size" style="font-style:normal;font-weight:600">

					<!-- wp:file {
						"href":"<?= esc_url($image) ?>",
						"showDownloadButton":false,
						"style":{
							"spacing":{
								"padding":{
									"top":"var:preset|spacing|minus-1",
									"bottom":"var:preset|spacing|minus-1"
								}
							},
							"color":{"background":"#ffffff00"}
						},
						"className":"is-style-icon"
					} -->
					<div class="wp-block-file is-style-icon has-background" style="background-color:#ffffff00;padding-top:var(--wp--preset--spacing--minus-1);padding-bottom:var(--wp--preset--spacing--minus-1)">
						<a href="<?= esc_url($image) ?>"><?= esc_html__('Download', 'x3p0-ideas') ?></a>
					</div>
					<!-- /wp:file -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
