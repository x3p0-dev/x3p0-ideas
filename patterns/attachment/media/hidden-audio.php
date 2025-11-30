<?php

/**
 * Title: Attachment Media: Audio
 * Slug: x3p0-ideas/attachment-media-audio
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\Ideas\Block\Rule\RuleRegistrar;

?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:audio {
		"lock":{"move":false,"remove":true},
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
			"x3p0/rules":{
				"rules":[{
					"type":"<?= esc_attr(RuleRegistrar::IF_ATTRIBUTE) ?>",
					"attribute":"src"
				}]
			}
		}
	} -->
	<figure class="wp-block-audio">
		<audio controls src=""></audio>
	</figure>
	<!-- /wp:audio -->

</div>
<!-- /wp:group -->
