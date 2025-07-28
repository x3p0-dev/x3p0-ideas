<?php

/**
 * Title: Post Meta
 * Slug: x3p0-ideas/post-meta-default
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"footer",
	"metadata":{
		"name":"<?= esc_attr__('Post Footer', 'x3p0-ideas') ?>"
	},
	"style":{
		"spacing":{
			"blockGap":"0"
		}
	},
	"layout":{
		"type":"constrained"
	},
	"className":"is-style-meta"
} -->
<footer class="wp-block-group is-style-meta">
	<!-- wp:post-terms {"term":"category","className":"is-style-icon"} /-->
	<!-- wp:post-terms {"term":"post_tag","className":"is-style-icon"} /-->
</footer>
<!-- /wp:group -->
