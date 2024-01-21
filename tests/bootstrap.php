<?php

/**
 * Bootstraps tests.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas\Tests;

# Prevent direct execution.
if (! defined('ABSPATH')) {
	exit;
}

# Bootstrap the tests.
add_action('after_setup_theme', __NAMESPACE__ . '\\bootstrap', PHP_INT_MIN);
