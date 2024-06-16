<?php

/**
 * Title: Hero: Split Code
 * Slug: x3p0-ideas/hero-split-code
 * Categories: x3p0-hero
 * Keywords: hero, cover, intro, about, code, software
 * Block Types: core/cover
 * Viewport Width: 1376
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

$image = get_theme_file_uri('public/media/svg/code.svg');

?>
<!-- wp:group {
	"tagName":"section",
	"align":"full",
	"style":{
		"spacing":{
			"padding":{
				"right":"var:preset|spacing|plus-3",
				"left":"var:preset|spacing|plus-3",
				"top":"var:preset|spacing|plus-4",
				"bottom":"var:preset|spacing|plus-4"
			}
		}
	},
	"className":"is-style-section-3",
	"layout":{"type":"constrained","contentSize":"80rem"}
} -->
<section class="wp-block-group alignfull is-style-section-3" style="padding-top:var(--wp--preset--spacing--plus-4);padding-right:var(--wp--preset--spacing--plus-3);padding-bottom:var(--wp--preset--spacing--plus-4);padding-left:var(--wp--preset--spacing--plus-3)">

	<!-- wp:group {
		"style":{
			"spacing":{
				"blockGap":"var:preset|spacing|plus-5"
			}
		},
		"layout":{
			"type":"grid",
			"minimumColumnWidth":"26rem"
		}
	} -->
	<div class="wp-block-group">

		<!-- wp:group {
			"style":{
				"layout":{
					"selfStretch":"fixed",
					"flexSize":"40rem"
				}
			},
			"layout":{
				"type":"flex",
				"orientation":"vertical",
				"verticalAlignment":"center"
			}
		} -->
		<div class="wp-block-group">

			<!-- wp:image {
				"width":"48px",
				"sizeSlug":"full",
				"linkDestination":"none"
			} -->
			<figure class="wp-block-image size-full is-resized">
				<img src="<?= esc_url($image) ?>" alt="" style="width:48px"/>
			</figure>
			<!-- /wp:image -->

			<!-- wp:heading {
				"className":"is-style-default",
				"fontSize":"7-xl"
			} -->
			<h2 class="wp-block-heading is-style-default has-7-xl-font-size"><?= esc_html__('Jump start your next project with our open-source engine', 'x3p0-ideas') ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?= esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum turpis quis metus aliquam, id pharetra arcu dignissim.', 'x3p0-ideas') ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?= esc_html('Download', 'x3p0-ideas') ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-link"} -->
				<div class="wp-block-button is-style-link"><a class="wp-block-button__link wp-element-button"><?= esc_html__('Learn More →', 'x3p0-ideas') ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

		<!-- wp:code {"className":"language-php is-style-highlight"} -->
		<pre class="wp-block-code language-php is-style-highlight"><code>class Engine<br>{<br>	public function view(string $name, array $data = &#91;]): View<br>	{<br>		return new View($name, $data);<br>	}<br><br>	public function any($views, array $data = &#91;])<br>	{<br>		foreach ((array) $views as $view) {<br>			if ($this-&gt;exists($view)) {<br>				return $this-&gt;view($view, $data);<br>			}<br>		}<br><br>		return false;<br>	}<br><br>	public function renderIf($views, array $data = &#91;]): string<br>	{<br>		$view = $this-&gt;any((array) $views, $data);<br><br>		return $view ? $view-&gt;render() : '';<br>	}</code></pre>
		<!-- /wp:code -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
