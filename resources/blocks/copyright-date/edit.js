// WordPress dependencies.
import { useBlockProps } from '@wordpress/block-editor';
import { __ }            from '@wordpress/i18n';

export default function Edit() {
	const currentYear = new Date().getFullYear().toString();

	return (
		<p { ...useBlockProps() }>© { currentYear }</p>
	);
}
