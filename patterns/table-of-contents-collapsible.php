<?php

/**
 * Title: Table of Contents - Collapsible
 * Slug: x3p0-ideas/table-of-contents-collapsible
 * Description: Displays a post's table of contents within a Details block so that it can be opened and closed.
 * Categories: text
 * Keywords: table, contents, list
 * Block Types: core/table-of-contents
 * Viewport Width: 640
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>

<!-- wp:details -->
<details class="wp-block-details">
	<summary><?= esc_html__('Table of Contents', 'x3p0-ideas') ?></summary>
	<!-- wp:table-of-contents {"className":"is-style-list-pull"} /-->
</details>
<!-- /wp:details -->
