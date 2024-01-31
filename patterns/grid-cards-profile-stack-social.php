<?php

/**
 * Title: Vertical Social Profile Cards
 * Slug: x3p0-ideas/grid-cards-profile-stack-social
 * Categories: team, x3p0-grid
 * Keywords: card, grid, profile, social, team
 * Viewport Width: 896
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Grid', 'x3p0-ideas') ?>"},
	"align":"wide",
	"layout":{"type":"grid","minimumColumnWidth":"16rem"}
} -->
<div class="wp-block-group alignwide">

	<?php foreach (range(1, 6) as $card) : ?>
		<!-- wp:pattern {"slug":"x3p0-ideas/card-profile-stack-social"} /-->
	<?php endforeach ?>

</div>
<!-- /wp:group -->
