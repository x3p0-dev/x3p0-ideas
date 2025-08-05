<?php

/**
 * Title: Header: Default
 * Slug: x3p0-ideas/header-default
 * Description:
 * Categories: header
 * Keywords: header
 * Block Types: core/template-part/header
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Site Header', 'x3p0-ideas') ?>"},
	"align":"full",
	"className": "is-style-site-header",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group alignfull is-style-site-header">
	<!-- wp:pattern {"slug":"x3p0-ideas/header-content"} /-->
	<!-- wp:pattern {"slug":"x3p0-ideas/breadcrumbs"} /-->
</div>
<!-- /wp:group -->
