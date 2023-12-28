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
	"metadata":{"name":"<?= esc_attr__( 'Banner: Strip', 'x3p0-ideas' ) ?>"},
	"align":"full",
	"style":{
		"elements":{"link":{"color":{"text":"var:preset|color|base"}}},
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|base",
				"bottom":"var:preset|spacing|base"
			}
		}
	},
	"backgroundColor":"primary-contrast",
	"textColor":"base",
	"className":"is-style-padded-x",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull is-style-padded-x has-base-color has-primary-contrast-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--base)">
	<!-- wp:paragraph -->
	<p><?= __( "💡 <strong>Announcement:</strong> This is a banner strip pattern, which means you can stick it anywhere for announcements, such as at the top of the page. Use it to get the reader's attention.", 'x3p0-ideas' ) ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
