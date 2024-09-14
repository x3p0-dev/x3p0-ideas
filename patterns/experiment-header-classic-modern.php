<?php

/**
 * Title: Header: Classic Modern
 * Slug: x3p0-ideas/header-classic-modern
 * Description:
 * Categories: header
 * Keywords: header
 * Block Types: core/template-part/header
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"align":"full",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull">

	<!-- wp:group {
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|base",
					"bottom":"var:preset|spacing|base",
					"right":"var:preset|spacing|plus-3",
					"left":"var:preset|spacing|plus-3"
				}
			}
		},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--base);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--base);padding-left:var(--wp--preset--spacing--plus-3)">

		<!-- wp:group {
			"style":{
				"spacing":{
					"blockGap":"var:preset|spacing|minus-3"
				}
			},
			"layout":{
				"type":"flex",
				"justifyContent":"space-between"
			}
		} -->
		<div class="wp-block-group">

			<!-- wp:group {
				"metadata":{"name":"<?= esc_attr__('Branding', 'x3p0-ideas') ?>"},
				"style":{
					"spacing":{"blockGap":"var:preset|spacing|minus-1"},
					"layout":{"selfStretch":"fill","flexSize":null}
				},
				"layout":{"type":"flex","flexWrap":"nowrap"}
			} -->
			<div class="wp-block-group">
				<!-- wp:site-logo /-->
				<!-- wp:site-title /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:site-tagline {"fontSize":"sm"} /-->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"align":"full",
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull">

		<!-- wp:cover {
			"url":"http://localhost/wp/wp-content/uploads/2024/03/image-1.png",
			"id":6660,
			"dimRatio":0,
			"minHeight":385
		} -->
		<div class="wp-block-cover" style="min-height:385px">

			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<img class="wp-block-cover__image-background wp-image-6660" alt="" src="http://localhost/wp/wp-content/uploads/2024/03/image-1.png" data-object-fit="cover"/>

			<div class="wp-block-cover__inner-container">
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-centere"></p>
				<!-- /wp:paragraph -->
			</div>
		</div>
		<!-- /wp:cover -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"align":"full",
		"className":"is-style-section-1",
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|minus-1",
					"right":"var:preset|spacing|plus-3",
					"bottom":"var:preset|spacing|minus-1",
					"left":"var:preset|spacing|plus-3"
				}
			}
		},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull is-style-section-1" style="padding-top:var(--wp--preset--spacing--minus-1);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--minus-1);padding-left:var(--wp--preset--spacing--plus-3)">

		<!-- wp:group {
			"layout":{
				"type":"flex",
				"justifyContent":"space-between"
			}
		} -->
		<div class="wp-block-group">

			<!-- wp:navigation {
				"icon":"menu",
				"layout":{
					"type":"flex",
					"setCascadingProperties":true,
					"justifyContent":"left"
				}
			} /-->

			<!-- wp:social-links {
				"size":"has-small-icon-size",
				"className":"is-style-buttons-primary",
				"style":{
					"spacing":{
						"blockGap":{
							"top":"var:preset|spacing|base",
							"left":"var:preset|spacing|base"
						}
					}
				},
				"layout":{
					"type":"flex",
					"justifyContent":"right"
				}
			} -->
			<ul class="wp-block-social-links has-small-icon-size is-style-buttons-primary">
				<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
				<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
				<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
			</ul>
			<!-- /wp:social-links -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"x3p0-ideas/breadcrumbs"} /-->

</div>
<!-- /wp:group -->
