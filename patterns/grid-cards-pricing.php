<?php

/**
 * Title: Pricing Cards
 * Slug: x3p0-ideas/grid-cards-pricing
 * Categories: x3p0-grid
 * Keywords: card, grid, pricing
 * Viewport Width: 1024
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
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
