# Color Scheme

The theme uses a very specific naming convention for the colors in its palette. This way, it is easy to override via style variations and child themes, allowing the colors to trickle down automatically to blocks, elements, etc. This creates less work when building variations/children while still allowing style overrides on an as-needed basis. It also makes it much easier to create section styles and handle light/dark mode.

Colors in the theme follow a three-layer design token system:

- Primitive
- Semantic
- Component (e.g., Block, Element)

## Primitive Colors (Palette)

The color palette defined in `theme.json` and any `styles/color/*.json` file all follow the same color system, defining the primitive colors. The primitives should not be used to assign colors via the `styles` property or custom CSS (except in some rare exceptions).

### Primitive Color Names

The color palette consists of three primary color sets, which are the prefixes for the actual color slugs:

- `primary`
- `secondary`
- `neutral`

Each color set consists of 11 variations of a single base color, ranging from the lightest (`*-50`) to the darkest (`*-950`). Here is what the `primary` color set should be named as:

- `primary-50`
- `primary-100`
- `primary-200`
- `primary-300`
- `primary-400`
- `primary-500`
- `primary-600`
- `primary-700`
- `primary-800`
- `primary-900`
- `primary-950`

The theme also accounts for and supports the default `black` and `white` colors, which are generally grouped with the `neutral` color set.

### Defining Primitive Colors in `theme.json`

```json
{
	"$schema": "https://raw.githubusercontent.com/WordPress/gutenberg/wp/trunk/schemas/json/theme.json",
	"version": 3,
	"settings": {
		"palette": [
			{
				"slug": "primary-950",
				"color": "#1a3151",
				"name": "Primary: 950"
			},
			{
				"slug": "primary-900",
				"color": "#244e84",
				"name": "Primary: 900"
			},
			{
				"slug": "primary-800",
				"color": "#265ba7",
				"name": "Primary: 800"
			},
			{
				"slug": "primary-700",
				"color": "#2770ce",
				"name": "Primary: 700"
			},
			{
				"slug": "primary-600",
				"color": "#3086e0",
				"name": "Primary: 600"
			},
			{
				"slug": "primary-500",
				"color": "#45a1ec",
				"name": "Primary: 500"
			},
			{
				"slug": "primary-400",
				"color": "#68bef2",
				"name": "Primary: 400"
			},
			{
				"slug": "primary-300",
				"color": "#99d5f7",
				"name": "Primary: 300"
			},
			{
				"slug": "primary-200",
				"color": "#c2e5fb",
				"name": "Primary: 200"
			},
			{
				"slug": "primary-100",
				"color": "#ddeffc",
				"name": "Primary: 100"
			},
			{
				"slug": "primary-50",
				"color": "#f0f8fe",
				"name": "Primary: 50"
			},
			{
				"slug": "secondary-950",
				"color": "#43006c",
				"name": "Secondary: 950"
			},
			{
				"slug": "secondary-900",
				"color": "#611390",
				"name": "Secondary: 900"
			},
			{
				"slug": "secondary-800",
				"color": "#7615b4",
				"name": "Secondary: 800"
			},
			{
				"slug": "secondary-700",
				"color": "#8c13dd",
				"name": "Secondary: 700"
			},
			{
				"slug": "secondary-600",
				"color": "#a223fa",
				"name": "Secondary: 600"
			},
			{
				"slug": "secondary-500",
				"color": "#b447ff",
				"name": "Secondary: 500"
			},
			{
				"slug": "secondary-400",
				"color": "#c97aff",
				"name": "Secondary: 400"
			},
			{
				"slug": "secondary-300",
				"color": "#ddaeff",
				"name": "Secondary: 300"
			},
			{
				"slug": "secondary-200",
				"color": "#ecd1ff",
				"name": "Secondary: 200"
			},
			{
				"slug": "secondary-100",
				"color": "#f5e6ff",
				"name": "Secondary: 100"
			},
			{
				"slug": "secondary-50",
				"color": "#fbf4ff",
				"name": "Secondary: 50"
			},
			{
				"slug": "black",
				"color": "#000000",
				"name": "Black"
			},
			{
				"slug": "neutral-950",
				"color": "#22272f",
				"name": "Neutral: 950"
			},
			{
				"slug": "neutral-900",
				"color": "#343b46",
				"name": "Neutral: 900"
			},
			{
				"slug": "neutral-800",
				"color": "#3d4856",
				"name": "Neutral: 800"
			},
			{
				"slug": "neutral-700",
				"color": "#435061",
				"name": "Neutral: 700"
			},
			{
				"slug": "neutral-600",
				"color": "#526277",
				"name": "Neutral: 600"
			},
			{
				"slug": "neutral-500",
				"color": "#677a90",
				"name": "Neutral: 500"
			},
			{
				"slug": "neutral-400",
				"color": "#8697aa",
				"name": "Neutral: 400"
			},
			{
				"slug": "neutral-300",
				"color": "#b1bcc8",
				"name": "Neutral: 300"
			},
			{
				"slug": "neutral-200",
				"color": "#d5dae2",
				"name": "Neutral: 200"
			},
			{
				"slug": "neutral-100",
				"color": "#eceff2",
				"name": "Neutral: 100"
			},
			{
				"slug": "neutral-50",
				"color": "#f6f7f9",
				"name": "Neutral: 50"
			},
			{
				"slug": "white",
				"color": "#ffffff",
				"name": "White"
			}
		]
	}
}
```

