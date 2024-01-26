<?php

/**
 * Dynamic pattern for handling image attachment meta.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

use X3P0\Ideas\Tools\MediaMeta;

# Prevent direct access.
defined('ABSPATH') || exit;

$meta  = new MediaMeta($data['post_id']);
$image = wp_get_attachment_image_src($data['post_id'], 'x3p0-16x9-lg');

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
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"align":"full",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"className":"screen-reader-text"} -->
	<h2 class="wp-block-heading screen-reader-text"><?= esc_html__('Image Data', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group">

		<?php foreach ($fields as $key => $label) : ?>

			<?php if ($meta->has($key)) : ?>

				<!-- wp:group {
					"style":{
						"spacing":{
							"padding":{
								"right":"var:preset|spacing|base",
								"left":"var:preset|spacing|base"
							}
						}
					},
					"layout":{
						"type":"flex",
						"flexWrap":"nowrap",
						"justifyContent":"space-between"
					}
				} -->
				<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--base);padding-left:var(--wp--preset--spacing--base)">

					<!-- wp:paragraph {
						"style":{
							"typography":{
								"fontStyle":"normal",
								"fontWeight":"500"
							}
						},
						"fontSize":"sm"
					} -->
					<p class="has-sm-font-size" style="font-style:normal;font-weight:500"><?= esc_html($label) ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {
						"fontSize":"xs",
						"fontFamily":"mono"
					} -->
					<p class="has-mono-font-family has-xs-font-size"><?php $meta->display($key) ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			<?php endif ?>

		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"default"},"fontSize":"sm"} -->
	<div class="wp-block-group has-sm-font-size">
		<!-- wp:file {
			"id":<?= absint($data['post_id']) ?>,
			"href":"<?= esc_url($image[0]) ?>",
			"showDownloadButton":false,
			"className":"is-style-icon"
		} -->
		<div class="wp-block-file is-style-icon">
			<a href="<?= esc_url($image[0]) ?>"><?= esc_html__('Download', 'x3p0-ideas') ?></a>
		</div>
		<!-- /wp:file -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
