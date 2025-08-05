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
	"className":"is-style-site-footer",
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|90",
			"padding":{
				"top":"var:preset|spacing|100",
				"bottom":"var:preset|spacing|100",
				"left":"var:preset|spacing|70",
				"right":"var:preset|spacing|70"
			}
		}
	},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull is-style-site-footer" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Call To Action', 'x3p0-ideas') ?>"},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|40"
			}
		},
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
		<!-- wp:separator {"className":"is-style-separator-hand-drawn"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-separator-hand-drawn"/>
		<!-- /wp:separator -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Footer Content', 'x3p0-ideas') ?>"},
		"align":"full",
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|40"
			}
		},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull">

		<!-- wp:pattern {"slug":"x3p0-ideas/social-menu-buttons-primary"} /-->

		<!-- wp:site-title {
			"textAlign":"center",
			"isLink":false,
			"className":"is-style-text-normalize"
		} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
