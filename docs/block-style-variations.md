# Block Style Variations

## Naming Rules

### Block-Specific Styles

These should always be prefixed with the block slug. For example, a style variation for the Button block should be named `button-{variation}`. This makes it clear that the variation is specific to the button.

This method also creates classes that you can directly target with the block name included (e.g., `.is-style-button-{variation}`).

### Section Styles

For sections styles as they've become known in the WordPress community, the Twenty Twenty-Five theme set the _de facto_ standard for naming these. They should be prefixed with `section-`, followed by a number:

- `section-1`
- `section-2`
- `section-3`
- `section-4`

This theme includes four section styles by default following this convention.

### Text Styles

For styles that are limited to textual designs, usually on the Heading or Paragraph blocks, they should be prefixed with `text-`. This follows another convention set forth by the default Twenty Twenty-Five theme. For example, an "indent" style would be named `text-indent`.
