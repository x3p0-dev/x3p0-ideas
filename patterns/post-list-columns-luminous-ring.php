<?php
/**
 * Title: Post List: Columns - Luminous Ring
 * Slug: x3p0-ideas/post-list-columns-luminous-ring
 * Description: Displays the queried posts in a list. Each post is wrapped in a full-height and width Cover block with a featured image background.
 * Categories: theme, query
 * Keywords: query, cover, posts
 * Block Types: core/query
 * Viewport Width: 1376
 */
?>
<!-- wp:query {"queryId":0,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"list","columns":3},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignfull">

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|plus-3","left":"var:preset|spacing|plus-3","top":"var:preset|spacing|plus-3"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--plus-3);padding-right:var(--wp--preset--spacing--plus-3);padding-left:var(--wp--preset--spacing--plus-3)">

		<!-- wp:post-template {"align":"full"} -->

			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">

				<!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|plus-4","left":"var:preset|spacing|plus-4"}}}} -->
				<div class="wp-block-columns alignwide are-vertically-aligned-top">

					<!-- wp:column {"verticalAlignment":"top","width":"8rem","textColor":"primary-600","layout":{"type":"constrained"}} -->
					<div class="wp-block-column is-vertically-aligned-top has-primary-600-color has-text-color" style="flex-basis:8rem">
						<!-- wp:post-featured-image {"aspectRatio":"1","style":{"border":{"radius":"100%"}},"className":"is-style-outline-luminous-dusk"} /-->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"top","width":"","layout":{"type":"default"}} -->
					<div class="wp-block-column is-vertically-aligned-top">

						<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group">
							<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"var:preset|spacing|minus-2"}}},"fontSize":"2-xl"} /-->

							<!-- wp:columns {"style":{"border":{"top":{"color":"var:preset|color|contrast","style":"solid","width":"1px"},"right":{},"bottom":{},"left":{}},"spacing":{"blockGap":{"top":"var:preset|spacing|base","left":"var:preset|spacing|base"}}}} -->
							<div class="wp-block-columns" style="border-top-color:var(--wp--preset--color--contrast);border-top-style:solid;border-top-width:1px">

								<!-- wp:column {"backgroundColor":"white"} -->
								<div class="wp-block-column has-white-background-color has-background">

									<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
									<div class="wp-block-group">
										<!-- wp:post-excerpt {"moreText":"Continue reading →","showMoreOnNewLine":false,"excerptLength":18,"style":{"spacing":{"margin":{"top":"var:preset|spacing|minus-2"}}},"fontSize":"xl"} /-->
									</div>
									<!-- /wp:group -->

								</div>
								<!-- /wp:column -->

								<!-- wp:column {"width":"7rem","backgroundColor":"white"} -->
								<div class="wp-block-column has-white-background-color has-background" style="flex-basis:7rem">
									<!-- wp:post-date {"textAlign":"center","format":"M j","style":{"spacing":{"padding":{"top":"var:preset|spacing|minus-3","right":"var:preset|spacing|minus-3","bottom":"var:preset|spacing|minus-3","left":"var:preset|spacing|minus-3"}}},"backgroundColor":"contrast","textColor":"base","fontSize":"md"} /-->
								</div>
								<!-- /wp:column -->

							</div>
							<!-- /wp:columns -->

						</div>
						<!-- /wp:group -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

			</div>
			<!-- /wp:group -->

			<!-- wp:spacer {"height":"var:preset|spacing|plus-3"} -->
				<div style="height:var(--wp--preset--spacing--plus-3)" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

		<!-- /wp:post-template -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query-pagination {"layout":{"type":"flex","verticalAlignment":"center","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->
