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
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|100",
				"bottom":"var:preset|spacing|100",
				"left":"var:preset|spacing|70",
				"right":"var:preset|spacing|70"
			}
		}
	},
	"className":"is-style-site-footer",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group is-style-site-footer" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--70)">

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
			"className":"is-style-text-normalize"
		} /-->

		<!-- wp:paragraph {
			"metadata":{
				"bindings":{
					"content":{
						"source":"x3p0/superpower"
					}
				}
			},
			"placeholder":"<?= esc_attr__('Powered by WordPress, crazy ideas, and passion.', 'x3p0-ideas') ?>"
		} -->
		<p></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"x3p0-ideas/social-menu-buttons-primary"} /-->

</div>
<!-- /wp:group -->
