<?php
/**
 * Title: Footer: About + Four Link Columns
 * Slug: x3p0-ideas/footer-about-four-col-links
 * Description:
 * Categories: footer
 * Keywords: footer
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:columns {
	"metadata":{"name":"<?= esc_attr__( 'Footer Columns', 'x3p0-ideas' ) ?>"},
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
				"color":{"text":"var:preset|color|neutral-contrast"}
			}
		}
	},
	"backgroundColor":"neutral-base",
	"textColor":"neutral-contrast",
	"fontSize":"xs"
} -->
<div class="wp-block-columns alignfull has-neutral-contrast-color has-neutral-base-background-color has-text-color has-background has-link-color has-xs-font-size" style="padding-top:var(--wp--preset--spacing--plus-6);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-6);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:column {
		"metadata":{"name":"<?= esc_attr__( 'About Column', 'x3p0-ideas' ) ?>"},
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}}
	} -->
	<div class="wp-block-column">

		<!-- wp:site-title {
			"level":0,
			"isLink":false,
			"style":{
				"typography":{
					"fontStyle":
					"normal",
					"fontWeight":"700"
				}
			},
			"className":"is-style-normalize",
			"fontSize":"lg"
		} /-->

		<!-- wp:paragraph -->
		<p><?= esc_html__( 'Find me on any of these platforms. Please get in touch.', 'x3p0-ideas' ) ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:social-links {
			"iconColor":"neutral-muted",
			"iconColorValue":"#715036",
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
	<!-- /wp:column -->

	<?php foreach ( range( 1, 2 ) as $column ) : ?>

		<!-- wp:column {
			"metadata":{"name":"<?= esc_attr__( 'Links Column', 'x3p0-ideas' ) ?>"}
		} -->
		<div class="wp-block-column">

			<!-- wp:columns -->
			<div class="wp-block-columns">

				<?php foreach ( range( 1, 2 ) as $nested ) : ?>

					<!-- wp:column {
						"style":{
							"spacing":{
								"blockGap":"var:preset|spacing|base"
							}
						}
					} -->
					<div class="wp-block-column">

						<!-- wp:heading {
							"style":{
								"typography":{
									"fontStyle":"normal",
									"fontWeight":"600"
								}
							},
							"fontSize":"sm"
						} -->
						<h2 class="wp-block-heading has-sm-font-size" style="font-style:normal;font-weight:600"><?= esc_html__( 'Site Navigation', 'x3p0-ideas' ) ?></h2>
						<!-- /wp:heading -->

						<!-- wp:list {
							"className":"has-marker-none is-style-gap-normal"
						} -->
						<ul class="has-marker-none is-style-gap-normal">

							<?php foreach ( range( 1, 4 ) as $link ) : ?>

								<!-- wp:list-item -->
								<li><a href="#"><?php printf(
									esc_html__( 'Link %d', 'x3p0-ideas' ),
									$link
								) ?></a></li>
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

	<?php endforeach ?>

</div>
<!-- /wp:columns -->
