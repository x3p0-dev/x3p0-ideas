<?php

/**
 * Dynamic pattern for handling attachment media (fallback file).
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

$url   = wp_get_attachment_url($data['post_id']);
$title = get_the_title($data['post_id']);
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:file {"id":<?= absint($data['post_id']) ?>,"href":"<?= esc_url($url) ?>","className":"is-style-icon"} -->
	<div class="wp-block-file is-style-icon">
		<a href="<?= esc_url($url) ?>"><?= esc_html(wp_strip_all_tags($title)) ?></a>
		<a href="<?= esc_url($url) ?>" class="wp-block-file__button wp-element-button" download><?= esc_html__('Download', 'x3p0-ideas') ?></a>
	</div>
	<!-- /wp:file -->

</div>
<!-- /wp:group -->
