<?php

/**
 * Title: Archive Template
 * Slug: x3p0-ideas/template-archive
 * Inserter: no
 * Template Types: archive, author, category, date, tag, taxonomy
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
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group">

	<!-- wp:template-part {"slug":"archive-header","align":"full","className":"is-style-archive-header"} /-->
	<!-- wp:template-part {"slug":"loop","align":"full"} /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"is-style-site-footer"} /-->
