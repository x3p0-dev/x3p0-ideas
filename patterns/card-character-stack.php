<?php

/**
 * Title: Character Card
 * Slug: x3p0-ideas/card-character-stack
 * Categories: team, x3p0-card
 * Keywords: card, grid, profile, team
 * Viewport Width: 480
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$image = get_theme_file_uri('public/media/images/default-16x9.webp');

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"top":"0",
				"bottom":"0",
				"left":"0",
				"right":"0"
			},
			"blockGap":"0"
		},
		"dimensions":{"minHeight":"100%"}
	},
	"className":"is-style-card",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"stretch",
		"flexWrap":"nowrap",
		"verticalAlignment":"space-between"
	},
	"fontSize":"sm"
} -->
<div class="wp-block-group is-style-card has-sm-font-size" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100%">

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"0"}},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group">

		<!-- wp:image {
			"aspectRatio":"4/3",
			"scale":"cover",
			"sizeSlug":"full",
			"linkDestination":"none",
			"style":{"border":{"radius":"0px"}},
			"className":"is-style-borderless"
		} -->
		<figure class="wp-block-image size-full has-custom-border is-style-borderless"><img src="<?= esc_url($image) ?>" alt="" style="border-radius:0px;aspect-ratio:4/3;object-fit:cover"/></figure>
		<!-- /wp:image -->

		<!-- wp:group {
			"metadata":{"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"},
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|base",
					"padding":{
						"top":"var:preset|spacing|plus-3",
						"bottom":"var:preset|spacing|plus-3",
						"left":"var:preset|spacing|plus-3",
						"right":"var:preset|spacing|plus-3"
					}
				}
			},
			"layout":{"type":"default"}
		} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__('Card Header', 'x3p0-ideas') ?>"},
				"style":{"spacing":{"blockGap":"0"}},
				"layout":{"type":"default"}
			} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {
					"align":"center",
					"style":{
						"typography":{
							"textTransform":"uppercase",
							"fontStyle":"normal",
							"fontWeight":"600"
						}
					},
					"textColor":"primary-700",
					"fontSize":"xs"
				} -->
				<p class="has-text-align-center has-primary-700-color has-text-color has-xs-font-size" style="font-style:normal;font-weight:600;text-transform:uppercase"><?= esc_html__('Level 99', 'x3p0-ideas') ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {
					"textAlign":"center",
					"fontSize":"xl"
				} -->
				<h2 class="wp-block-heading has-text-align-center has-xl-font-size"><?= esc_html__('User Name', 'x3p0-ideas') ?></h2>
				<!-- /wp:heading -->

			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum turpis quis metus aliquam, id pharetra arcu dignissim.', 'x3p0-ideas') ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Card Footer', 'x3p0-ideas') ?>"},
		"align":"full",
		"style":{"spacing":{"blockGap":"var:preset|spacing|px"}},
		"backgroundColor":"neutral-50",
		"layout":{
			"type":"grid",
			"minimumColumnWidth":"30%"
		}
	} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background">

		<?php foreach (range(1, 3) as $skill) : ?>

			<!-- wp:group {
				"style":{
					"spacing":{
						"blockGap":"0",
						"padding":{
							"top":"var:preset|spacing|base",
							"bottom":"var:preset|spacing|base",
							"left":"var:preset|spacing|px",
							"right":"var:preset|spacing|px"
						}
					}
				},
				"layout":{"type":"default"}
			} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--base);padding-right:var(--wp--preset--spacing--px);padding-bottom:var(--wp--preset--spacing--base);padding-left:var(--wp--preset--spacing--px)">

				<!-- wp:paragraph {
					"align":"center",
					"style":{
						"typography":{
							"fontStyle":"normal",
							"fontWeight":"600"
						}
					},
					"fontSize":"lg"
				} -->
				<p class="has-text-align-center has-lg-font-size" style="font-style:normal;font-weight:600">99</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {
					"align":"center",
					"style":{
						"typography":{
							"textTransform":"uppercase",
							"fontStyle":"normal",
							"fontWeight":"300"
						}
					},
					"fontSize":"2-xs"
				} -->
				<p class="has-text-align-center has-2-xs-font-size" style="font-style:normal;font-weight:300;text-transform:uppercase">Skill</p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
