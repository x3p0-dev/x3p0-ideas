<?php

/**
 * Title: Footer: Call to Action
 * Slug: x3p0-ideas/footer-call-to-action
 * Description:
 * Categories: footer
 * Keywords: footer
 * Block Types: core/template-part/footer
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Footer Container', 'x3p0-ideas') ?>"},
	"align":"full",
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|plus-5"
		}
	},
	"layout":{"type":"default"},
	"className":"pattern-footer-call-to-action is-style-site-footer"
} -->
<div class="wp-block-group alignfull pattern-footer-call-to-action is-style-site-footer">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Call To Action', 'x3p0-ideas') ?>"},
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?= esc_html__('Ready to change your life?', 'x3p0-ideas') ?><br><?= esc_html__('Start today.', 'x3p0-ideas') ?></h2>
		<!-- /wp:heading -->

		<!-- wp:buttons {
			"layout":{
				"type":"flex",
				"justifyContent":"center"
			}
		} -->
		<div class="wp-block-buttons">

			<!-- wp:button -->
			<div class="wp-block-button">
				<a class="wp-block-button__link wp-element-button"><?= esc_html__('Get Started →', 'x3p0-ideas') ?></a>
			</div>
			<!-- /wp:button -->

		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Divider', 'x3p0-ideas') ?>"},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group">
		<!-- wp:separator {"className":"is-style-hand-drawn"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-hand-drawn"/>
		<!-- /wp:separator -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Footer Content', 'x3p0-ideas') ?>"},
		"align":"full",
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull">

		<!-- wp:social-links {
			"showLabels":true,
			"size":"has-small-icon-size",
			"className":"is-style-outline",
			"layout":{"type":"flex","justifyContent":"center"}
		} -->
		<ul class="wp-block-social-links has-small-icon-size has-visible-labels is-style-outline">
			<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
			<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
			<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
			<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
			<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
		</ul>
		<!-- /wp:social-links -->

		<!-- wp:site-title {
			"textAlign":"center",
			"isLink":false,
			"style":{
				"typography":{
					"textTransform":"uppercase",
					"fontStyle":"normal",
					"fontWeight":"600"
				}
			},
			"className":"is-style-normalize",
			"fontSize":"md"
		} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
