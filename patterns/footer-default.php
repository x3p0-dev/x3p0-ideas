<?php

/**
 * Title: Footer: Default
 * Slug: x3p0-ideas/footer-default
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
	"layout":{"type":"default"},
	"className":"pattern-footer-default is-style-site-footer"
} -->
<div class="wp-block-group pattern-footer-default is-style-site-footer">

	<!-- wp:social-links {
		"showLabels":true,
		"size":"has-normal-icon-size",
		"layout":{"type":"flex","justifyContent":"center"},
		"className":"is-style-outline"
	} -->
	<ul class="wp-block-social-links has-normal-icon-size has-visible-labels is-style-outline">
		<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
		<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
		<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
		<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
		<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
	</ul>
	<!-- /wp:social-links -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Footer Content', 'x3p0-ideas') ?>"},
		"align":"wide",
		"style":{"spacing":{"blockGap":"0"}},
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"justifyContent":"center"
		}
	} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {
			"level":0,
			"isLink":false,
			"className":"is-style-normalize"
		} /-->

		<?php if (WP_Block_Type_Registry::get_instance()->is_registered('x3p0/powered-by')) : ?>
			<!-- wp:x3p0/powered-by {"poweredByType":"emoji"} /-->
		<?php else : ?>
			<!-- wp:paragraph {
				"metadata":{
					"bindings":{
						"content":{
							"source":"x3p0/theme",
							"args":{
								"key":"superpower"
							}
						}
					}
				},
				"placeholder":"<?= esc_attr__('Powered by WordPress, crazy ideas, and passion.', 'x3p0-ideas') ?>"
			} -->
			<p></p>
			<!-- /wp:paragraph -->
		<?php endif ?>
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
