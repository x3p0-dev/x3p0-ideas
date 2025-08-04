<?php

/**
 * Title: Index Content
 * Slug: x3p0-ideas/content-index
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"className":"is-style-site-content",
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group is-style-site-content">
	<!-- wp:template-part {"slug":"loop","align":"full"} /-->
</main>
<!-- /wp:group -->
