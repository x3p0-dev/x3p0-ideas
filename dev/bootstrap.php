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

use X3P0\Ideas\Framework\Core\Application;

# Prevent direct execution.
if (! defined('ABSPATH')) {
	return;
}

# Add dev mode components to the container.
add_action('x3p0/ideas/register', function (Application $app) {
	if (! wp_is_development_mode('theme')) {
		return;
	}

	$app->container()->singleton(Config::class);
	$app->container()->singleton(Editor::class);
	$app->container()->singleton(Setup::class);
	$app->container()->singleton(StyleVariations::class);
});

# Bootstrap dev mode components.
add_action('x3p0/ideas/booted', function (Application $app) {
	if (! wp_is_development_mode('theme')) {
		return;
	}

	$app->container()->get(Editor::class)->boot();
	$app->container()->get(Setup::class)->boot();
	$app->container()->get(StyleVariations::class)->boot();
});
