<?php

/**
 * Title: Gallery: Picture Quote Gallery
 * Slug: x3p0-ideas/gallery-picture-quote
 * Description:
 * Categories: gallery
 * Keywords: gallery, images
 * Block Types: core/gallery
 * Viewport Width: 1024
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$image = get_theme_file_uri('public/media/images/mountain-road.webp');

?>
<!-- wp:group {
	"align":"wide",
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"layout":{"type":"grid","minimumColumnWidth":"22rem"}
} -->
<div class="wp-block-group alignwide">

	<!-- wp:group {
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"verticalAlignment":"space-between"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:gallery {
			"columns":2,
			"linkTo":"none",
			"sizeSlug":"x3p0-square",
			"style":{"layout":{"selfStretch":"fill","flexSize":null}}
		} -->
		<figure class="wp-block-gallery has-nested-images columns-2 is-cropped">

			<!-- wp:image {
				"sizeSlug":"x3p0-square",
				"linkDestination":"none"
			} -->
			<figure class="wp-block-image size-x3p0-square">
				<img src="<?= esc_url($image) ?>" alt="" />
			</figure>
			<!-- /wp:image -->

		</figure>
		<!-- /wp:gallery -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{
			"type":"flex",
			"orientation":"vertical",
			"justifyContent":"stretch",
			"verticalAlignment":"space-between"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:pullquote {"className":"is-style-mark-top","fontSize":"lg"} -->
		<figure class="wp-block-pullquote is-style-mark-top has-lg-font-size">
			<blockquote><p><?= esc_html__( "I've walked miles upon miles of desert, climbed mountains, and soared through the skies. Yet, there is so much more to do—a thousand more lifetimes to live, loves to love, and journeys to trek.", 'x3p0-ideas') ?></p>
				<cite>Justin Tadlock</cite>
			</blockquote>
		</figure>
		<!-- /wp:pullquote -->

		<!-- wp:gallery {
			"columns":2,
			"linkTo":"none",
			"sizeSlug":"x3p0-square",
			"style":{"layout":{"selfStretch":"fill","flexSize":null}}
		} -->
		<figure class="wp-block-gallery has-nested-images columns-2 is-cropped">

			<?php foreach (range(1, 2) as $col): ?>

				<!-- wp:image {
					"sizeSlug":"x3p0-square",
					"linkDestination":"none"
				} -->
				<figure class="wp-block-image size-x3p0-square">
					<img src="<?= esc_url($image) ?>" alt="" />
				</figure>
				<!-- /wp:image -->

			<?php endforeach ?>

		</figure>
		<!-- /wp:gallery -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
