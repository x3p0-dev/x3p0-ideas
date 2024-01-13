/**
 * Block editor filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { addFilter } from '@wordpress/hooks';

/**
 * Returns the theme's default featured image size so that it's rendered in the
 * featured image component in the sidebar panel.
 *
 * @returns {string}
 */
const withImageSize = () => 'x3p0-16x9-lg';

addFilter(
	'editor.PostFeaturedImage.imageSize',
	'x3p0/ideas/featured-image-size',
	withImageSize
);