### CSS Custom Properties

WordPress will automatically generate the CSS custom properties for each of the colors with the `--wp--preset--color--` prefix. Here is what the primitive colors look like:

```css
:root {
	/* Primary primitive colors. */
	--wp--preset--color--primary-950: #1a3151;
	--wp--preset--color--primary-900: #244e84;
	--wp--preset--color--primary-800: #265ba7;
	--wp--preset--color--primary-700: #2770ce;
	--wp--preset--color--primary-600: #3086e0;
	--wp--preset--color--primary-500: #45a1ec;
	--wp--preset--color--primary-400: #68bef2;
	--wp--preset--color--primary-300: #99d5f7;
	--wp--preset--color--primary-200: #c2e5fb;
	--wp--preset--color--primary-100: #ddeffc;
	--wp--preset--color--primary-50: #f0f8fe;

	/* Secondary primitive colors. */
	--wp--preset--color--secondary-950: #43006c;
	--wp--preset--color--secondary-900: #611390;
	--wp--preset--color--secondary-800: #7615b4;
	--wp--preset--color--secondary-700: #8c13dd;
	--wp--preset--color--secondary-600: #a223fa;
	--wp--preset--color--secondary-500: #b447ff;
	--wp--preset--color--secondary-400: #c97aff;
	--wp--preset--color--secondary-300: #ddaeff;
	--wp--preset--color--secondary-200: #ecd1ff;
	--wp--preset--color--secondary-100: #f5e6ff;
	--wp--preset--color--secondary-50: #fbf4ff;

	/* Neutral primitive colors. */
	--wp--preset--color--neutral-950: #22272f;
	--wp--preset--color--neutral-900: #343b46;
	--wp--preset--color--neutral-800: #3d4856;
	--wp--preset--color--neutral-700: #435061;
	--wp--preset--color--neutral-600: #526277;
	--wp--preset--color--neutral-500: #677a90;
	--wp--preset--color--neutral-400: #8697aa;
	--wp--preset--color--neutral-300: #b1bcc8;
	--wp--preset--color--neutral-200: #d5dae2;
	--wp--preset--color--neutral-100: #eceff2;
	--wp--preset--color--neutral-50: #f6f7f9;

	/* Black and white primitive colors. */
	--wp--preset--color--black: #000000;
	--wp--preset--color--white: #ffffff;
}
```

Except for `--wp--preset--color--black` and `--wp--preset--color--white` in cases where you always want black or white colors (even when toggling between light and dark mode), you should never use other primitive colors in `theme.json`, style variations, or custom CSS. Instead, use semantic colors.

## Semantic Colors

The semantic color layer allows you to map primitives to semantically named colors that are used throughout the design. Essentially, we follow a path like this:

```text
Primitive → Semantic → Component
```

A single primitive color can be mapped to any number of semantic colors. For example, the primitive `white` color can be mapped to both the `background.level-0` and `foreground.on-accent` colors (or even more). The semantic layer gives purpose to the colors.

This is also the layer where we can utilize CSS functions like `light-dark()` to output colors based on user preference.

### Semantic Color Names

Colors at the semantic layer are broken down into two groups:

- `background`: Used for surfaces and other backgrounds and never for text.
- `foreground`: Used for text, icons, and other elements that appear on the background.

Background colors are as follows:

- `level-0`: Typically the base surface.
- `level-1`: Should visually appear as a distinct layer above `level-0`.
- `level-2`: Should visually appear as a distinct layer above `level-0` or `level-1`.
- `accent`: Used for highlighting a particular surface.
- `backdrop`: Used behind overlays, such as lightboxes, to obscure what's below.

