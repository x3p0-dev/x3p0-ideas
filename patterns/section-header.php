<?php

/**
 * Title: Section Header
 * Slug: x3p0-ideas/section-header
 * Categories: x3p0-section
 * Keywords: text
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"header",
	"metadata":{"name":"<?= esc_attr__('Section Header', 'x3p0-ideas') ?>"},
	"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
	"layout":{"type":"constrained"}
} -->
<header class="wp-block-group">

	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?= esc_html__('Placeholder Heading', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum turpis quis metus aliquam, id pharetra arcu dignissim. Sed in sollicitudin mi.', 'x3p0-ideas') ?></p>
	<!-- /wp:paragraph -->

</header>
<!-- /wp:group -->
