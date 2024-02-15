<?php

/**
 * Title: Attachment Meta: Audio
 * Slug: x3p0-ideas/attachment-meta-audio
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$fields = [
	'length_formatted' => __('Run Time:', 'x3p0-ideas'),
	'artist'           => __('Artist:', 'x3p0-ideas'),
	'album'            => __('Album:', 'x3p0-ideas'),
	'track_number'     => __('Track:', 'x3p0-ideas'),
	'year'             => __('Year:', 'x3p0-ideas'),
	'genre'            => __('Genre:', 'x3p0-ideas'),
	'mime_type'        => __('Mime Type:', 'x3p0-ideas'),
	'file_size'        => __('Size:', 'x3p0-ideas')
];

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Media Data', 'x3p0-ideas') ?>"},
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"align":"full",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"className":"screen-reader-text"} -->
	<h2 class="wp-block-heading screen-reader-text"><?= esc_html__('Audio Data', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}},
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
					"@rules":{
						"ifAttr":"content"
					}
				},
				"placeholder":"<?= esc_attr('Connected to a custom field', 'x3p0-ideas') ?>",
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
