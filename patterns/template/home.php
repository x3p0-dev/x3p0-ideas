<?php

/**
 * Title: Home Template
 * Slug: x3p0-ideas/template-home
 * Inserter: no
 * Template Types: home, front-page
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:template-part {"slug":"header","className":"is-style-site-header"} /-->

<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"style":{"spacing":{"blockGap":"0"}},
	"className":"site-content",
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group site-content">
	<!-- wp:pattern {
		"metadata":{"@unless":"is_paged"},
		"slug":"x3p0-ideas/hero-featured"
	} /-->
	<!-- wp:template-part {"slug":"loop","align":"full"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"is-style-site-footer"} /-->
