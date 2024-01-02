<?php
/**
 * Title: Comments: Default
 * Slug: x3p0-ideas/comments-default
 * Description:
 * Keywords: comments, discussion
 * Block Types: core/comments
 * Viewport Width: 1376
 */
?>
<!-- wp:comments {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|plus-3"}}}} -->
<section class="wp-block-comments" style="padding-top:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Comments Container', 'x3p0-ideas' ) ?>"},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">

		<!-- wp:comments-title {"showPostTitle":false} /-->

		<!-- wp:comment-template {"style":{"spacing":{"margin":{"top":"var:preset|spacing|minus-2"}}}} -->

			<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Comment Container', 'x3p0-ideas' ) ?>"},"tagName":"article","layout":{"type":"default"}} -->
			<article class="wp-block-group">

				<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Comment Header', 'x3p0-ideas' ) ?>"},"tagName":"header","style":{"spacing":{"blockGap":"var:preset|spacing|base"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"sm"} -->
				<header class="wp-block-group has-sm-font-size">
					<!-- wp:avatar {"size":56,"style":{"layout":{"selfStretch":"fit","flexSize":null}}} /-->

					<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Comment Meta', 'x3p0-ideas' ) ?>"},"layout":{"type":"default"}} -->
					<div class="wp-block-group">
						<!-- wp:comment-author-name /-->

						<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"var:preset|spacing|base"}},"layout":{"type":"flex"}} -->
						<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px">
							<!-- wp:comment-date /-->
							<!-- wp:comment-edit-link /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</header>
				<!-- /wp:group -->

				<!-- wp:comment-content /-->

				<!-- wp:group {"metadata":{"name":"<?= esc_attr__( 'Comment Footer', 'x3p0-ideas' ) ?>"},"tagName":"footer","style":{"spacing":{"blockGap":"var:preset|spacing|minus-2"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"},"fontSize":"sm"} -->
				<footer class="wp-block-group has-sm-font-size">
					<!-- wp:comment-reply-link /-->
				</footer>
				<!-- /wp:group -->

			</article>
			<!-- /wp:group -->

		<!-- /wp:comment-template -->

		<!-- wp:comments-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:comments-pagination-previous /-->
			<!-- wp:comments-pagination-numbers /-->
			<!-- wp:comments-pagination-next /-->
		<!-- /wp:comments-pagination -->

		<!-- wp:post-comments-form {"className":"is-style-icons"} /-->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:comments -->
