<?php

/**
 * Title: Image Download Cards
 * Slug: x3p0-ideas/grid-cards-image-download
 * Categories: x3p0-grid
 * Keywords: card, download, file, gallery, grid, image, media
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
		<!-- wp:pattern {"slug":"x3p0-ideas/card-image-download"} /-->
	<?php endforeach ?>

</div>
<!-- /wp:group -->
