<?php
/**
 * Title: Small Team Cards
 * Slug: x3p0-ideas/cards-team-small
 * Categories: team, x3p0-grid
 * Keywords: card, grid, profile, team
 * Viewport Width: 1376
 */
$url = home_url();
$image = get_theme_file_uri( 'public/media/images/purple-sunset.webp' );
?>
<!-- wp:group {
	"tagName":"section",
	"metadata":{"name":"<?= esc_attr( 'Team Cards', 'x3p0-ideas' ) ?>"},
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-4",
				"bottom":"var:preset|spacing|plus-4",
				"left":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3"
			}
		}
	},
	"backgroundColor":"neutral-base",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-group alignfull has-neutral-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--plus-4);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-4);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"tagName":"header",
		"metadata":{"name":"<?= esc_attr( 'Team Cards Header', 'x3p0-ideas' ) ?>"},
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"constrained"}
	} -->
	<header class="wp-block-group">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?= esc_html__( 'Placeholder Heading', 'x3p0-ideas' ) ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?= esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum turpis quis metus aliquam, id pharetra arcu dignissim. Sed in sollicitudin mi.', 'x3p0-ideas' ) ?></p>
		<!-- /wp:paragraph -->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr( 'Grid', 'x3p0-ideas' ) ?>"},
		"align":"wide",
		"layout":{"type":"grid","minimumColumnWidth":"16rem"}
	} -->
	<div class="wp-block-group alignwide">

		<?php foreach ( range( 1, 6 ) as $card ) : ?>

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr( 'Card', 'x3p0-ideas' ) ?>"},
				"style":{
					"spacing":{
						"padding":{
							"top":"var:preset|spacing|base",
							"bottom":"var:preset|spacing|base",
							"left":"var:preset|spacing|base",
							"right":"var:preset|spacing|base"
						},
						"blockGap":"var:preset|spacing|base"
					}
				},
				"gradient":"180-deg-transparent-base",
				"className":"is-style-card",
				"layout":{"type":"flex","flexWrap":"nowrap"}
			} -->
			<div class="wp-block-group is-style-card has-180-deg-transparent-base-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--base);padding-right:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--base);padding-left:var(--wp--preset--spacing--base)">

				<!-- wp:avatar {"userId":1,"size":80,"isLink":true,"className":""} /-->

				<!-- wp:group {
					"metadata":{"name":"<?= esc_attr( 'Content', 'x3p0-ideas' ) ?>"},
					"style":{"spacing":{"blockGap":"0"}},
					"layout":{"type":"default"}
				} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"fontSize":"lg"} -->
					<h3 class="wp-block-heading has-lg-font-size"><?= esc_html__( 'User Name', 'x3p0-ideas' ) ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {
						"style":{
							"elements":{
								"link":{
									"color":{
										"text":"var:preset|color|neutral-muted"
									}
								}
							}
						},
						"textColor":"neutral-muted",
						"fontSize":"sm"
					} -->
					<p class="has-neutral-muted-color has-text-color has-link-color has-sm-font-size"><?= esc_html__( 'User Role', 'x3p0-ideas' ) ?></p>
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
