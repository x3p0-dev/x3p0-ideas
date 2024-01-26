<?php

/**
 * Title: Banner: Strip
 * Slug: x3p0-ideas/banner-strip
 * Description:
 * Categories: banner
 * Keywords: banner, text
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Banner', 'x3p0-ideas') ?>"},
	"align":"full",
	"style":{
		"elements":{
			"link":{
				"color":{
					"text":"var:preset|color|base"
				}
			}
		},
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|base",
				"right":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|base",
				"left":"var:preset|spacing|plus-3"
			}
		}
	},
	"backgroundColor":"primary-700",
	"textColor":"base",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull has-base-color has-primary-700-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--base);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--base);padding-left:var(--wp--preset--spacing--plus-3)">
	<!-- wp:paragraph {
		"placeholder":"<?= esc_attr__('Write your banner text...', 'x3p0-ideas') ?>"
	} -->
	<p></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
