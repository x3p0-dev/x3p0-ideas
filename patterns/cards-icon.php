<?php

/**
 * Title: Icon Cards
 * Slug: x3p0-ideas/cards-icon
 * Categories: x3p0-grid
 * Keywords: card, grid
 * Viewport Width: 1376
 */

$icons = [
	'bar-chart',
	'data-usage',
	'database',
	'earthquake',
	'monitoring',
	'show-chart'
];
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
				"style":{
					"spacing":{
						"padding":{
							"top":"var:preset|spacing|plus-3",
							"bottom":"var:preset|spacing|plus-3",
							"left":"var:preset|spacing|plus-1",
							"right":"var:preset|spacing|plus-1"
						},
						"blockGap":"var:preset|spacing|base"
					},
					"border":{
						"top":{
							"color":"var:preset|color|primary-700",
							"width":"4px"
						}
					}
				},
				"gradient":"180-deg-transparent-base",
				"className":"is-style-card",
				"layout":{"type":"default"}
			} -->
			<div class="wp-block-group is-style-card has-180-deg-transparent-base-gradient-background has-background" style="border-top-color:var(--wp--preset--color--primary-700);border-top-width:4px;padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-1);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-1)">

				<!-- wp:image {
					"lightbox":{"enabled":false},
					"width":"48px",
					"height":"auto",
					"sizeSlug":"full",
					"linkDestination":"none"
				} -->
				<figure class="wp-block-image size-full is-resized">
					<img src="<?= esc_url(get_theme_file_uri("public/media/svg/{$icon}.svg")) ?>" alt="" style="width:48px;height:auto"/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:heading {"fontSize":"xl"} -->
				<h2 class="wp-block-heading has-xl-font-size"><?= esc_html__('Placeholder', 'x3p0-ideas') ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'x3p0-ideas') ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
