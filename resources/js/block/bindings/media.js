/**
 * Defines the `x3p0/media` block binding source.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockBindingsSource } from '@wordpress/blocks';
import { __, sprintf } from '@wordpress/i18n';

// @todo Figure out a way to not have to recreate these labels in JS.
const metaPlaceholders = {
	album: {
		value: '...',
		label: __('Album:', 'x3p0-ideas')
	},
	aperture: {
		value: '<sup>f</sup>&#8260;<sub>1</sub>',
		label: __('Aperture:', 'x3p0-ideas')
	},
	artist: {
		value: '...',
		label: __('Artist:', 'x3p0-ideas')
	},
	camera: {
		value: 'Camera Name',
		label: __('Camera:', 'x3p0-ideas')
	},
	created_timestamp: {
		value: 'Month 00, 0000',
		label: __('Date:', 'x3p0-ideas')
	},
	dimensions: {
		value: '0 &#215; 0',
		label: __('Dimensions:', 'x3p0-ideas')
	},
	file_name: {
		value: '...',
		label: __('Name:', 'x3p0-ideas')
	},
	file_size: {
		value: '00 kb',
		label: __('Size:', 'x3p0-ideas')
	},
	focal_length: {
		value: '0 mm',
		label: __('Focal Length:', 'x3p0-ideas')
	},
	genre: {
		value: '...',
		label: __('Genre:', 'x3p0-ideas')
	},
	iso: {
		value: '00',
		label: __('ISO:', 'x3p0-ideas')
	},
	length_formatted: {
		value: '00',
		label: __('Run Time:', 'x3p0-ideas')
	},
	mime_type: {
		value: 'type/subtype',
		label: __('Mime Type:', 'x3p0-ideas')
	},
	shutter_speed: {
		value: '<sup>0</sup>&#8260;<sub>00</sub> sec',
		label: __('Shutter Speed:', 'x3p0-ideas')
	},
	track_number: {
		value: '0',
		label: __('Track:', 'x3p0-ideas')
	},
	year: {
		value: '0000',
		label: __('Year:', 'x3p0-ideas')
	}
};

const placeholders = {
	'alt':     __('Alternate Text', 'x3p0-ideas'),
	'caption': __('Media Caption...', 'x3p0-ideas'),
	'id':      '00',
	'src':     '#',
	'url':     '#',
	'title':   __('Media Title', 'x3p0-ideas')
};

const wrapper = (value, label) => {
	return sprintf(
		'<span class="media-data__label" style="font-weight:500">%s</span><span class="media-data__content has-xs-font-size has-mono-font-family">%s</span>',
		label,
		value
	);
}

registerBlockBindingsSource({
	name: 'x3p0/media',
	getValues({ bindings }) {
		const values = {};

		for (const [ attributeName, source ] of Object.entries(bindings)) {
			const bindingKey = source.args?.key || attributeName;

			if (bindingKey in metaPlaceholders) {
				values[attributeName] = wrapper(
					metaPlaceholders[bindingKey].value,
					metaPlaceholders[bindingKey].label
				);
			} else if (bindingKey in placeholders) {
				values[attributeName] = placeholders[bindingKey]
			} else {
				values[attributeName] = bindingKey;
			}
		}

		return values;
	}
});
