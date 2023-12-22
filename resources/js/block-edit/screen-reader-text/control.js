/**
 * Screen reader text component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import {
	isScreenReaderText,
	updateScreenReaderClass
} from './utils';

// WordPress dependencies.
import { __ }            from '@wordpress/i18n';
import { ToggleControl } from '@wordpress/components';
import { useMemo }       from '@wordpress/element';

/**
 * @description Creates a screen reader text selector control.
 * @example
 * <GradientControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
export default ( { attributes: { className }, setAttributes } ) => {
	// Get whether text is visible and only update it when `className` changes.
	const screenReaderText = useMemo(
		() => isScreenReaderText( className ),
		[ className ]
	);

	return  (
		<div className="x3p0-screen-reader-text">
			<ToggleControl
				checked={ screenReaderText }
				label={ __( 'Visibility', 'x3p0-ideas' ) }
				help={
					screenReaderText
					? __( 'Block is hidden on the front end but readable for screen readers.', 'x3p0-ideas' )
					: __( 'Block is visible on the front end.', 'x3p0-ideas' )
				}
				onChange={ () => setAttributes( {
					className: updateScreenReaderClass(
						className,
						screenReaderText ? '' : 'has-screen-reader-text',
						screenReaderText ? 'has-screen-reader-text' : ''
					)
				} ) }
			/>
		</div>
	);
};
