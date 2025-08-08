<?php

/**
 * Title: Attachment Media: Audio
 * Slug: x3p0-ideas/attachment-media-audio
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:audio {
		"metadata":{
			"bindings":{
				"src":{
					"source":"x3p0/media",
					"args":{
						"type":"audio",
						"key":"src"
					}
				}
			},
			"x3p0Rules":{"rules":[{"type":"ifAttribute","attribute":"src"}]}
		}
	} -->
	<figure class="wp-block-audio">
		<audio controls src=""></audio>
	</figure>
	<!-- /wp:audio -->

</div>
<!-- /wp:group -->
