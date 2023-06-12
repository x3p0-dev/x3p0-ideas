<?php
/**
 * Title: Post Grid: Table of Contents: Boxed
 * Slug: x3p0-ideas/table-of-contents-boxed
 * Description: Displays a post's table of contents within a Group block with a Heading.
 * Categories: theme
 * Keywords: table, contents, list
 * Block Types: core/table-of-contents
 * Viewport Width: 640
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"}}},"className":"has-color-var-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-color-var-light" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">

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
