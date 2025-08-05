<?php

/**
 * Title: Taxonomy Header: Cover (Full)
 * Slug: x3p0-ideas/taxonomy-header-cover-full
 * Inserter: no
 * Categories: x3p0-layout
 * Viewport Width: 1376
 * Block Types: core/template-part/taxonomy-header
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('Taxonomy Header Container', 'x3p0-ideas') ?>"},
	"align":"full",
	"className": "is-style-site-header",
	"style":{"spacing":{"blockGap":"0"}},
	"layout":{"type":"default"}
} -->
<div class="wp-block-group alignfull is-style-site-header">

	<!-- wp:cover {
		"metadata":{"name":"<?= esc_attr__('Taxonomy Header Content', 'x3p0-ideas') ?>"},
		"useFeaturedImage":true,
		"isUserOverlayColor":true,
		"minHeightUnit":"rem",
		"gradient":"45-deg-dark-transparent",
		"contentPosition":"bottom left",
		"style":{
			"spacing":{
				"padding":{
					"top":"var:preset|spacing|90",
					"bottom":"var:preset|spacing|90",
					"left":"var:preset|spacing|70",
					"right":"var:preset|spacing|70"
				}
			},
			"elements":{
				"link":{
					"color":{
						"text":"var:preset|color|white"
					}
				}
			}
		},
		"textColor":"white",
		"backgroundColor":"neutral-950",
		"layout":{"type":"constrained"}
	} -->
	<div class="wp-block-cover has-custom-content-position is-position-bottom-left has-white-color has-link-color has-text-color has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--70)">

		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-45-deg-dark-transparent-gradient-background"></span>
		<div class="wp-block-cover__inner-container">

			<!-- wp:spacer {"height":"var:preset|spacing|120"} -->
			<div style="height:var(--wp--preset--spacing--120)" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"},"dimensions":{"minHeight":""}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:query-title {
					"type":"archive",
					"showPrefix":false,
					"className":"is-style-text-headline"
				} /-->

				<!-- wp:term-description {"metadata":{
					"x3p0Rules":{"rules":[{"type": "unless", "callback":"is_paged"}]}
				}} /-->
			</div>
			<!-- /wp:group -->

		</div>

	</div>
	<!-- /wp:cover -->

</div>
<!-- /wp:group -->
