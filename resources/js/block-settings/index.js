/**
 * Block settings filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import withGroupSettings from './core-group';

// WordPress dependencies.
import { addFilter } from '@wordpress/hooks';

// Filter block settings.
addFilter( 'blocks.registerBlockType', 'x3p0/ideas/block/group', withGroupSettings );
