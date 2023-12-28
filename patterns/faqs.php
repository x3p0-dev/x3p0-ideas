<?php
/**
 * Title: FAQs
 * Slug: x3p0-ideas/faqs
 * Description: Outputs a list of configurable FAQ items.
 * Categories: text
 * Keywords: faq, accordion, toggle, questions, answers
 * Viewport Width: 640
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

	<?php foreach ( range( 1, 4 ) as $number ) : ?>
		<!-- wp:details -->
		<details class="wp-block-details">
			<summary>
				<?php printf( __( 'Question %d?', 'x3p0-ideas'), $number ) ?>
			</summary>
			<!-- wp:paragraph {
				"placeholder":"<?php esc_attr_e( 'Add an answer to the question.', 'x3p0-ideas' ) ?>"
			} -->
			<p></p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->
	<?php endforeach ?>

</div>
<!-- /wp:group -->
