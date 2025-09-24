<?php

/**
 * Title: Attachment Media: Video
 * Slug: x3p0-ideas/attachment-media-video
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:video {
		"align":"wide",
		"lock":{"move":false,"remove":true},
		"metadata":{
			"bindings":{
				"src":{
					"source":"x3p0/media",
					"args":{
						"type":"video",
						"key":"src"
					}
				}
			},
			"x3p0/rules":{"rules":[{"type":"ifAttribute","attribute":"src"}]}
		}
	} -->
	<figure class="wp-block-video alignwide">
		<video controls src="#"></video>
	</figure>
	<!-- /wp:video -->

</div>
<!-- /wp:group -->
