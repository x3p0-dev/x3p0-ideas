<?php

/**
 * Title: Footer: Links
 * Slug: x3p0-ideas/footer-links
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
	"align":"full"
} -->
<div class="wp-block-columns alignfull" style="padding-top:var(--wp--preset--spacing--plus-6);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-6);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:column {
		"metadata":{"name":"<?= esc_attr__('About Column', 'x3p0-ideas') ?>"},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|base"
			}
		}
	} -->
	<div class="wp-block-column">

		<!-- wp:site-title {
			"level":0,
			"isLink":false
		} /-->

		<!-- wp:site-tagline /-->

		<!-- wp:social-links {
			"size":"has-large-icon-size",
			"className":"is-style-buttons-primary"
		} -->
		<ul class="wp-block-social-links has-large-icon-size is-style-buttons-primary">
			<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
			<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
			<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
			<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
			<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
		</ul>
		<!-- /wp:social-links -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {
		"metadata":{"name":"<?= esc_attr__('Links Column', 'x3p0-ideas') ?>"}
	} -->
	<div class="wp-block-column">

		<!-- wp:columns -->
		<div class="wp-block-columns">

			<?php foreach (range(1, 3) as $nested) : ?>

				<!-- wp:column {
					"style":{
						"spacing":{
							"blockGap":"var:preset|spacing|base"
						}
					},
					"fontSize":"sm"
				} -->
				<div class="wp-block-column has-sm-font-size">

					<!-- wp:heading {
						"level":3,
						"style":{
							"typography":{
								"fontStyle":"normal",
								"fontWeight":"600"
							}
						},
						"fontSize":"sm"
					} -->
					<h3 class="wp-block-heading has-sm-font-size" style="font-style:normal;font-weight:600"><?= esc_html__('Site Navigation', 'x3p0-ideas') ?></h3>
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
