<?php

/**
 * Title: Hero: Post Cover With Links
 * Slug: x3p0-ideas/hero-post-cover-with-links
 * Categories: featured, x3p0-hero
 * Keywords: hero, cover
 * Viewport Width: 1152
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:query {
	"queryId":0,
	"query":{
		"perPage":"1",
		"pages":0,
		"offset":0,
		"postType":"post",
		"order":"desc",
		"orderBy":"date",
		"author":"",
		"search":"",
		"exclude":[],
		"sticky":"",
		"inherit":false
	},
	"metadata":{"name":"<?= esc_attr__('Posts Query', 'x3p0-ideas') ?>"},
	"align":"full",
	"layout":{"type":"default"}
} -->
<div class="wp-block-query alignfull">

	<!-- wp:post-template {"align":"full"} -->

		<!-- wp:cover {
			"useFeaturedImage":true,
			"dimRatio":40,
			"overlayColor":"black",
			"isUserOverlayColor":true,
			"focalPoint":{"x":0.5,"y":1},
			"minHeight":100,
			"minHeightUnit":"vh",
			"tagName":"article",
			"metadata":{"name":"<?php esc_attr__('Post', 'x3p0-ideas') ?>"},
			"style":{
				"spacing":{
					"padding":{
						"top":"var:preset|spacing|70",
						"right":"var:preset|spacing|70",
						"bottom":"var:preset|spacing|70",
						"left":"var:preset|spacing|70"
					}
				},
				"elements":{
					"link":{
						"color":{
							"text":"var:preset|color|white"
						}
					}
				}
			},
			"textColor":"white",
			"layout":{"type":"default"}
		} -->
		<article class="wp-block-cover has-white-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70);min-height:100vh">

			<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim"></span>
			<div class="wp-block-cover__inner-container">

				<!-- wp:spacer {"height":"var:preset|spacing|70"} -->
				<div style="height:var(--wp--preset--spacing--70)" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:columns {
					"verticalAlignment":"center",
					"style":{
						"spacing":{
							"blockGap":{
								"top":"var:preset|spacing|90",
								"left":"var:preset|spacing|90"
							}
						}
					}
				} -->
				<div class="wp-block-columns are-vertically-aligned-center">

					<!-- wp:column {
						"verticalAlignment":"center",
						"width":"65%",
						"layout":{
							"type":"constrained",
							"justifyContent":"left"
						}
					} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">

						<!-- wp:group {
							"tagName":"header",
							"metadata":{"name":"<?= esc_attr__('Post Header', 'x3p0-ideas') ?>"},
							"style":{
								"spacing":{
									"blockGap":"var:preset|spacing|40"
								}
							},
							"layout":{
								"type":"flex",
								"orientation":"vertical",
								"justifyContent":"left"
							}
						} -->
						<header class="wp-block-group">
							<!-- wp:post-title {
								"textAlign":"left",
								"isLink":true,
								"fontSize":"5-xl"
							} /-->
						</header>
						<!-- /wp:group -->

						<!-- wp:post-excerpt {
							"moreText":"<?= esc_attr__('Continue reading &rarr;', 'x3p0-ideas') ?>",
							"showMoreOnNewLine":false,
							"excerptLength":25
						} /-->

						<!-- wp:pattern {"slug":"x3p0-ideas/post-byline-avatar"} /-->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {
						"verticalAlignment":"center",
						"width":""
					} -->
					<div class="wp-block-column is-vertically-aligned-center">

						<!-- wp:query {
							"queryId":0,
							"query":{
								"perPage":"4",
								"pages":0,
								"offset":"1",
								"postType":"post",
								"order":"desc",
								"orderBy":"date",
								"author":"",
								"search":"",
								"exclude":[],
								"sticky":"",
								"inherit":false
							},
							"metadata":{"name":"<?= esc_attr__('Posts Query', 'x3p0-ideas') ?>"}
						} -->
						<div class="wp-block-query">

							<!-- wp:post-template {
								"style":{
									"spacing":{
										"blockGap":"var:preset|spacing|40"
									}
								}
							} -->

								<!-- wp:cover {
									"dimRatio":60,
									"isUserOverlayColor":true,
									"minHeight":50,
									"metadata":{"name":"<?php esc_attr__('Post', 'x3p0-ideas') ?>"},
									"className":"is-style-global-border",
									"style":{
										"spacing":{
											"padding":{
												"top":"var:preset|spacing|40",
												"bottom":"var:preset|spacing|40",
												"left":"var:preset|spacing|40",
												"right":"var:preset|spacing|40"
											}
										}
									}
								} -->
								<div class="wp-block-cover is-style-global-border" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);min-height:50px">

									<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span>
									<div class="wp-block-cover__inner-container">

										<!-- wp:group {
											"style":{
												"spacing":{"blockGap":"0"}
											},
											"layout":{"type":"constrained"}
										} -->
										<div class="wp-block-group">
											<!-- wp:post-title {
												"isLink":true,
												"fontSize":"lg"
											} /-->

											<!-- wp:group {
												"metadata":{"name":"<?= esc_attr__('Post Byline', 'x3p0-ideas') ?>"},
												"className":"is-style-meta",
												"style":{
													"spacing":{
														"blockGap":"var:preset|spacing|40"
													}
												},
												"layout":{
													"type":"flex",
													"flexWrap":"wrap"
												}
											} -->
											<div class="wp-block-group is-style-meta">
												<!-- wp:post-date /-->
											</div>
											<!-- /wp:group -->

										</div>
										<!-- /wp:group -->

									</div>

								</div>
								<!-- /wp:cover -->

							<!-- /wp:post-template -->

						</div>
						<!-- /wp:query -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

				<!-- wp:spacer {"height":"var:preset|spacing|70"} -->
				<div style="height:var(--wp--preset--spacing--70)" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

			</div>

		</article>
		<!-- /wp:cover -->

	<!-- /wp:post-template -->

</div>
<!-- /wp:query -->
