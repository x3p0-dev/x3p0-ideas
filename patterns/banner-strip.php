<?php
/**
 * Title: Banner: Strip
 * Slug: x3p0-ideas/banner-strip
 * Description:
 * Categories: banner
 * Keywords: banner, strip, text
 */
?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__( 'Banner', 'x3p0-ideas' ) ?>"},
	"align":"full",
	"style":{
		"elements":{"link":{"color":{"text":"var:preset|color|base"}}},
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|base",
				"right":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|base",
				"left":"var:preset|spacing|plus-3"
			}
		}
	},
	"backgroundColor":"primary-contrast",
	"textColor":"base",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull has-base-color has-primary-contrast-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--base);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--base);padding-left:var(--wp--preset--spacing--plus-3)">
	<!-- wp:paragraph -->
	<p><?php esc_html_e( "💡 Announcement: This is a banner strip pattern, which means you can stick it anywhere for announcements, such as at the top of the page. Use it to get the reader's attention.", 'x3p0-ideas' ) ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
