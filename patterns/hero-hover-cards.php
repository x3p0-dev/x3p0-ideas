<?php
/**
 * Title: Hero: Hover Cards
 * Slug: x3p0-ideas/hero-hover-cards
 * Description: Make a statement.
 * Categories: featured
 * Keywords: hero, cover, hover, card
 * Block Types: core/cover
 * Viewport Width: 1376
 */
$url = home_url();
$image = get_theme_file_uri( 'public/media/images/purple-sunset.webp' );
?>
<!-- wp:group {
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3",
				"right":"var:preset|spacing|plus-3"
			},
			"blockGap":"var:preset|spacing|plus-4"
		}
	},
	"backgroundColor":"neutral-base",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull has-neutral-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group">

		<!-- wp:group {
			"style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}},
			"layout":{"type":"constrained"}
		} -->
		<div class="wp-block-group">

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php esc_html_e( 'Placeholder Text', 'x3p0-ideas' ) ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Placeholder Heading', 'x3p0-ideas' ) ?></h2>
			<!-- /wp:heading -->

		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum turpis quis metus aliquam, id pharetra arcu dignissim. Sed in sollicitudin mi.', 'x3p0-ideas' ) ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"className":"is-style-grid-auto"} -->
	<div class="wp-block-columns is-style-grid-auto">

		<?php foreach ( range( 1, 4 ) as $column ) : ?>

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:cover {
					"url":"<?= esc_url( $image ) ?>",
					"id":2329,
					"dimRatio":50,
					"overlayColor":"contrast",
					"isUserOverlayColor":true,
					"minHeight":20,
					"minHeightUnit":"vh",
					"style":{
						"spacing":{
							"padding":{
								"top":"var:preset|spacing|plus-3",
								"bottom":"var:preset|spacing|plus-3",
								"left":"var:preset|spacing|plus-3",
								"right":"var:preset|spacing|plus-3"
							}
						}
					},
					"className":"is-style-hover-reveal",
					"layout":{"type":"default"}
				} -->
				<div class="wp-block-cover is-style-hover-reveal" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:20vh">

					<span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim"></span>
					<img class="wp-block-cover__image-background wp-image-2329" alt="" src="<?= esc_url( $image ) ?>" data-object-fit="cover"/>

					<div class="wp-block-cover__inner-container">

						<!-- wp:group {
							"align":"full",
							"style":{"dimensions":{"minHeight":"24rem"}},
							"layout":{
								"type":"flex",
								"orientation":"vertical",
								"verticalAlignment":"space-between"
							}
						} -->
						<div class="wp-block-group alignfull" style="min-height:24rem">

							<!-- wp:group {
								"style":{
									"spacing":{
										"padding":{
											"top":"var:preset|spacing|minus-3",
											"bottom":"var:preset|spacing|minus-3",
											"left":"var:preset|spacing|base",
											"right":"var:preset|spacing|base"
										}
									}
								},
								"backgroundColor":"neutral-contrast",
								"layout":{"type":"constrained"},
								"fontSize":"sm"
							} -->
							<div class="wp-block-group has-neutral-contrast-background-color has-background has-sm-font-size" style="padding-top:var(--wp--preset--spacing--minus-3);padding-right:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--minus-3);padding-left:var(--wp--preset--spacing--base)">

								<!-- wp:paragraph -->
								<p><?php esc_html_e( 'Placeholder', 'x3p0-ideas' ) ?></p>
								<!-- /wp:paragraph -->

							</div>
							<!-- /wp:group -->

							<!-- wp:group {
								"style":{
									"spacing":{"blockGap":"var:preset|spacing|minus-3"}},
									"layout":{"type":"constrained"}
								} -->
							<div class="wp-block-group">

								<!-- wp:heading {"level":3} -->
								<h3 class="wp-block-heading"><a href="<?= esc_url( $url ) ?>"><?php esc_html_e( 'Placeholder Heading', 'x3p0-ideas' ) ?></a></h3>
								<!-- /wp:heading -->

								<!-- wp:paragraph {"fontSize":"sm"} -->
								<p class="has-sm-font-size"><?php esc_html_e( 'This is placeholder text.', 'x3p0-ideas' ) ?></p>
								<!-- /wp:paragraph -->

							</div>
							<!-- /wp:group -->

						</div>
						<!-- /wp:group -->

					</div>

				</div>
				<!-- /wp:cover -->

			</div>
			<!-- /wp:column -->

		<?php endforeach ?>

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
