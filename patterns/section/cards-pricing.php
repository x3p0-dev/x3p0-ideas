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
				"right":"var:preset|spacing|70",
				"left":"var:preset|spacing|70",
				"top":"var:preset|spacing|80",
				"bottom":"var:preset|spacing|80"
			}
		}
	},
	"align":"full",
	"className":"is-style-section-1",
	"layout":{
		"type":"constrained",
		"contentSize":"40rem",
		"wideSize":"80rem"
	}
} -->
<section class="wp-block-group alignfull is-style-section-1" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--70)">

	<!-- wp:pattern {"slug":"x3p0-ideas/section-header"} /-->

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Grid', 'x3p0-ideas') ?>"},
		"align":"wide",
		"layout":{"type":"grid","minimumColumnWidth":"19rem"}
	} -->
	<div class="wp-block-group alignwide">

		<!-- wp:pattern {"slug":"x3p0-ideas/card-pricing-secondary"} /-->
		<!-- wp:pattern {"slug":"x3p0-ideas/card-pricing-secondary"} /-->
		<!-- wp:pattern {"slug":"x3p0-ideas/card-pricing-primary"} /-->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
