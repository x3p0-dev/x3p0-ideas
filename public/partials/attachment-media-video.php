<?php
/**
 * Dynamic pattern for handling video attachment media.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

$caption = wp_get_attachment_caption( get_the_ID() );
$src     = wp_get_attachment_url( get_the_ID() );
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:video {"align":"wide"} -->
	<figure class="wp-block-video alignwide">
		<video controls muted src="<?= esc_url( $src ) ?>"></video>
		<?= $caption ? sprintf(
			'<figcaption class="wp-element-caption">%s</figcaption>',
			esc_html( $caption )
		) : '' ?>
	</figure>
	<!-- /wp:video -->
</div>
<!-- /wp:group -->
