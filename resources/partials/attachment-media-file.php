<?php
/**
 * Dynamic pattern for handling attachment media (fallback file).
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

$url = wp_get_attachment_url( get_the_ID() );
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:file {"id":<?= absint( get_the_ID() ) ?>,"href":"<?= esc_url( $url ) ?>"} -->
	<div class="wp-block-file">
		<a href="<?= esc_url( $url ) ?>"><?php the_title() ?></a>
		<a href="<?= esc_url( $url ) ?>" class="wp-block-file__button wp-element-button" download><?= esc_html__( 'Download', 'x3p0-ideas' ) ?></a>
	</div>
	<!-- /wp:file -->

</div>
<!-- /wp:group -->