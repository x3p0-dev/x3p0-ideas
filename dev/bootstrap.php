<?php

/**
 * Bootstraps dev features.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Dev;

use X3P0\Ideas\Theme;

# Prevent direct execution.
if (! defined('ABSPATH')) {
	return;
}

# Bootstrap dev.
add_action('x3p0.ideas.init', function (Theme $theme) {
	if (! wp_is_development_mode('theme')) {
		return;
	}

	$config = new Config();

	$theme->instance('dev.setup', new Setup());
	$theme->instance('dev.editor', new Editor());

	$theme->instance('dev.style.variations', new StyleVariations(
		(string) $config->get('theme'),
		(string) $config->get('color'),
		(string) $config->get('typography')
	));
});
