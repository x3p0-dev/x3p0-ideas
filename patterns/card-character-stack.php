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

use X3P0\Ideas\Tools\Language;

$image = get_theme_file_uri('public/media/images/default-16x9.webp');

?>
<!-- wp:group {
	"metadata":{
		"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"
	},
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
		"dimensions":{
			"minHeight":"100%"
		}
	},
	"className":"has-global-border is-style-section-3",
	"fontSize":"sm",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"stretch",
		"flexWrap":"nowrap",
		"verticalAlignment":"space-between"
	}
} -->
<div class="wp-block-group has-global-border is-style-section-3 has-sm-font-size" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100%">

	<!-- wp:image {
		"aspectRatio":"4/3",
		"scale":"cover",
		"sizeSlug":"full",
		"linkDestination":"none",
		"style":{
			"border":{
				"radius":"0px"
			}
		},
		"className":"is-style-borderless"
	} -->
	<figure class="wp-block-image size-full has-custom-border is-style-borderless"><img src="<?= esc_url($image) ?>" alt="" style="border-radius:0px;aspect-ratio:4/3;object-fit:cover"/></figure>
	<!-- /wp:image -->

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"
		},
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|plus-3",
					"bottom":"var:preset|spacing|plus-3",
					"left":"var:preset|spacing|plus-3",
					"right":"var:preset|spacing|plus-3"
				},
				"blockGap":"var:preset|spacing|base"
			},
			"layout":{
				"selfStretch":"fill",
				"flexSize":null
			},
			"typography":{
				"textAlign":"center"
			}
		},
		"layout":{
			"type":"default"
		}
	} -->
	<div class="wp-block-group has-text-align-center" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

		<!-- wp:group {
			"tagName":"header",
			"metadata":{
				"name":"<?= esc_attr__('Card Header', 'x3p0-ideas') ?>"
			},
			"style":{
				"spacing":{
					"blockGap":"0"
				}
			},
			"layout":{
				"type":"default"
			}
		} -->
		<header class="wp-block-group">

			<!-- wp:paragraph {
				"className":"is-style-kicker",
				"textColor":"primary-700"
			} -->
			<p class="is-style-kicker has-primary-700-color has-text-color"><?= esc_html__('Level 99', 'x3p0-ideas') ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?= esc_html__('User Name', 'x3p0-ideas') ?></h3>
			<!-- /wp:heading -->

		</header>
		<!-- /wp:group -->

		<!-- wp:paragraph -->
		<p><?= esc_html(Language::loremIpsum(12)) ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"tagName":"footer",
		"metadata":{
			"name":"<?= esc_attr__('Card Footer', 'x3p0-ideas') ?>"
		},
		"align":"full",
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|px",
				"padding":{
					"top":"0",
					"bottom":"0",
					"left":"0",
					"right":"0"
				}
			}
		},
		"className":"is-style-section-2",
		"layout":{
			"type":"grid",
			"minimumColumnWidth":"30%"
		}
	} -->
	<footer class="wp-block-group alignfull is-style-section-2" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

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
				<p class="has-text-align-center has-2-xs-font-size" style="font-style:normal;font-weight:300;text-transform:uppercase"><?= esc_html__('Skill', 'x3p0-ideas') ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		<?php endforeach ?>

	</footer>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
