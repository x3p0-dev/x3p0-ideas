<?php

/**
 * Dynamic pattern for handling for PDF attachment media.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

$url   = wp_get_attachment_url($args['post_id']);
$title = get_the_title($args['post_id']);
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:file {"id":<?= absint($args['post_id']) ?>,"href":"<?= esc_url($url) ?>","displayPreview":true,"align":"wide","className":"is-style-icon"} -->
	<div class="wp-block-file alignwide is-style-icon">
		<object class="wp-block-file__embed" data="<?= esc_url($url) ?>" type="application/pdf" style="width:100%;height:600px" aria-label="<?= esc_attr($title) ?>"></object>
		<a href="<?= esc_url($url) ?>"><?= esc_html(wp_strip_all_tags($title)) ?></a>
		<a href="<?= esc_url($url) ?>" class="wp-block-file__button wp-element-button" download><?= esc_html__('Download', 'x3p0-ideas') ?></a>
	</div>
	<!-- /wp:file -->

</div>
<!-- /wp:group -->
