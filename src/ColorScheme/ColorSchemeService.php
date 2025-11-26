<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Color scheme service for managing assets, state, and meta.
 */
final class ColorSchemeService implements Bootable
{
	public function __construct(private readonly ColorSchemeResolver $resolver)
	{}

	public function boot(): void
	{
		add_action('init', $this->registerMeta(...));
		add_action('wp_enqueue_scripts', $this->registerAssets(...));
		add_action('enqueue_block_assets', $this->enqueueInlineStyles(...));
	}

	/**
	 * Returns the resolver (for checking isSwitchable, etc.).
	 */
	public function resolver(): ColorSchemeResolver
	{
		return $this->resolver;
	}

	/**
	 * Helper function for enabling interactivity by setting the interactive
	 * state and enqueueing assets.
	 */
	public function enableInteractivity(): void
	{
		$this->setInteractivityState();
		$this->enqueueAssets();
	}

	/**
	 * Sets interactivity state for the Interactivity API.
	 */
	public function setInteractivityState(): array
	{
		return wp_interactivity_state(ColorSchemeConfig::INTERACTIVE_STORE, [
			'colorScheme'       => $this->resolver->getCurrentScheme(),
			'isDark'            => $this->resolver->isDark(),
			'userId'            => get_current_user_id(),
			'name'              => ColorSchemeConfig::NAME,
			'switchableSchemes' => ColorSchemeConfig::SWITCHABLE_SCHEMES,
			'cookiePath'        => COOKIEPATH,
			'cookieDomain'      => COOKIE_DOMAIN
		]);
	}

	/**
	 * Enqueues interactive assets for color scheme toggle.
	 */
	public function enqueueAssets(): void
	{
		if (is_user_logged_in()) {
			wp_enqueue_script('wp-api-fetch');
		}

		wp_enqueue_script_module(ColorSchemeConfig::NAME);
	}

	private function registerAssets(): void
	{
		$script = include get_parent_theme_file_path('public/js/views/color-scheme.asset.php');

		wp_register_script_module(
			ColorSchemeConfig::NAME,
			get_parent_theme_file_uri('public/js/views/color-scheme.js'),
			$script['dependencies'],
			$script['version']
		);
	}

	private function enqueueInlineStyles(): void
	{
		$css = sprintf(
			':root {color-scheme: %s;}',
			esc_attr($this->resolver->getCurrentScheme())
		);

		wp_register_style(ColorSchemeConfig::NAME, false);
		wp_add_inline_style(ColorSchemeConfig::NAME, $css);
		wp_enqueue_style(ColorSchemeConfig::NAME);
	}

	private function registerMeta(): void
	{
		$sanitize = fn($value) => ColorSchemeConfig::isValidUserScheme($value) ? $value : '';

		register_meta('user', ColorSchemeConfig::NAME, [
			'label'             => __('Color Scheme', 'x3p0-ideas'),
			'description'       => __('Stores the preferred color scheme for the site.', 'x3p0-ideas'),
			'default'           => '',
			'sanitize_callback' => $sanitize,
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string'
		]);
	}
}
