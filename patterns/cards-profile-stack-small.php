<?php

/**
 * Title: Small Vertical Profile Cards
 * Slug: x3p0-ideas/cards-profile-stack-small
 * Categories: team, x3p0-grid
 * Keywords: card, grid, profile, team
 * Viewport Width: 1376
 */

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

		<?php foreach (range(1, 6) as $card) : ?>

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
				"style":{
					"spacing":{
						"padding":{
							"left":"var:preset|spacing|plus-3",
							"right":"var:preset|spacing|plus-3",
							"top":"var:preset|spacing|plus-3",
							"bottom":"var:preset|spacing|plus-3"
						},
						"blockGap":"var:preset|spacing|base"
					},
					"border":{
						"top":{
							"color":"var:preset|color|primary-700",
							"width":"0.25rem"
						}
					}
				},
				"textColor":"neutral-500",
				"gradient":"180-deg-transparent-base",
				"className":"is-style-card",
				"layout":{
					"type":"flex",
					"orientation":"vertical",
					"justifyContent":"center"
				},
				"fontSize":"sm"
			} -->
			<div class="wp-block-group is-style-card has-neutral-500-color has-180-deg-transparent-base-gradient-background has-text-color has-background has-sm-font-size" style="border-top-color:var(--wp--preset--color--primary-700);border-top-width:0.25rem;padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

				<!-- wp:avatar {
					"userId":1,
					"isLink":true,
					"className":""
				} /-->

				<!-- wp:group {
					"metadata":{"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"},
					"style":{"spacing":{"blockGap":"0"}},
					"layout":{"type":"default"}
				} -->
				<div class="wp-block-group">

					<!-- wp:heading {
						"textAlign":"center",
						"level":3,
						"textColor":"contrast",
						"fontSize":"lg"
					} -->
					<h3 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-lg-font-size"><?= esc_html__('User Name', 'x3p0-ideas') ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center"><?= esc_html__('Placeholder Text', 'x3p0-ideas') ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
