<?php

/**
 * Dynamic pattern for handling image attachment media.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

$caption = wp_get_attachment_caption($data['post_id']);
$image   = wp_get_attachment_image_src($data['post_id'], 'x3p0-16x9-lg');
$alt     = get_post_meta($data['post_id'], '_wp_attachment_image_alt', true);

?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:image {
		"align":"wide",
		"id":<?= absint($data['post_id']) ?>,
		"sizeSlug":"x3p0-16x9-lg",
		"linkDestination":"none"
	} -->
	<figure class="wp-block-image alignwide size-x3p0-16x9-lg">
		<img src="<?= esc_url($image[0]) ?>" alt="<?= esc_attr($alt) ?>" />

		<?php if ($caption) : ?>
			<figcaption class="wp-element-caption"><?= esc_html($caption) ?></figcaption>
		<?php endif ?>
	</figure>
	<!-- /wp:image -->

</div>
<!-- /wp:group -->