Foreground colors are as follows:

- `primary`: Used as the main text color.
- `secondary`: Used as a for less important text.
- `tertiary`: Used for an even lighter emphasis.
- `accent`: Used for text that needs to stand out.
- `on-accent`: Used for text that sits atop the background `accent` color.
- `on-backdrop`: Used for text that sits atop the background `backdrop` color.

Border colors are as follows:

- `accent-1`: Used for borders that should be highlighted.
- `bounds`: Used for general-purpose borders that are usually given to surfaces.
- `emphasis`: Used for borders that need a higher degree of emphasis.

Unless specified by the `on-` prefix, all colors should have readable text against any of the `level-*` backgrounds.

### Defining Semantic Colors in `theme.json`

Because WordPress has no standard method of defining a semantic layer, the theme uses the `settings.custom.color` property in `theme.json` to handle this.

For semantic colors, there are two important things to keep in mind as they are defined:

- **Use Primitive Colors:** Each semantic color token is assigned a primitive color based on the needs of the design.
- **Handle Color Scheme:** For colors that should change based on whether the user is in light or dark mode, use the `light-dark()` CSS function here.

Here is what semantic colors should look like at the semantic layer in `theme.json`:

```json
{
	"$schema": "https://raw.githubusercontent.com/WordPress/gutenberg/wp/trunk/schemas/json/theme.json",
	"version": 3,
	"settings": {
		"color": {
			"background": {
				"level-0": "light-dark(var(--wp--preset--color--white), var(--wp--preset--color--neutral-950))",
				"level-1": "light-dark(var(--wp--preset--color--neutral-50), var(--wp--preset--color--neutral-900))",
				"level-2": "light-dark(var(--wp--preset--color--neutral-100), var(--wp--preset--color--neutral-800))",
				"accent": "light-dark(var(--wp--preset--color--primary-600), var(--wp--preset--color--primary-400))",
				"backdrop": "var(--wp--preset--color--neutral-950)"
			},
			"foreground": {
				"primary": "light-dark(var(--wp--preset--color--neutral-900), var(--wp--preset--color--neutral-200))",
				"secondary": "light-dark(var(--wp--preset--color--neutral-600), var(--wp--preset--color--neutral-400))",
				"tertiary": "light-dark(var(--wp--preset--color--neutral-400), var(--wp--preset--color--neutral-600))",
				"accent": "light-dark(var(--wp--preset--color--primary-700), var(--wp--preset--color--primary-300))",
				"on-accent": "light-dark(var(--wp--preset--color--white), var(--wp--preset--color--primary-950))",
				"on-backdrop": "var(--wp--preset--color--neutral-50)"
			}
		}
	}
}
```

### CSS Custom Properties

WordPress will automatically generate the CSS custom properties for each of the semantic colors with the `--wp--custom--color--` prefix. For example, here is what the `background` and `foreground` color properties look like:

```css
:root {
	/* Background colors. */
	--wp--custom--color--background--level-0: light-dark(var(--wp--preset--color--white), var(--wp--preset--color--neutral-950));
	--wp--custom--color--background--level-1: light-dark(var(--wp--preset--color--neutral-50), var(--wp--preset--color--neutral-900));
	--wp--custom--color--background--level-2: light-dark(var(--wp--preset--color--neutral-100), var(--wp--preset--color--neutral-800));
	--wp--custom--color--background--accent: light-dark(var(--wp--preset--color--primary-600), var(--wp--preset--color--primary-400));
	--wp--custom--color--background--backdrop: var(--wp--preset--color--neutral-950);

	/* Foreground colors. */
	--wp--custom--color--foreground--primary: light-dark(var(--wp--preset--color--neutral-900), var(--wp--preset--color--neutral-200));
	--wp--custom--color--foreground--secondary: light-dark(var(--wp--preset--color--neutral-600), var(--wp--preset--color--neutral-400));
	--wp--custom--color--foreground--tertiary: light-dark(var(--wp--preset--color--neutral-400), var(--wp--preset--color--neutral-600));
	--wp--custom--color--foreground--accent: light-dark(var(--wp--preset--color--primary-700), var(--wp--preset--color--primary-300));
	--wp--custom--color--foreground--on-accent: light-dark(var(--wp--preset--color--white), var(--wp--preset--color--primary-950));
	--wp--custom--color--foreground--on-backdrop: var(--wp--preset--color--neutral-50);
}
```

## Applying Colors

Still gotta do this section, teaching folks how to apply semantic colors at the block and element layer.
