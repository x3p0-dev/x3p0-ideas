/**
 * Registers block edit filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import withGradientBackground from './gradient-background';
import withListMarker         from './list-marker';

// WordPress dependencies.
import { addFilter } from '@wordpress/hooks';
import {createHigherOrderComponent} from "@wordpress/compose";

// Add filters.
addFilter('editor.BlockEdit', 'x3p0-ideas-gradient-background', withGradientBackground);
addFilter('editor.BlockEdit', 'x3p0-ideas-list-marker',         withListMarker);

// Adds a custom class to the `core/post-time-to-read` block in the editor so
// that we can style it base on the display mode.
const postTimeToReadClass = createHigherOrderComponent((BlockListBlock) => {
	return (props) => {
		const { name, attributes } = props;

		// Only apply to core/post-time-to-read block
		if ('core/post-time-to-read' !== name) {
			return <BlockListBlock {...props} />;
		}

		const { displayMode } = attributes;

		// Build custom class based on displayMode attribute
		const customClasses = [props.className];

		if (displayMode) {
			customClasses.push(`display-mode-${displayMode}`);
		}

		const customClass = customClasses.filter(Boolean).join(' ');

		return <BlockListBlock {...props} className={customClass} />;
	};
}, 'postTimeToReadClass');

addFilter(
	'editor.BlockListBlock',
	'my-plugin/add-custom-class-to-editor',
	postTimeToReadClass
);
