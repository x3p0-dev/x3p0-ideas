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

$image = get_theme_file_uri('public/media/images/default-16x9.webp');
?>
<!-- wp:group {
	"align":"wide",
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignwide">

	<!-- wp:gallery {
		"columns":2,
		"linkTo":"none",
		"sizeSlug":"x3p0-16x9-lg"
	} -->
	<figure class="wp-block-gallery has-nested-images columns-2 is-cropped">

		<?php foreach (range(1, 2) as $number) : ?>

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

	<!-- wp:gallery {
		"columns":3,
		"linkTo":"none",
		"sizeSlug":"x3p0-16x9-lg"
	} -->
	<figure class="wp-block-gallery has-nested-images columns-3 is-cropped">

		<?php foreach (range(1, 3) as $number) : ?>

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

</div>
<!-- /wp:group -->
