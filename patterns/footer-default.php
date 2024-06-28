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
	"className":"is-style-site-footer",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group is-style-site-footer">

	<!-- wp:pattern {"slug":"x3p0-ideas/social-menu-outline"} /-->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Footer Content', 'x3p0-ideas') ?>"},
		"align":"wide",
		"style":{
			"spacing":{
				"blockGap":"0"
			}
		},
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
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
