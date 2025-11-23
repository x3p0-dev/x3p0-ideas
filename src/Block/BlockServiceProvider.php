<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Block\Rule\RuleEngine;
use X3P0\Ideas\Block\Rule\RuleFactory;
use X3P0\Ideas\Block\Rule\RuleRegistrar;
use X3P0\Ideas\Block\Rule\RuleRegistry;
use X3P0\Ideas\Block\Rule\RuleRepository;
use X3P0\Ideas\Block\Settings\SettingsModifierFactory;
use X3P0\Ideas\Block\Settings\SettingsModifierManager;
use X3P0\Ideas\Block\Settings\SettingsModifierRegistrar;
use X3P0\Ideas\Block\Settings\SettingsModifierRegistry;
use X3P0\Ideas\Block\Style\StyleEngine;
use X3P0\Ideas\Block\Style\StyleRegistrar;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class BlockServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(BlockStylesheets::class);
		$this->container->singleton(BlockRender::class);
		$this->container->singleton(Support\ColorScheme::class);

		// Styles.
		$this->container->singleton(StyleEngine::class);
		$this->container->singleton(StyleRegistrar::class);

		// Settings.
		$this->container->singleton(SettingsModifierFactory::class);
		$this->container->singleton(SettingsModifierManager::class);
		$this->container->singleton(SettingsModifierRegistry::class);

		// Not bootable.
		$this->container->singleton(RuleEngine::class);
		$this->container->singleton(RuleFactory::class);
		$this->container->singleton(RuleRegistry::class);
		$this->container->singleton(RuleRepository::class);
		$this->container->singleton(Support\HtmlAttributes::class);

		// Individual blocks: should these be in a registry or something?
		// Are there common patterns that we can extract?
		$this->container->singleton(Library\Core\Accordion::class);
		$this->container->singleton(Library\Core\Archives::class);
		$this->container->singleton(Library\Core\Button::class);
		$this->container->singleton(Library\Core\Calendar::class);
		$this->container->singleton(Library\Core\Cover::class);
		$this->container->singleton(Library\Core\File::class);
		$this->container->singleton(Library\Core\Loginout::class);
		$this->container->singleton(Library\Core\Navigation::class);
		$this->container->singleton(Library\Core\PostContent::class);
		$this->container->singleton(Library\Core\PostExcerpt::class);
		$this->container->singleton(Library\Core\PostTimeToRead::class);
		$this->container->singleton(Library\Core\Query::class);
		$this->container->singleton(Library\Core\TagCloud::class);
		$this->container->singleton(Library\Core\TemplatePart::class);

		// TODO: Create binding source registry and factory.
		$this->container->singleton(
			Bindings\Component::class,
			fn() => new Bindings\Component(
				$this->container->get(WP_Block_Bindings_Registry::class),
				[
					Bindings\Comment::class,
					Bindings\General::class,
					Bindings\Media::class,
					Bindings\Post::class,
					Bindings\Site::class,
					Bindings\Superpower::class,
					Bindings\Theme::class
				]
			)
		);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(Bindings\Component::class)->boot();
		$this->container->get(BlockStylesheets::class)->boot();
		$this->container->get(Support\ColorScheme::class)->boot();
		$this->container->get(BlockRender::class)->boot();

		// Styles.
		$this->container->get(StyleEngine::class)->boot();
		$this->container->get(StyleRegistrar::class)->boot();

		RuleRegistrar::register($this->container->get(RuleRegistry::class));

		$this->container->get(SettingsModifierManager::class)->boot();

		SettingsModifierRegistrar::register($this->container->get(SettingsModifierRegistry::class));

		$this->container->get(Library\Core\Accordion::class)->boot();
		$this->container->get(Library\Core\Archives::class)->boot();
		$this->container->get(Library\Core\Button::class)->boot();
		$this->container->get(Library\Core\Calendar::class)->boot();
		$this->container->get(Library\Core\Cover::class)->boot();
		$this->container->get(Library\Core\File::class)->boot();
		$this->container->get(Library\Core\Loginout::class)->boot();
		$this->container->get(Library\Core\Navigation::class)->boot();
		$this->container->get(Library\Core\PostContent::class)->boot();
		$this->container->get(Library\Core\PostExcerpt::class)->boot();
		$this->container->get(Library\Core\PostTimeToRead::class)->boot();
		$this->container->get(Library\Core\Query::class)->boot();
		$this->container->get(Library\Core\TagCloud::class)->boot();
		$this->container->get(Library\Core\TemplatePart::class)->boot();
	}
}
