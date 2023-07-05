# Separator Icon Picker

Creates a custom icon picker for the Separator block.

## Adding Custom Icons

**JavaScript:**

```js
@import { addFilter } from '@wordpress/hooks';

addFilter(
	'x3p0.ideas.blockEdit.separatorIcons',
	'your-namespace/filter-name',
	( icons ) => {
		icons.add( { value: '🧻', gradient: 'pale-ocean' } );
		return icons;
	}
);
```

**CSS:**

```css
.wp-block-separator.has-icon-🧻 { --hr-icon: "🧻"; }
```
