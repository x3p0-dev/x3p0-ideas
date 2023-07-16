<?php
/**
 * Dynamic pattern for handling image attachment media.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

$caption = wp_get_attachment_caption( get_the_ID() );
$image   = wp_get_attachment_image_src( get_the_ID(), 'x3p0-16x9-lg' );
$alt     = trim( strip_tags( get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true ) ) );
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:image {"align":"wide","id":<?= absint( get_the_ID() ) ?>,"sizeSlug":"x3p0-16x9-lg","linkDestination":"none"} -->
	<figure class="wp-block-image alignwide size-x3p0-16x9-lg">
		<img src="<?= esc_url( $image[0] ) ?>" alt="<?= esc_attr( $alt ) ?>" />

		<?php if ( $caption ) : ?>
			<figcaption class="wp-element-caption"><?= $caption ?></figcaption>
		<?php endif ?>
	</figure>
	<!-- /wp:image -->

</div>
<!-- /wp:group -->
