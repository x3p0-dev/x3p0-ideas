<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class BlockServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(Assets::class);
		$this->container->singleton(Render::class);
		$this->container->singleton(StyleVariations::class);
		$this->container->singleton(Support\ColorScheme::class);

		// Not bootable.
		$this->container->singleton(Support\Rules::class);
		$this->container->singleton(Support\HtmlAttributes::class);

		// Individual blocks: should these be in a registry or something?
		// Are there common patterns that we can extract?
		$this->container->singleton(Library\Core\Accordion::class);
		$this->container->singleton(Library\Core\Avatar::class);
		$this->container->singleton(Library\Core\Archives::class);
		$this->container->singleton(Library\Core\Button::class);
		$this->container->singleton(Library\Core\Calendar::class);
		$this->container->singleton(Library\Core\Categories::class);
		$this->container->singleton(Library\Core\CommentContent::class);
		$this->container->singleton(Library\Core\Comments::class);
		$this->container->singleton(Library\Core\Cover::class);
		$this->container->singleton(Library\Core\File::class);
		$this->container->singleton(Library\Core\Group::class);
		$this->container->singleton(Library\Core\Heading::class);
		$this->container->singleton(Library\Core\Loginout::class);
		$this->container->singleton(Library\Core\Navigation::class);
		$this->container->singleton(Library\Core\NavigationSubmenu::class);
		$this->container->singleton(Library\Core\PostContent::class);
		$this->container->singleton(Library\Core\PostExcerpt::class);
		$this->container->singleton(Library\Core\PostTemplate::class);
		$this->container->singleton(Library\Core\PostTimeToRead::class);
		$this->container->singleton(Library\Core\Query::class);
		$this->container->singleton(Library\Core\QueryPagination::class);
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
		$this->container->get(Assets::class)->boot();
		$this->container->get(Support\ColorScheme::class)->boot();
		$this->container->get(StyleVariations::class)->boot();
		$this->container->get(Render::class)->boot();

		$this->container->get(Library\Core\Accordion::class)->boot();
		$this->container->get(Library\Core\Avatar::class)->boot();
		$this->container->get(Library\Core\Archives::class)->boot();
		$this->container->get(Library\Core\Button::class)->boot();
		$this->container->get(Library\Core\Calendar::class)->boot();
		$this->container->get(Library\Core\Categories::class)->boot();
		$this->container->get(Library\Core\CommentContent::class)->boot();
		$this->container->get(Library\Core\Comments::class)->boot();
		$this->container->get(Library\Core\Cover::class)->boot();
		$this->container->get(Library\Core\File::class)->boot();
		$this->container->get(Library\Core\Group::class)->boot();
		$this->container->get(Library\Core\Heading::class)->boot();
		$this->container->get(Library\Core\Loginout::class)->boot();
		$this->container->get(Library\Core\Navigation::class)->boot();
		$this->container->get(Library\Core\NavigationSubmenu::class)->boot();
		$this->container->get(Library\Core\PostContent::class)->boot();
		$this->container->get(Library\Core\PostExcerpt::class)->boot();
		$this->container->get(Library\Core\PostTemplate::class)->boot();
		$this->container->get(Library\Core\PostTimeToRead::class)->boot();
		$this->container->get(Library\Core\Query::class)->boot();
		$this->container->get(Library\Core\QueryPagination::class)->boot();
		$this->container->get(Library\Core\TagCloud::class)->boot();
		$this->container->get(Library\Core\TemplatePart::class)->boot();
	}
}
