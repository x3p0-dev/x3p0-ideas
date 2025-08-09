<?php

/**
 * Title: Attachment Media: PDF
 * Slug: x3p0-ideas/attachment-media-pdf
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:file {
		"metadata":{
			"bindings":{
				"fileName":{
					"source":"x3p0/media",
					"args":{
						"key":"title"
					}
				},
				"href":{
					"source":"x3p0/media",
					"args":{
						"key":"url"
					}
				},
				"textLinkHref":{
					"source":"x3p0/media",
					"args":{
						"key":"url"
					}
				}
			},
			"x3p0Rules":{"rules":[{"type":"ifAttribute","attribute":"href"}]}
		},
		"displayPreview":true,
		"align":"wide",
		"className":"is-style-icon"
	} -->
	<div class="wp-block-file alignwide is-style-icon">
		<object class="wp-block-file__embed" data="" type="application/pdf" style="width:100%;height:600px"></object>
		<a href=""><?= esc_html__('File', 'x3p0-ideas' ) ?></a>
		<a href="" class="wp-block-file__button wp-element-button" download><?= esc_html__('Download', 'x3p0-ideas') ?></a>
	</div>
	<!-- /wp:file -->

</div>
<!-- /wp:group -->
