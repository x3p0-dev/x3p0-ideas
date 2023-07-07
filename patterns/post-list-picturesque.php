<?php
/**
 * Title: Post List: Picturesque
 * Slug: x3p0-ideas/post-list-picturesque
 * Description: Displays the queried posts in a list with the title, date, and excerpt.
 * Categories: posts
 * Keywords: query, posts
 * Block Types: core/query
 * Viewport Width: 1152
 */
?>
<!-- wp:query {"queryId":0,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dtheme-spacing\u002d\u002dplus-3)","bottom":"var(\u002d\u002dtheme-spacing\u002d\u002dplus-3)","left":"var:preset|spacing|plus-3","right":"var:preset|spacing|plus-3"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--theme-spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--theme-spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)"><!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|plus-4"}},"className":"is-style-flex-grow","layout":{"type":"default"}} -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:post-featured-image {"aspectRatio":"16/9","width":"","height":"","align":"wide","style":{"border":{"bottom":{"color":"var:preset|color|primary-contrast","width":"5px"}}}} /-->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|base"}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"tagName":"header","align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|minus-3"}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"sm"} -->
<div class="wp-block-group has-sm-font-size"><!-- wp:post-author-name {"isLink":true} /-->

<!-- wp:paragraph -->
<p>·</p>
<!-- /wp:paragraph -->

<!-- wp:post-date /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"isLink":true} /--></header>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"Continue reading →","showMoreOnNewLine":false,"excerptLength":35} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:group -->

<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query -->
