<?php
/**
 * Theme functions file, which is auto-loaded by WordPress. Use this file to
 * load additional PHP files and bootstrap the theme.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @link      https://justintadlock.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\Ideas;

# Register autoloader for classes.
require_once get_parent_theme_file_path( 'src/Autoload.php' );
Autoload::register();

# Load functions files.
require_once get_parent_theme_file_path( 'src/functions-helpers.php' );

# Bootstrap the theme.
theme();
