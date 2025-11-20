<?php

/**
 * Title: Attachment Meta: Audio
 * Slug: x3p0-ideas/attachment-meta-audio
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Media Data', 'x3p0-ideas') ?>"},
	"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},
	"align":"full",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"className":"screen-reader-text"} -->
	<h2 class="wp-block-heading screen-reader-text"><?= esc_html__('Audio Data', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:x3p0/media-data {
		"metadata":{
			"bindings":{
				"mediaId":{
					"source":"x3p0/media",
					"args":{"key":"id"}
				}
			}
		}
	} -->
	<div class="wp-block-x3p0-media-data">
		<!-- wp:x3p0/media-data-field {"field":"length_formatted"} /-->
		<!-- wp:x3p0/media-data-field {"field":"artist"} /-->
		<!-- wp:x3p0/media-data-field {"field":"album"} /-->
		<!-- wp:x3p0/media-data-field {"field":"track_number"} /-->
		<!-- wp:x3p0/media-data-field {"field":"year"} /-->
		<!-- wp:x3p0/media-data-field {"field":"genre"} /-->
		<!-- wp:x3p0/media-data-field {"field":"mime_type"} /-->
		<!-- wp:x3p0/media-data-field {"field":"file_size"} /-->
	</div>
	<!-- /wp:x3p0/media-data -->

</div>
<!-- /wp:group -->
