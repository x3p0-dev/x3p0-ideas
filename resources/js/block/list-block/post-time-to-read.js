/**
 * Block list block filter for `core/post-time-to-read` block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import {createHigherOrderComponent} from "@wordpress/compose";

/*
 * Adds a `display-mode-{type}` class to the `core/post-time-to-read` block in
 * the editor so that it can be styled based on the mode.
 */
const postTimeToRead = createHigherOrderComponent((BlockListBlock) => {
	return (props) => {
		if ('core/post-time-to-read' !== props.name) {
			return <BlockListBlock {...props} />;
		}

		const { displayMode } = props.attributes;

		// Build custom class based on displayMode attribute
		const customClasses = [props.className];

		if (displayMode) {
			customClasses.push(`display-mode-${displayMode}`);
		}

		const customClass = customClasses.filter(Boolean).join(' ');

		return <BlockListBlock {...props} className={customClass} />;
	};
}, 'postTimeToRead');

export default postTimeToRead;
