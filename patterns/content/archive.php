<?php

/**
 * Title: Archive Content
 * Slug: x3p0-ideas/content-archive
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"style":{"spacing":{"blockGap":"0"}},
	"className":"is-style-site-content",
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group is-style-site-content">

	<!-- wp:template-part {"slug":"archive-header","align":"full","className":"is-style-archive-header"} /-->
	<!-- wp:template-part {"slug":"loop","align":"full"} /-->

</main>
<!-- /wp:group -->
