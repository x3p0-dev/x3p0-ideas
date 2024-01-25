<?php

/**
 * Title: FAQs
 * Slug: x3p0-ideas/faqs
 * Description: Outputs a list of configurable FAQ items.
 * Categories: text
 * Keywords: faq, accordion, toggle, questions, answers
 * Viewport Width: 640
 */

declare(strict_types=1);

?>
<!-- wp:group {
	"metadata":{"name":"<?= esc_attr__('FAQs Container', 'x3p0-ideas') ?>"},
	"layout":{"type":"constrained"}
} -->
<div class="wp-block-group">

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?= esc_html__('FAQs', 'x3p0-ideas') ?></h2>
	<!-- /wp:heading -->

	<?php foreach (range(1, 4) as $number) : ?>
		<!-- wp:details -->
		<details class="wp-block-details">
			<summary>
				<?= esc_html(sprintf(
					// Translators: %d is the current question.
					_n('Question %d?', 'Question %d', $number, 'x3p0-ideas'),
					absint($number)
				)) ?>
			</summary>
			<!-- wp:paragraph {
				"placeholder":"<?= esc_attr__('Add an answer to the question.', 'x3p0-ideas') ?>"
			} -->
			<p></p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->
	<?php endforeach ?>

</div>
<!-- /wp:group -->
