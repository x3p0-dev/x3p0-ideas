<?php

/**
 * Title: Gallery: Two-Three
 * Slug: x3p0-ideas/gallery-two-three
 * Description:
 * Categories: gallery
 * Keywords: gallery, images
 * Block Types: core/gallery
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$image = get_theme_file_uri('public/media/images/mountain-road.webp');

?>
<!-- wp:gallery {
	"columns":3,
	"linkTo":"none",
	"sizeSlug":"x3p0-16x9-lg",
	"align":"wide",
	"className":"is-style-reverse"
} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped is-style-reverse">

	<?php foreach (range(1, 5) as $number) : ?>

		<!-- wp:image {
			"sizeSlug":"x3p0-16x9-lg",
			"linkDestination":"none"
		} -->
		<figure class="wp-block-image size-x3p0-16x9-lg">
			<img src="<?= esc_url($image) ?>" alt=""/>
		</figure>
		<!-- /wp:image -->

	<?php endforeach ?>

</figure>
<!-- /wp:gallery -->
