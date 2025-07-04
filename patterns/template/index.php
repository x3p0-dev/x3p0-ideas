<?php

/**
 * Title: Index Template
 * Slug: x3p0-ideas/template-index
 * Inserter: no
 * Template Types: archive, author, category, date, home, front-page, tag, taxonomy
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:template-part {"slug":"header","className":"is-style-site-header"} /-->

<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group">
	<!-- wp:template-part {"slug":"loop","align":"full","className":"loop"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"is-style-site-footer"} /-->
