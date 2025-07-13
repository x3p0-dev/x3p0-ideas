<?php

/**
 * Title: Social Menu: Vertical Stretch
 * Slug: x3p0-ideas/social-menu-default-vertical-stretch
 * Description:
 * Categories: text
 * Keywords: social, links, menu
 * Block Types: core/social-links
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

?>
<!-- wp:social-links {
	"showLabels":true,
	"size":"has-normal-icon-size",
	"layout":{
		"type":"flex",
		"orientation":"vertical",
		"justifyContent":"stretch",
		"flexWrap":"wrap"
	}
} -->
<ul class="wp-block-social-links has-normal-icon-size has-visible-labels is-style-default">
	<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
	<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
	<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
	<!-- wp:social-link {"url":"https://twitch.tv","service":"twitch"} /-->
</ul>
<!-- /wp:social-links -->
