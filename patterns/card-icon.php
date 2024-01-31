<?php

/**
 * Title: Icon Card
 * Slug: x3p0-ideas/card-icon
 * Categories: x3p0-card
 * Keywords: card, grid
 * Viewport Width: 480
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$icon = get_theme_file_uri('public/media/svg/earthquake.svg');

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Card', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"top":"var:preset|spacing|plus-3",
				"bottom":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-1",
				"right":"var:preset|spacing|plus-1"
			},
			"blockGap":"var:preset|spacing|base"
		}
	},
	"className":"is-style-card",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-1);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-1)">

	<!-- wp:image {
		"lightbox":{"enabled":false},
		"width":"48px",
		"height":"auto",
		"sizeSlug":"full",
		"linkDestination":"none",
		"className":"is-style-borderless"
	} -->
	<figure class="wp-block-image size-full is-resized is-style-borderless">
		<img src="<?= esc_url($icon) ?>" alt="" style="width:48px;height:auto"/>
	</figure>
	<!-- /wp:image -->

	<!-- wp:heading {"fontSize":"xl"} -->
	<h2 class="wp-block-heading has-xl-font-size"><?= esc_html__('Placeholder', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'x3p0-ideas') ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
