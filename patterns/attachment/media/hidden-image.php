<?php

/**
 * Title: Attachment Media: Image
 * Slug: x3p0-ideas/attachment-media-image
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:image {
		"align":"wide",
		"sizeSlug":"x3p0-wide",
		"linkDestination":"none",
		"metadata":{
			"bindings":{
				"url":{
					"source":"x3p0/media",
					"args":{
						"type":"image",
						"size":"x3p0-wide"
					}
				},
				"alt":{
					"source":"x3p0/media"
				},
				"caption":{
					"source":"x3p0/media"
				}
			},
			"x3p0Rules":{"rules":[{"type": "ifAttribute", "attribute": "url"}]}
		}
	} -->
	<figure class="wp-block-image alignwide size-x3p0-wide">
		<img src="" alt="" />
		<figcaption class="wp-element-caption"></figcaption>
	</figure>
	<!-- /wp:image -->

</div>
<!-- /wp:group -->
