# Style Variations

## Rules

### Theme Variations

Theme variations should primarily be used for defining the layout of the design, preferring to avoid color and typographical styles when possible.

Theme variations should not define solely colors via the standard color properties:

- `border.color`
- `color.background`
- `color.gradient`
- `color.text`
- `outline.color`

These are wiped out when selecting a color variation, even when the color variation doesn't specifically override those properties. For the most part, theme variations should avoid defining color styles altogether, either leaving it to the default `theme.json` styles or a color variation.

For cases where you must define a color, it's to style this twice:

- Style the element/block color property itself as usual.
- And add the style to the `styles.css` property with the `@layer variation` wrapper.

Styling the property allows you to overwrite `theme.json`. The second style ensures that your color is used when a color variation is activated but lowers the specificity so that a color variation can also overwrite it via standard colors.

For example, the below adds a top border to the **Site Header** block style variation:

```json
{
	"styles": {
		"css": "@layer variation { .is-style-site-header { border-color: var(--wp--custom--color--border--accent); } }",
		"variations": {
			"site-header": {
				"css": "border-color: var(--wp--custom--color--border--accent);",
				"border": {
					"top": {
						"style": "solid",
						"width": "var(--wp--preset--spacing--10)"
					}
				}
			}
		}
	}
}
```

Yes, this is more work, but this method ensures that a color variation doesn't wipe out the color if it's not specifically defined. However, it also allows the color variation to override by defining its own cover via the standard `border.color` definition.
