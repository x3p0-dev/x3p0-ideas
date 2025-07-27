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

use X3P0\Ideas\Tools\Placeholder;

?>
<!-- wp:gallery {
	"columns":3,
	"linkTo":"none",
	"sizeSlug":"x3p0-wide",
	"align":"wide",
	"className":"is-style-gallery-reverse"
} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped is-style-gallery-reverse">

	<?php foreach (range(1, 5) as $number) : ?>

		<!-- wp:image {
			"sizeSlug":"x3p0-wide",
			"linkDestination":"none"
		} -->
		<figure class="wp-block-image size-x3p0-wide">
			<img src="<?= esc_url(Placeholder::image(sprintf(
				'placeholder-0%s-wide.webp',
				mt_rand(1, 3)
			))) ?>" alt=""/>
		</figure>
		<!-- /wp:image -->

	<?php endforeach ?>

</figure>
<!-- /wp:gallery -->
