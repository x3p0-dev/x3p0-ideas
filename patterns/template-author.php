<?php

/**
 * Title: Author Template
 * Slug: x3p0-ideas/template-author
 * Inserter: no
 * Template Types: author
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:template-part {"slug":"header","className":"site-header"} /-->

<!-- wp:group {
	"tagName":"main",
	"metadata":{"name":"<?= esc_attr__('Content', 'x3p0-ideas') ?>"},
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"constrained"}
} -->
<main class="wp-block-group">

	<!-- wp:group {
		"metadata":{"name":"<?= esc_attr__('Archive Header', 'x3p0-ideas') ?>"},
		"align":"full",
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|base"
			}
		},
		"layout":{"type":"constrained"},
		"className":"is-style-archive-header"
	} -->
	<div class="wp-block-group alignfull is-style-archive-header">

		<!-- wp:group {
			"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
			"layout":{"type":"flex","flexWrap":"nowrap"}
		} -->
		<div class="wp-block-group">
			<!-- wp:avatar {"size":64} /-->
			<!-- wp:query-title {"type":"archive","showPrefix":false} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-author-biography /-->

	</div>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"loop","align":"full","className":"loop"} /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","className":"site-footer"} /-->
