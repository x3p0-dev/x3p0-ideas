<?php
/**
 * Title: Post Grid: Default
 * Slug: x3p0-ideas/post-grid-default
 * Description: Displays an elegant grid of posts.
 * Categories: query
 * Keywords: query, loop, grid, posts
 * Block Types: core/query
 * Viewport Width: 1376
 */
?>
<!-- wp:query {"queryId":0,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)"><!-- wp:post-template {"className":"is-style-flex-grow","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"tagName":"article","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
<article class="wp-block-group"><!-- wp:post-featured-image {"aspectRatio":"16/9","style":{"border":{"bottom":{"color":"var:preset|color|primary-contrast","width":"5px"},"top":{},"right":{},"left":{}}}} /-->

<!-- wp:group {"tagName":"header","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group"><!-- wp:post-terms {"term":"category","fontSize":"md"} /-->

<!-- wp:post-title {"isLink":true} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"md"} -->
<div class="wp-block-group has-md-font-size"><!-- wp:post-date /--></div>
<!-- /wp:group --></header>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"Continue reading →","showMoreOnNewLine":false,"excerptLength":20,"fontSize":"xl"} /-->

<!-- wp:spacer {"height":"0"} -->
<div style="height:0" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></article>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:group -->

<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query -->
