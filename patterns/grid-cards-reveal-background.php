<?php

/**
 * Title: Background Reveal Cards
 * Slug: x3p0-ideas/grid-cards-reveal-background
 * Categories: x3p0-grid
 * Keywords: card, cover, grid, hover, reveal
 * Block Types: core/cover
 * Viewport Width: 1280
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$url   = home_url();
$image = get_theme_file_uri('public/media/images/mountain-road.webp');

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Grid', 'x3p0-ideas') ?>"},
	"align":"full",
	"layout":{"type":"grid","minimumColumnWidth":"16rem"}
} -->
<div class="wp-block-group alignfull">

	<?php foreach (range(1, 4) as $card) : ?>

		<!-- wp:cover {
			"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
			"url":"<?= esc_url($image) ?>",
			"dimRatio":50,
			"overlayColor":"black",
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
			"className":"is-style-reveal-image",
			"layout":{"type":"default"},
			"fontSize":"sm"
		} -->
		<div class="wp-block-cover is-style-reveal-image has-sm-font-size" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:20vh">

			<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span>
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
						"textColor":"primary-50",
						"layout":{"type":"default"}
					} -->
					<div class="wp-block-group has-primary-50-color has-primary-700-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--minus-3);padding-right:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--minus-3);padding-left:var(--wp--preset--spacing--base)">

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
