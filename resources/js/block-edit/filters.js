/**
 * Exports block edit filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import withColorVariation     from './color-variations';
import withGradientBackground from './gradient-background';
import withListMarker         from './list-markers';
import withScreenReaderText   from './screen-reader-text';
import withSeparatorIcons     from './separator-icons';
import withTextShadow         from './text-shadow';

/**
 * @description An object containing of all the `editor.BlockEdit` filters. The
 * keys are the slugs for the filter namespaces, and the values are the callbacks.
 * @type {Object.<string, function>}
 */
export default {
	'color-variations':     withColorVariation,
	'gradient-background':  withGradientBackground,
	'list-markers':         withListMarker,
	'separator-icons':      withSeparatorIcons,
	'text-shadow':          withTextShadow,
	// Add after text-shadow, at least until we have positioning/priority.
	'screen-reader-text':   withScreenReaderText
};
