<?php

/**
 * Title: FAQs
 * Slug: x3p0-ideas/faqs-accordion
 * Description: Outputs an accordion of configurable FAQ items.
 * Categories: text
 * Keywords: faq, accordion, toggle, questions, answers
 * Viewport Width: 640
 * Block Types: core/accordion
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:accordion {"className":"is-style-accordion-minimal"} -->
<div role="group" class="wp-block-accordion is-style-accordion-minimal is-faqs">

	<?php foreach (range(1, 4) as $number): ?>

		<!-- wp:accordion-item -->
		<div class="wp-block-accordion-item">
			<!-- wp:accordion-heading -->
			<h3 class="wp-block-accordion-heading"><button class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title"><?= esc_html( sprintf( __( 'Question %d', 'themeslug' ), $number ) ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
			<!-- /wp:accordion-heading -->

			<!-- wp:accordion-panel -->
			<div role="region" class="wp-block-accordion-panel">
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Answer goes here.', 'themeslug' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:accordion-panel -->
		</div>
		<!-- /wp:accordion-item -->

	<?php endforeach; ?>

</div>
<!-- /wp:accordion -->
