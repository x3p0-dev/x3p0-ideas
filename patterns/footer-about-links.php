<?php

/**
 * Title: Footer: About + Links
 * Slug: x3p0-ideas/footer-about-links
 * Description:
 * Categories: footer
 * Keywords: footer
 * Block Types: core/template-part/footer
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:columns {
	"metadata":{"name":"<?= esc_attr__('Footer Columns', 'x3p0-ideas') ?>"},
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-6",
				"bottom":"var:preset|spacing|plus-6",
				"left":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3"
			}
		},
		"elements":{
			"link":{
				"color":{"text":"var:preset|color|neutral-900"}
			}
		}
	},
	"backgroundColor":"neutral-50",
	"textColor":"neutral-900",
	"fontSize":"xs"
} -->
<div class="wp-block-columns alignfull has-neutral-900-color has-neutral-50-background-color has-text-color has-background has-link-color has-xs-font-size" style="padding-top:var(--wp--preset--spacing--plus-6);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-6);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:column {"width":"60%"} -->
	<div class="wp-block-column" style="flex-basis:60%">

		<!-- wp:group {
			"style":{
				"spacing":{"blockGap":"var:preset|spacing|base"},
				"layout":{"selfStretch":"fill","flexSize":null}
			},
			"layout":{"type":"default"}
		} -->
		<div class="wp-block-group">

			<!-- wp:group {
				"style":{"spacing":{"blockGap":"0"}},
				"layout":{"type":"default"}
			} -->
			<div class="wp-block-group">

				<!-- wp:site-title {
					"level":0,
					"isLink":false,
					"style":{
						"typography":{
							"fontStyle":"normal",
							"fontWeight":"700"
						}
					},
					"className":"is-style-normalize",
					"fontSize":"lg"
				} /-->

				<!-- wp:paragraph -->
				<p><?php esc_html_e('Find me on any of these platforms. Please get in touch.', 'x3p0-ideas') ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:social-links {
				"iconColor":"neutral-900",
				"iconColorValue":"#000000",
				"size":"has-large-icon-size",
				"className":"is-style-logos-only"
			} -->
			<ul class="wp-block-social-links has-large-icon-size has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
				<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
				<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
				<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
			</ul>
			<!-- /wp:social-links -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"40%"} -->
	<div class="wp-block-column" style="flex-basis:40%">

		<!-- wp:columns {
			"style":{
				"spacing":{
					"blockGap":{"left":"var:preset|spacing|plus-6"}
				}
			}
		} -->
		<div class="wp-block-columns">

			<?php foreach (range(1, 2) as $column) : ?>

				<!-- wp:column {
					"style":{
						"spacing":{
							"blockGap":"var:preset|spacing|base"
						}
					}
				} -->
				<div class="wp-block-column">

					<!-- wp:heading {
						"level":3,
						"style":{
							"typography":{
								"fontStyle":"normal",
								"fontWeight":"600"
							}
						},
						"fontSize":"sm",
						"fontFamily":"secondary"
					} -->
					<h3 class="wp-block-heading has-secondary-font-family has-sm-font-size" style="font-style:normal;font-weight:600"><?= esc_html__('Site Navigation', 'x3p0-ideas') ?></h3>
					<!-- /wp:heading -->

					<!-- wp:list {
						"className":"has-marker-none is-style-gap-normal"
					} -->
					<ul class="has-marker-none is-style-gap-normal">

						<?php foreach (range(1, 4) as $link) : ?>

							<!-- wp:list-item -->
							<li><a href="#"><?= esc_html(sprintf(
								// Translators: %d is the current number in the loop.
								_n('Link %d', 'Link %d', $link, 'x3p0-ideas'),
								absint($link)
							)) ?></a></li>
							<!-- /wp:list-item -->

						<?php endforeach ?>

					</ul>
					<!-- /wp:list -->

				</div>
				<!-- /wp:column -->

			<?php endforeach ?>

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
