<?php

/**
 * Title: Footer: About + Links
 * Slug: x3p0-ideas/footer-about-links
 * Description:
 * Categories: footer
 * Keywords: footer
 * Block Types: core/template-part/footer
 */

?>
<!-- wp:group {
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-6",
				"bottom":"var:preset|spacing|plus-6",
				"left":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3"
			}
		}
	},
	"backgroundColor":"neutral-50",
	"layout":{"type":"default"},
	"fontSize":"sm"
} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background has-sm-font-size" style="padding-top:var(--wp--preset--spacing--plus-6);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-6);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:columns -->
	<div class="wp-block-columns">

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
					"size":"has-small-icon-size",
					"className":"is-style-outline"
				} -->
				<ul class="wp-block-social-links has-small-icon-size is-style-outline">
					<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
					<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
					<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
					<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
					<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /--></ul>
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

					<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}}} -->
					<div class="wp-block-column">

						<!-- wp:heading {
							"style":{
								"typography":{
									"textTransform":"uppercase",
									"fontStyle":"normal",
									"fontWeight":"600"
								}
							},
							"fontSize":"xs"
						} -->
						<h2 class="wp-block-heading has-xs-font-size" style="font-style:normal;font-weight:600;text-transform:uppercase">
							<?php esc_html_e('Navigation Heading', 'x3p0-ideas') ?>
						</h2>
						<!-- /wp:heading -->

						<!-- wp:list {"className":"has-marker-none is-style-gap-snug"} -->
						<ul class="has-marker-none is-style-gap-snug">
							<?php foreach (range(1, 4) as $item) : ?>
								<!-- wp:list-item -->
								<li><a href="#"><?= esc_html(sprintf(
									// Translators: %d is the current number in the loop.
									_n('Link %d', 'Link %d', $item, 'x3p0-ideas'),
									absint($item)
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

</div>
<!-- /wp:group -->
