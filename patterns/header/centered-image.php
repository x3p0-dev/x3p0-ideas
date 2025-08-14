<?php

/**
 * Title: Header: Centered With Image
 * Slug: x3p0-ideas/header-centered-image
 * Description:
 * Categories: header
 * Keywords: header
 * Block Types: core/template-part/header
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\Ideas\Tools\Placeholder;

$image = Placeholder::image('mountain-road.webp');

?>

<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Site Header', 'x3p0-ideas') ?>"},
	"align":"full",
	"className":"is-style-site-header",
	"style":{
		"spacing":{"blockGap":"0"}
	},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull is-style-site-header">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Branding', 'x3p0-ideas') ?>"},
		"align":"full",
		"style":{
			"typography":{
				"textAlign":"center"
			},
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				},
				"blockGap":"var:preset|spacing|20"
			}
		},
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"justifyContent":"center"
		}
	} -->
	<div class="wp-block-group has-text-align-center alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">
		<!-- wp:site-title {"fontSize":"2-xl"} /-->
		<!-- wp:site-tagline /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Menu Container', 'x3p0-ideas') ?>"},
		"align":"full",
		"className":"is-style-section-1",
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|40",
					"bottom":"var:preset|spacing|40",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				}
			}
		},
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-group alignfull is-style-section-1" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:navigation {
			"icon":"menu",
			"layout":{
				"type":"flex",
				"setCascadingProperties":true,
				"justifyContent":"center"
			}
		} /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Image Container', 'x3p0-ideas') ?>"},
		"align":"full",
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group alignfull">

		<!-- wp:image {
			"lightbox":{"enabled":false},
			"aspectRatio":"18/5",
			"scale":"cover",
			"sizeSlug":"x3p0-wide",
			"linkDestination":"none"
		} -->
		<figure class="wp-block-image size-x3p0-wide">
			<img src="<?= esc_url($image) ?>" alt="" style="aspect-ratio:18/5;object-fit:cover"/>
		</figure>
		<!-- /wp:image -->

	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"x3p0-ideas/breadcrumbs"} /-->

</div>
<!-- /wp:group -->
