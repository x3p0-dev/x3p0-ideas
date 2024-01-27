# Color Scheme

The theme uses a very specific naming convention for the colors in its palette. This way, it is easy to override via style variations and child themes to allow the
colors to trickle down automatically blocks, elements, etc. This creates less work when building variations/children while still allowing style overrides on an as-needed basis.

## Rules

- **Base and Contrast Colors:**
	- The _de facto_ standard in the WordPress theming community is to set both a `base` and `contrast` color, applying them to the root `background` and `text` styles, respectively.
	- All style variations must include both the `base` and `contrast` colors.
- **Color Sets:**
	- The theme supports three color sets out of the box:
		- `primary`
		- `secondary`
		- `neutral`
	- Each color set must register colors with the following suffixes to account for the various shades:
		- `{color}-50`
		- `{color}-100`
		- `{color}-300`
		- `{color}-500`
		- `{color}-700`
		- `{color}-900`
		- `{color}-950`
	- Light vs. dark designs:
		- For light designs (dark text on light background), the shades are ordered lightest (`50`) to darkest (`950`).
		- For dark designs (light text on a dark background), the shades are ordered darkest (`950`) to lightest (`50`).
		- This is merely the default that's used for all the styles in the theme, but variations can override this if they want.
	- Stye variations may include other shades as needed, following the same numeric naming convention.
	- All style variations must include at least the `primary` and `neutral` color sets.
	- Other color sets are allowed but must follow the naming rules.
- **White and Black Colors:**
	- If any style variation or child theme does not include a pure white (`#ffffff`) or pure black (`#000000`) color in one of the color sets, they must:
		- Either register those colors with the slugs of `white` and `black`, respectively.
		- Or enable `settings.color.defaultPalette` in `theme.json`.

## Tools

- [Color Space](https://mycolor.space/): Build palettes based on a color.
- [UI Colors](https://uicolors.app/create): Quickly get shades of a color.
- [RegExr](https://regexr.com/): For converting CSS custom properties into JSON object to use in `theme.json`.

**RegExr Patterns:**

```
// Finds the named properties from UI Colors.
--(.*?)-(.*?): (.*?);

// Replaces with JSON object (note: change `Primary` to preferred name).
{\n\t"slug": "$1-$2",\n\t"color": "$3",\n\t"name": "Primary: $2"\n},
```

## Colors

### Default (`theme.json`)

```css
--neutral-50: #f4f6fb;
--neutral-100: #e9edf5;
--neutral-200: #cedae9;
--neutral-300: #a3bbd6;
--neutral-400: #7196bf;
--neutral-500: #4f78a8;
--neutral-600: #3d608c;
--neutral-700: #324d72;
--neutral-800: #2c4360;
--neutral-900: #293951;
--neutral-950: #1e293b;

--primary-50: #f0f8fe;
--primary-100: #ddeffc;
--primary-200: #c2e5fb;
--primary-300: #99d5f7;
--primary-400: #68bef2;
--primary-500: #45a1ec;
--primary-600: #2b83e0;
--primary-700: #2770ce;
--primary-800: #265aa7;
--primary-900: #244e84;
--primary-950: #1a3151;

--secondary-50: #ecfdf8;
--secondary-100: #d1faed;
--secondary-200: #a7f3db;
--secondary-300: #6ee7c1;
--secondary-400: #34d3a2;
--secondary-500: #10b985;
--secondary-600: #059669;
--secondary-700: #047854;
--secondary-800: #065f43;
--secondary-900: #064e38;
--secondary-950: #022c1f;
```

### A Little Bit Bookish

```css
--primary-50: #fcf5f4;
--primary-100: #fae8e6;
--primary-200: #f7d5d1;
--primary-300: #f0b8b1;
--primary-400: #e58f84;
--primary-500: #d76a5c;
--primary-600: #c65a4c;
--primary-700: #a33f32;
--primary-800: #87372d;
--primary-900: #71332b;
--primary-950: #3d1712;

--secondary-50: #f4f8ed;
--secondary-100: #e6efd8;
--secondary-200: #cfe1b5;
--secondary-300: #afcc8a;
--secondary-400: #92b764;
--secondary-500: #759e47;
--secondary-600: #597b35;
--secondary-700: #455f2c;
--secondary-800: #394d27;
--secondary-900: #334225;
--secondary-950: #192310;

--neutral-50: #eeece7;
--neutral-100: #e0d9d2;
--neutral-200: #cabdaf;
--neutral-300: #ae9a89;
--neutral-400: #987d67;
--neutral-500: #866b5b;
--neutral-600: #70574c;
--neutral-700: #5a453f;
--neutral-800: #56423e;
--neutral-900: #4c3a38;
--neutral-950: #2a1f1e;
```
