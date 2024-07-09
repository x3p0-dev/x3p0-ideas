<?php

/**
 * Title: Section: Pricing Cards
 * Slug: x3p0-ideas/section-pricing-cards
 * Categories: x3p0-grid
 * Keywords: pricing
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"section",
	"metadata":{"name":"<?= esc_attr__('Section', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"padding":{
				"right":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3",
				"top":"var:preset|spacing|plus-4",
				"bottom":"var:preset|spacing|plus-4"
			}
		}
	},
	"align":"full",
	"className":"is-style-section-4",
	"layout":{
		"type":"constrained",
		"contentSize":"40rem",
		"wideSize":"80rem"
	}
} -->
<section class="wp-block-group alignfull is-style-section-4" style="padding-top:var(--wp--preset--spacing--plus-4);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-4);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:pattern {"slug":"x3p0-ideas/section-header"} /-->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Grid', 'x3p0-ideas') ?>"},
		"align":"wide",
		"layout":{"type":"grid","minimumColumnWidth":"19rem"}
	} -->
	<div class="wp-block-group alignwide">

		<?php foreach (range(1, 3) as $card) : ?>
			<!-- wp:pattern {"slug":"x3p0-ideas/card-pricing"} /-->
		<?php endforeach ?>

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
