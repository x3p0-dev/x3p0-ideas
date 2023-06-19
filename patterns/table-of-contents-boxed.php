<?php
/**
 * Title: Table of Contents: Boxed
 * Slug: x3p0-ideas/table-of-contents-boxed
 * Description: Displays a post's table of contents within a Group block with a Heading.
 * Categories: theme
 * Keywords: table, contents, list
 * Block Types: core/table-of-contents
 * Viewport Width: 640
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|base","padding":{"top":"var:preset|spacing|plus-3","right":"var:preset|spacing|plus-3","bottom":"var:preset|spacing|plus-3","left":"var:preset|spacing|plus-3"}}},"className":"has-color-var-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-color-var-neutral" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:paragraph {"fontFamily":"primary"} -->
	<p class="has-primary-font-family"><strong>Table of Contents</strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:table-of-contents {"headings":[{"content":"Example","level":2,"link":"#example"}]} -->
	<nav class="wp-block-table-of-contents">
		<ol>
			<li><a class="wp-block-table-of-contents__entry" href="#example">Example</a></li>
		</ol>
	</nav>
	<!-- /wp:table-of-contents -->

</div>
<!-- /wp:group -->
