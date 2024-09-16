<?php

/**
 * Title: Post Author Card
 * Slug: x3p0-ideas/card-post-author
 * Description:
 * Categories: x3p0-card
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Post Author', 'x3p0-ideas') ?>"},
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|base"
		}
	},
	"className":"has-global-border is-style-section-1",
	"layout":{"type":"default"}
} -->
<div class="wp-block-group has-global-border is-style-section-1">

	<!-- wp:group {
		"layout":{
			"type":"flex",
			"flexWrap":"nowrap"
		}
	} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":3,"fontSize":"lg"} -->
		<h3 class="wp-block-heading has-lg-font-size"><?= esc_html__('About the Author', 'x3p0-ideas') ?></h3>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {
		"style":{"spacing":{"blockGap":"var:preset|spacing|base"}},
		"layout":{
			"type":"flex",
			"flexWrap":"nowrap",
			"verticalAlignment":"top"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:avatar {"size":64,"isLink":true} /-->

		<!-- wp:group {
			"style":{"spacing":{"blockGap":"0"}},
			"layout":{"type":"default"}
		} -->
		<div class="wp-block-group">
			<!-- wp:post-author-name {"isLink":true } /-->
			<!-- wp:post-author-biography {"fontSize":"sm"} /-->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
