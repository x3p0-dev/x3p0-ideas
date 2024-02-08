<?php

/**
 * Title: FAQs
 * Slug: x3p0-ideas/section-faqs
 * Description: Outputs a list of configurable FAQ items.
 * Categories: text, x3p0-section
 * Keywords: faq, accordion, toggle, questions, answers
 * Viewport Width: 640
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:group {
	"tagName":"section",
	"metadata":{"name":"<?= esc_attr__('Section', 'x3p0-ideas') ?>"},
	"align":"full",
	"className":"is-style-section",
	"layout":{"type":"constrained"}
} -->
<section class="wp-block-group alignfull is-style-section">

	<!-- wp:pattern {"slug":"x3p0-ideas/section-header"} /-->

	<?php foreach (range(1, 4) as $number) : ?>
		<!-- wp:details -->
		<details class="wp-block-details">
			<summary>
				<?= esc_html(sprintf(
					// Translators: %d is the current question.
					_n('Question %d?', 'Question %d?', $number, 'x3p0-ideas'),
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

</section>
<!-- /wp:group -->
