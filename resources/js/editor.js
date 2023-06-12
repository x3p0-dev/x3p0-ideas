// WordPress dependencies.
import { addFilter } from '@wordpress/hooks';

// RichText formats.
import './rich-text';

// Block style variations.
import './block-styles';

// Block filters.
import { withColorVariation }     from './color-variations';
import { withGradientBackground } from './gradient-background';
import { withListMarker }         from './list-markers';
import { withTextShadow }         from './text-shadow';

addFilter( 'editor.BlockEdit', 'x3p0/text-shadow',      withTextShadow         );
addFilter( 'editor.BlockEdit', 'x3p0/gradient-control', withGradientBackground );
addFilter( 'editor.BlockEdit', 'x3p0/color-variation',  withColorVariation     );
addFilter( 'editor.BlockEdit', 'x3p0/list-marker',      withListMarker         );
