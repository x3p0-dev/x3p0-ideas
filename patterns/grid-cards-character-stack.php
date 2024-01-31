<?php

/**
 * Title: Vertical Character Cards
 * Slug: x3p0-ideas/grid-cards-character-stack
 * Categories: team, x3p0-grid
 * Keywords: card, grid, profile, team
 * Viewport Width: 1280
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

	<?php foreach (range(1, 6) as $card) : ?>
		<!-- wp:pattern {"slug":"x3p0-ideas/card-character-stack"} /-->
	<?php endforeach ?>

</div>
<!-- /wp:group -->
