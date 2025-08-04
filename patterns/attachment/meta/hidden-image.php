<?php

/**
 * Title: Attachment Meta: Image
 * Slug: x3p0-ideas/attachment-meta-image
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$fields = [
	'dimensions'        => __('Dimensions:', 'x3p0-ideas'),
	'created_timestamp' => __('Date:', 'x3p0-ideas'),
	'camera'            => __('Camera:', 'x3p0-ideas'),
	'aperture'          => __('Aperture:', 'x3p0-ideas'),
	'focal_length'      => __('Focal Length:', 'x3p0-ideas'),
	'iso'               => __('ISO:', 'x3p0-ideas'),
	'shutter_speed'     => __('Shutter Speed:', 'x3p0-ideas'),
	'mime_type'         => __('Mime Type:', 'x3p0-ideas'),
	'file_size'         => __('Size:', 'x3p0-ideas')
];

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Media Data', 'x3p0-ideas') ?>"},
	"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},
	"align":"full",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"className":"screen-reader-text"} -->
	<h2 class="wp-block-heading screen-reader-text"><?= esc_html__('Image Data', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {
		"templateLock":"insert",
		"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group">

		<?php foreach ($fields as $key => $label) : ?>

			<!-- wp:paragraph {
				"metadata":{
					"name":"<?= sprintf(
						// Translators: %s is the metadata label.
						esc_attr__('%s Media Meta', 'x3p0-ideas'),
						esc_attr($label)
					) ?>",
					"bindings":{
						"content":{
							"source":"x3p0/media",
							"args":{
								"key":"<?= esc_attr($key) ?>",
								"label":"<?= esc_attr($label) ?>"
							}
						}
					},
					"x3p0Rules":{"rules":[{"type": "ifAttribute", "attribute": "content"}]}
				},
				"placeholder":"<?= esc_attr__('Connected to a custom field', 'x3p0-ideas') ?>",
				"fontSize":"sm",
				"className":"media-data"
			} -->
			<p class="has-sm-font-size media-data"></p>
			<!-- /wp:paragraph -->

		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
