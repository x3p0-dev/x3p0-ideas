<?php

/**
 * Title: Vertical Social Profile Card
 * Slug: x3p0-ideas/card-profile-stack-social
 * Categories: team, x3p0-card
 * Keywords: card, grid, profile, social, team
 * Viewport Width: 480
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\Ideas\Tools\Language;

?>
<!-- wp:group {
	"metadata":{"name":"Card"},
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"bottom":"0",
				"left":"0",
				"right":"0"
			}
		}
	},
	"className":"has-global-border is-style-section-3",
	"fontSize":"sm",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"stretch",
		"verticalAlignment":"space-between"
	}
} -->
<div class="wp-block-group has-global-border is-style-section-3 has-sm-font-size" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:group {
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|base"
			}
		},
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"justifyContent":"center"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:avatar {
			"userId":1,
			"isLink":true,
			"className":""
		} /-->

		<!-- wp:group {
			"metadata":{"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"},
			"style":{
				"spacing":{
					"blockGap":"0",
					"padding":{
						"right":"var:preset|spacing|plus-3",
						"left":"var:preset|spacing|plus-3"
					}
				}
			},
			"layout":{"type":"default"}
		} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

			<!-- wp:heading {
				"textAlign":"center",
				"level":3,
				"textColor":"contrast",
				"fontSize":"lg"
			} -->
			<h3 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-lg-font-size"><?= esc_html__('User Name', 'x3p0-ideas') ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p><?= esc_html(Language::loremIpsum(8)) ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"tagName":"footer",
		"metadata":{"name":"<?= esc_attr__('Card Footer', 'x3p0-ideas') ?>"},
		"style":{
			"typography":{
				"fontStyle":"normal",
				"fontWeight":"600"
			},
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|base",
					"bottom":"var:preset|spacing|base"
				}
			}
		},
		"className":"is-style-section-2",
		"layout":{"type":"default"}
	} -->
	<footer class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--base);font-style:normal;font-weight:600">

		<!-- wp:social-links {
			"templateLock":"all",
			"lock":{
				"move":true,
				"remove":true
			},
			"iconColor":"contrast",
			"iconColorValue":"#000000",
			"size":"has-large-icon-size",
			"style":{
				"spacing":{
					"blockGap":{
						"top":"var:preset|spacing|minus-3",
						"left":"var:preset|spacing|minus-3"
					}
				}
			},
			"className":"is-style-logos-only",
			"layout":{
				"type":"flex",
				"justifyContent":"center"
			}
		} -->
		<ul class="wp-block-social-links has-large-icon-size has-icon-color is-style-logos-only">
			<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
			<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
			<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
			<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
			<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
		</ul>
		<!-- /wp:social-links -->

	</footer>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
