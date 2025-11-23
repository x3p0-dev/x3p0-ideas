<?php

declare(strict_types=1);

namespace X3P0\Ideas;

use X3P0\Ideas\Editor\EditorServiceProvider;
use X3P0\Ideas\Embed\EmbedServiceProvider;
use X3P0\Ideas\Framework\Core\Application;
use X3P0\Ideas\Frontend\FrontendServiceProvider;
use X3P0\Ideas\Media\MediaServiceProvider;
use X3P0\Ideas\Pattern\PatternServiceProvider;
use X3P0\Ideas\Template\TemplateServiceProvider;
use X3P0\Ideas\View\ViewServiceProvider;

/**
 * The Theme class is an implementation of the Application contract. It's used
 * to register the default service providers, bootstrapping the theme.
 */
final class Theme extends Application
{
	/**
	 * Defines the theme's namespace, which is used as a hook prefix.
	 */
	protected const NAMESPACE = 'x3p0/ideas';

	/**
	 * Defines the theme's default service providers.
	 */
	protected const PROVIDERS = [
		Block\BlockServiceProvider::class,
		Block\Middleware\MiddlewareServiceProvider::class,
		Block\Render\RenderServiceProvider::class,
		Block\Rule\RuleServiceProvider::class,
		Block\Settings\SettingsServiceProvider::class,
		Block\Style\StyleServiceProvider::class,
		EditorServiceProvider::class,
		EmbedServiceProvider::class,
		FrontendServiceProvider::class,
		MediaServiceProvider::class,
		PatternServiceProvider::class,
		TemplateServiceProvider::class,
		ThemeServiceProvider::class,
		ViewServiceProvider::class
	];
}
