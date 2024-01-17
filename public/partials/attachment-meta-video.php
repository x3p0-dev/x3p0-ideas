<?php
/**
 * Dynamic pattern for handling video attachment meta.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */
use X3P0\Ideas\Tools\MediaMeta;

$meta = new MediaMeta( $args['post_id'] );
$url  = wp_get_attachment_url( $args['post_id'] );

$fields = [
	'length_formatted' => __( 'Run Time:', 'x3p0-ideas' ),
	'dimensions'       => __( 'Dimensions:', 'x3p0-ideas' ),
	'mime_type'        => __( 'Mime Type:', 'x3p0-ideas' ),
	'file_size'        => __( 'Size:', 'x3p0-ideas' )
];
?>
<!-- wp:group {
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"align":"full",
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"className":"screen-reader-text"} -->
	<h2 class="wp-block-heading screen-reader-text"><?= esc_html__( 'Video Data', 'x3p0-ideas' ) ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}},
		"layout":{"type":"default"}
	} -->
	<div class="wp-block-group">

		<?php foreach ( $fields as $key => $label ) : ?>

			<?php if ( $meta->has( $key ) ) : ?>

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
					<p class="has-sm-font-size" style="font-style:normal;font-weight:500"><?= esc_html( $label ) ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {
						"fontSize":"xs",
						"fontFamily":"mono"
					} -->
					<p class="has-mono-font-family has-xs-font-size"><?php $meta->display( $key ) ?></p>
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
			"id":<?= absint( $args['post_id'] ) ?>,
			"href":"<?= esc_url( $url ) ?>",
			"showDownloadButton":false,
			"style":{
				"spacing":{
					"padding":{
						"top":"var:preset|spacing|minus-1",
						"bottom":"var:preset|spacing|minus-1",
						"left":"var:preset|spacing|base",
						"right":"var:preset|spacing|base"
					}
				}
			},
			"className":"is-style-icon"
		} -->
		<div class="wp-block-file is-style-icon" style="padding-top:var(--wp--preset--spacing--minus-1);padding-right:var(--wp--preset--spacing--base);padding-bottom:var(--wp--preset--spacing--minus-1);padding-left:var(--wp--preset--spacing--base)">
			<a href="<?= esc_url( $url ) ?>"><?= esc_html__( 'Download', 'x3p0-ideas' ) ?></a>
		</div>
		<!-- /wp:file -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
