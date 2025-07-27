<?php

/**
 * Title: Gallery: Seamless
 * Slug: x3p0-ideas/gallery-seamless
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
	"linkTo":"none",
	"sizeSlug":"x3p0-portrait",
	"align":"wide",
	"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}
} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-default is-cropped">

	<?php foreach (range(1, 3) as $number) : ?>

		<!-- wp:image {
			"sizeSlug":"x3p0-portrait",
			"linkDestination":"none",
			"style":{"border":{"radius":"0px"}}
		} -->
		<figure class="wp-block-image size-x3p0-portrait has-custom-border">
			<img src="<?= esc_url(Placeholder::image("placeholder-0{$number}-portrait.webp")) ?>" alt="" style="border-radius:0px"/>
		</figure>
		<!-- /wp:image -->

	<?php endforeach ?>

</figure>
<!-- /wp:gallery -->
