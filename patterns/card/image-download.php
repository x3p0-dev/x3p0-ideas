<?php

/**
 * Title: Image Download Card
 * Slug: x3p0-ideas/card-image-download
 * Categories: x3p0-card
 * Keywords: card, download, file, gallery, grid, image, media
 * Viewport Width: 480
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\Ideas\Tools\Placeholder;

$image = Placeholder::image('placeholder-01-wide.webp');

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"top":"0",
				"bottom":"0",
				"left":"0",
				"right":"0"
			},
			"blockGap":"0"
		}
	},
	"className":"has-global-border is-style-section-1",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"stretch",
		"verticalAlignment":"space-between"
	},
	"fontSize":"sm"
} -->
<div class="wp-block-group has-global-border is-style-section-1 has-sm-font-size" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:image {
		"lightbox":{"enabled":false},
		"aspectRatio":"16/9",
		"scale":"cover",
		"sizeSlug":"x3p0-wide",
		"linkDestination":"none",
		"style":{
			"border":{
				"radius":"0px"
			}
		},
		"className":"is-style-borderless"
	} -->
	<figure class="wp-block-image size-x3p0-wide has-custom-border is-style-borderless">
		<img src="<?= esc_url($image) ?>" alt="" style="border-radius:0px;aspect-ratio:16/9;object-fit:cover"/>
	</figure>
	<!-- /wp:image -->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Card Content', 'x3p0-ideas') ?>"},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|40",
				"padding":{
					"top":"var:preset|spacing|70",
					"bottom":"var:preset|spacing|70",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				}
			},
			"layout":{
				"selfStretch":"fill",
				"flexSize":null
			}
		},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">

		<!-- wp:heading {"fontSize":"xl"} -->
		<h2 class="wp-block-heading has-xl-font-size"><?= esc_html__('Placeholder', 'x3p0-ideas') ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?= esc_html(Placeholder::text(8)) ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"tagName":"footer",
		"metadata":{
			"name":"<?= esc_attr__('Card Footer', 'x3p0-ideas') ?>"
		},
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
		"className":"is-style-section-2",
		"layout":{"type":"default"}
	} -->
	<footer class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--70)">
		<!-- wp:file {
			"href":"<?= esc_url($image) ?>",
			"showDownloadButton":false,
			"style":{
				"border":{
					"width":"0px",
					"style":"none"
				}
			},
			"className":"is-style-file-plain",
			"fontSize":"sm"
		} -->
		<div class="wp-block-file is-style-file-plain has-sm-font-size" style="border-style:none;border-width:0px">
			<a href="<?= esc_url($image) ?>"><?= esc_html__('Download', 'x3p0-ideas') ?></a>
		</div>
		<!-- /wp:file -->
	</footer>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
