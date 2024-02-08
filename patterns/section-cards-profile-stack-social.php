<?php

/**
 * Title: Section: Vertical Social Profile Cards
 * Slug: x3p0-ideas/section-cards-profile-stack-social
 * Categories: team, x3p0-section
 * Keywords: card, grid, profile, social, team
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
				"left":"var:preset|spacing|plus-3"
			}
		}
	},
	"align":"full",
	"className":"is-style-section",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-group alignfull is-style-section" style="padding-right:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:pattern {"slug":"x3p0-ideas/section-header"} /-->
	<!-- wp:pattern {"slug":"x3p0-ideas/grid-cards-profile-stack-social"} /-->

</section>
<!-- /wp:group -->
