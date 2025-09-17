<?php

/**
 * Bootstraps dev features.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Dev;

use X3P0\Ideas\App;

# Prevent direct execution.
if (! defined('ABSPATH')) {
	return;
}

# Add dev mode components to the container.
add_action('x3p0/ideas/init', function (App $app) {
	if (! wp_is_development_mode('theme')) {
		return;
	}

	$app->instance('dev.setup', new Setup());
	$app->instance('dev.editor', new Editor());
	$app->instance('dev.style.variations', new StyleVariations(new Config()));
});
