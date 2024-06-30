<?php

/**
 * Title: Post Byline
 * Slug: x3p0-ideas/post-byline
 * Inserter: no
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{
		"name":"<?= esc_attr('Post Byline', 'x3p0-ideas') ?>"
	},
	"style":{
		"spacing":{
			"blockGap":"var:preset|spacing|base"
		}
	},
	"layout":{
		"type":"flex",
		"flexWrap":"wrap"
	},
	"className": "is-style-meta"
} -->
<div class="wp-block-group is-style-meta">

	<!-- wp:group {
		"metadata":{
			"name":"<?= esc_attr('Post Author', 'x3p0-ideas') ?>"
		},
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|minus-3"
			}
		},
		"layout":{
			"type":"flex",
			"flexWrap":"nowrap"
		}
	} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {
			"metadata":{
				"name":"<?= esc_attr('Prefix', 'x3p0-ideas') ?>"
			}
		} -->
		<p><?= esc_html__('By', 'x3p0-ideas') ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:post-author-name {"isLink":true} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {
		"metadata":{
			"name":"<?= esc_attr('Separator', 'x3p0-ideas') ?>"
		}
	} -->
	<p><?=
		// Translators: Metadata separator.
		esc_html__('&middot;', 'x3p0-ideas')
	?></p>
	<!-- /wp:paragraph -->

	<!-- wp:post-date /-->

</div>
<!-- /wp:group -->
