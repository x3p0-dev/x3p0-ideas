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

use X3P0\Ideas\Tools\Placeholder;

?>
<!-- wp:group {
	"align":"wide",
	"className":"is-style-section-1 has-global-border",
	"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},
	"layout":{"type":"grid","minimumColumnWidth":"22rem"}
} -->
<div class="wp-block-group alignwide is-style-section-1 has-global-border">

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},
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
			<blockquote><p><?= esc_html__("I've walked miles upon miles of desert, climbed mountains, and soared through the skies. Yet, there is so much more to do—a thousand more lifetimes to live, loves to love, and journeys to trek.", 'x3p0-ideas') ?></p>
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

			<?php foreach (range(2, 3) as $col) : ?>

				<!-- wp:image {
					"sizeSlug":"x3p0-square",
					"linkDestination":"none"
				} -->
				<figure class="wp-block-image size-x3p0-square">
					<img src="<?= esc_url(Placeholder::image("placeholder-0{$col}-square.webp")) ?>" alt="" />
				</figure>
				<!-- /wp:image -->

			<?php endforeach ?>

		</figure>
		<!-- /wp:gallery -->

	</div>
	<!-- /wp:group -->

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
				<img src="<?= esc_url(Placeholder::image('placeholder-01-square.webp')) ?>" alt="" />
			</figure>
			<!-- /wp:image -->

		</figure>
		<!-- /wp:gallery -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
