<?php

/**
 * Title: Text Reveal Cards
 * Slug: x3p0-ideas/cards-reveal-text
 * Categories: x3p0-grid
 * Keywords: card, cover, grid, hover, reveal
 * Block Types: core/cover
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$url   = home_url();
$image = get_theme_file_uri('public/media/images/mountain-road.webp');

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
	"gradient":"90-deg-neutral-50-transparent",
	"layout":{"type":"default"}
} -->
<section class="wp-block-group alignfull has-90-deg-neutral-50-transparent-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--plus-4);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-4);padding-left:var(--wp--preset--spacing--plus-3)">

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
		"layout":{"type":"grid","minimumColumnWidth":"16rem"}
	} -->
	<div class="wp-block-group">

		<?php foreach (range(1, 4) as $card) : ?>

			<!-- wp:cover {
				"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
				"url":"<?= esc_url($image) ?>",
				"dimRatio":50,
				"overlayColor":"contrast",
				"minHeight":20,
				"minHeightUnit":"vh",
				"style":{
					"spacing":{
						"padding":{
							"top":"var:preset|spacing|plus-3",
							"bottom":"var:preset|spacing|plus-3",
							"left":"var:preset|spacing|plus-3",
							"right":"var:preset|spacing|plus-3"
						}
					}
				},
				"className":"is-style-reveal-text",
				"layout":{"type":"default"},
				"fontSize":"sm"
			} -->
			<div class="wp-block-cover is-style-reveal-text has-sm-font-size" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:20vh">

				<span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim"></span>
				<img class="wp-block-cover__image-background" alt="" src="<?= esc_url($image) ?>" data-object-fit="cover"/>

				<div class="wp-block-cover__inner-container">

					<!-- wp:group {
						"metadata":{"name":"<?= esc_attr__('Card Container', 'x3p0-ideas') ?>"},
						"align":"full",
						"style":{
							"dimensions":{"minHeight":"24rem"}
						},
						"layout":{
							"type":"flex",
							"orientation":"vertical",
							"verticalAlignment":"space-between"
						}
					} -->
					<div class="wp-block-group alignfull" style="min-height:24rem">

						<!-- wp:group {
							"metadata":{"name":"<?= esc_attr__('Card Label', 'x3p0-ideas') ?>"},
							"style":{
								"spacing":{
									"padding":{
										"top":"var:preset|spacing|minus-3",
										"bottom":"var:preset|spacing|minus-3",
										"left":"var:preset|spacing|base",
										"right":"var:preset|spacing|base"
									}
								}
							},
							"backgroundColor":"primary-700",
							"layout":{"type":"default"}
						} -->
						<div class="wp-block-group has-primary-700-background-color has-background" style="padding-top:var(--wp--preset--spacing--minus-3);padding-right:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--minus-3);padding-left:var(--wp--preset--spacing--base)">

							<!-- wp:paragraph -->
							<p><?= esc_html__('Placeholder', 'x3p0-ideas') ?></p>
							<!-- /wp:paragraph -->

						</div>
						<!-- /wp:group -->

						<!-- wp:group {
							"metadata":{"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"},
							"style":{
								"spacing":{
									"blockGap":"var:preset|spacing|minus-3"
								}
							},
							"layout":{"type":"default"}
						} -->
						<div class="wp-block-group">

							<!-- wp:heading {"level":3} -->
							<h3 class="wp-block-heading"><a href="<?= esc_url($url) ?>"><?= esc_html__('Placeholder', 'x3p0-ideas') ?></a></h3>
							<!-- /wp:heading -->

							<!-- wp:paragraph -->
							<p><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'x3p0-ideas') ?></p>
							<!-- /wp:paragraph -->

						</div>
						<!-- /wp:group -->

					</div>
					<!-- /wp:group -->

				</div>

			</div>
			<!-- /wp:cover -->

		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
