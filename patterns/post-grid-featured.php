<?php
/**
 * Title: Post Grid: Featured
 * Slug: x3p0-ideas/post-grid-featured
 * Description: Displays the queried posts in a four-column grid with the first post spanning all columns.
 * Categories: posts
 * Keywords: query, cover, grid, posts
 * Block Types: core/query
 * Viewport Width: 1376
 */
$columns = get_option( 'posts_per_page' ) % 4 === 1 ? 4 : 3;
?>
<!-- wp:query {"queryId":0,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"full","className":"post-grid-featured","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignfull post-grid-featured"><!-- wp:group {"align":"full","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dtheme-spacing\u002d\u002dplus-3)","bottom":"var(\u002d\u002dtheme-spacing\u002d\u002dplus-3)","left":"var:preset|spacing|plus-3","right":"var:preset|spacing|plus-3"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--theme-spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--theme-spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)"><!-- wp:post-template {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|px"}},"className":"is-style-featured-col-span-all","layout":{"type":"grid","columnCount":<?= $columns ?>}} -->
<!-- wp:group {"tagName":"article","layout":{"type":"default"}} -->
<article class="wp-block-group"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"minHeight":32,"minHeightUnit":"rem","contentPosition":"center center","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|plus-3","right":"var:preset|spacing|plus-3","bottom":"var:preset|spacing|plus-3","left":"var:preset|spacing|plus-3"}}},"className":"is-style-stretch","layout":{"type":"default"}} -->
<div class="wp-block-cover alignfull is-light is-style-stretch" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3);min-height:32rem"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","className":"is-style-button"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:post-date {"format":"d","style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"fontSize":"3-xl"} /-->

<!-- wp:post-date {"format":"M","style":{"typography":{"textTransform":"uppercase"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"header","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<header class="wp-block-group"><!-- wp:post-title {"isLink":true} /--></header>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></article>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query -->
