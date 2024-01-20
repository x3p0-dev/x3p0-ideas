# Image Sizes

The theme follows a specific image-size naming scheme. And, technically, we're really talking about image resolutions when using the `add_image_size()` function
in WordPress.

## Rules

- **Size:**
	- All sizes must use a common aspect ratio (e.g., `16/9`, `3/4`).
	- All sizes should set the `$crop` parameter to `true` to enable hard-cropping.
- **Name/Slug:**
	- The name must have three parts, each separated by a hyphen:
		- **Vendor Prefix:** Use the vendor slug (e.g., `x3p0`).
		- **Aspect Ratio:** Use the aspect ratio with an `x` between the width and height (e.g., `16x9`, `3x4`).
		- **Size Suffix:** Use a slug associated with the size width (e.g., `sm`, `md`, `lg`).
	- Example: `x3p0-16x9-lg`
- **Size Suffix:**
	- Size suffixes are based the width of the image:
		- `sm`: `512px`
		- `md`: `1024`
		- `lg`: `2048`
		- `xl`: `3072`
		- `2xl`: `4096`
	- From theme to theme, sizes may use different widths, so, these are more "ballpark" numbers than anything. Use them as a guideline.
- **Labels:**
	- When labeling an image size, such as via the `image_size_names_choose` filter, include:
		- Aspect Ratio (e.g., `16:9`, `3:4`, `1:1`)
		- Orientation (e.g., `Landscape`, `Portrait`, `Square`)
	- Example: `16:9 (Landscape)`

## Examples

```php
<?php
// Wen registering image sizes:
add_action('init', function() {
	add_image_size('x3p0-16x9-lg', 2048, 1152, true);
	add_image_size('x3p0-21x9-lg', 2048, 864, true);
	add_image_size('x3p0-9x16-md', 1024, 1820, true);
	add_image_size('x3p0-3x4-md', 1024, 1365, true);
	add_image_size('x3p0-1x1-md', 1024, 1024, true);
});

// When adding labels:
add_filter('image_size_names_choose', function($sizes) {
	$sizes['x3p0-16x9-lg'] = __('16:9 (Landscape)', 'x3p0-ideas');
	$sizes['x3p0-21x9-lg'] = __('21:9 (Landscape)', 'x3p0-ideas');
	$sizes['x3p0-9x16-md'] = __('9:16 (Portrait)', 'x3p0-ideas');
	$sizes['x3p0-3x4-md']  = __('3:4 (Portrait)', 'x3p0-ideas');
	$sizes['x3p0-1x1-md']  = __('1:1 (Square)', 'x3p0-ideas');
	return $sizes;
});
```

