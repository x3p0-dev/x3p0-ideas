<?php

/**
 * Title: Pricing Card: Secondary
 * Slug: x3p0-ideas/card-pricing-secondary
 * Categories: x3p0-card
 * Keywords: card, grid
 * Viewport Width: 480
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\Ideas\Tools\Placeholder;

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
		"dimensions":{
			"minHeight":"0px"
		}
	},
	"className":"has-bounds-border is-style-section-1",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"stretch",
		"verticalAlignment":"space-between"
	},
	"fontSize":"xs"
} -->
<div class="wp-block-group has-bounds-border is-style-section-1 has-xs-font-size" style="min-height:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:group {
		"tagName":"header",
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|10",
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				}
			}
		},
		"layout":{"type":"default"}
	} -->
	<header class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:heading {"level":3,"fontSize":"xl"} -->
		<h3 class="wp-block-heading has-xl-font-size"><?= esc_html__('Placeholder', 'x3p0-ideas') ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?= esc_html(Placeholder::text(4)) ?></p>
		<!-- /wp:paragraph -->

	</header>
	<!-- /wp:group -->

	<!-- wp:group {
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|40",
					"bottom":"var:preset|spacing|40",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				},
				"blockGap":"var:preset|spacing|10"
			}
		},
		"className": "is-style-section-2",
		"layout":{
			"type":"flex",
			"flexWrap":"nowrap"
		}
	} -->
	<div class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:paragraph {
			"style":{
				"typography":{
					"fontStyle":"normal",
					"fontWeight":"900"
				}
			},
			"fontSize":"7-xl"
		} -->
		<p class="has-7-xl-font-size" style="font-style:normal;font-weight:900"><?= esc_html__('$95', 'x3p0-ideas') ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"xs"} -->
		<p class="has-xs-font-size"><?= esc_html__('/ year', 'x3p0-ideas') ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"
		},
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				}
			},
			"layout":{
				"selfStretch":"fill",
				"flexSize":null
			}
		},
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"justifyContent":"stretch",
			"verticalAlignment":"space-between"
		}
	} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:list {"className":"has-marker-none is-style-list-pull"} -->
		<ul class="has-marker-none is-style-list-pull">

			<?php foreach (range(1, 5) as $item) : ?>

				<?php $style = 4 > $item ? 'is-style-list-item-positive' : 'is-style-list-item-negative' ?>

				<!-- wp:list-item {
					"className":"<?= esc_attr($style) ?>"
				} -->
				<li class="<?= esc_attr($style) ?>"><?= esc_html__('Placeholder text', 'x3p0-ideas') ?></li>
				<!-- /wp:list-item -->

			<?php endforeach ?>

		</ul>
		<!-- /wp:list -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">

			<!-- wp:button {
				"width":100,
				"className":"is-style-button-tonal",
				"style":{
					"spacing":{
						"padding":{
							"top":"var:preset|spacing|30",
							"bottom":"var:preset|spacing|30"
						}
					}
				}
			} -->
			<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-button-tonal">
				<a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><?= esc_html__('Placeholder Text →', 'x3p0-ideas') ?></a>
			</div>
			<!-- /wp:button -->

		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
