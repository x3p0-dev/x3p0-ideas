<?php

/**
 * Theme container implementation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Bindings_Registry;
use WP_Block_Patterns_Registry;
use WP_Block_Pattern_Categories_Registry;
use WP_Block_Styles_Registry;
use WP_Block_Type_Registry;
use X3P0\Ideas\Contracts\{Bootable, Container};

/**
 * The Theme class is a simple container used to store and reference the various
 * theme components. It doesn't support automatic dependency injection (manual
 * only) because it would be overkill for this project.
 */
class Theme implements Bootable, Container
{
	/**
	 * Stored definitions of single instances.
	 */
	private array $instances = [];

	/**
	 * Registers the default bindings for the theme.
	 */
	public function __construct()
	{
		$this->registerDefaultBindings();
	}

	/**
	 * Calls the `boot()` method of bootable classes that have been added to
	 * the container.
	 */
	public function boot(): void
	{
		foreach ($this->instances as $binding) {
			$binding instanceof Bootable && $binding->boot();
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function instance(string $abstract, mixed $instance): void
	{
		$this->instances[$abstract] = $instance;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get(string $abstract): mixed
	{
		return $this->has($abstract) ? $this->instances[$abstract] : null;
	}

	/**
	 * {@inheritdoc}
	 */
	public function has(string $abstract): bool
	{
		return isset($this->instances[$abstract]);
	}

	/**
	 * Registers the default bindings we need to run the theme.
	 */
	private function registerDefaultBindings(): void
	{
		$this->instance('block.bindings', new Block\Bindings\Component(
			WP_Block_Bindings_Registry::get_instance(),
			[
				Block\Bindings\Comment::class,
				Block\Bindings\Media::class,
				Block\Bindings\Post::class,
				Block\Bindings\Site::class,
				Block\Bindings\Theme::class
			]
		));

		$this->instance(
			'block.library.core.button',
			new Block\Library\Core\Button(new Tools\ColorScheme())
		);

		$this->instance(
			'block.library.core.post-content',
			new Block\Library\Core\PostContent(new Views\Engine())
		);

		$this->instance('block.library.core.avatar',             new Block\Library\Core\Avatar());
		$this->instance('block.library.core.archives',           new Block\Library\Core\Archives());
		$this->instance('block.library.core.calendar',           new Block\Library\Core\Calendar());
		$this->instance('block.library.core.categories',         new Block\Library\Core\Categories());
		$this->instance('block.library.core.comment-content',    new Block\Library\Core\CommentContent());
		$this->instance('block.library.core.comments',           new Block\Library\Core\Comments());
		$this->instance('block.library.core.cover',              new Block\Library\Core\Cover());
		$this->instance('block.library.core.group',              new Block\Library\Core\Group());
		$this->instance('block.library.core.heading',            new Block\Library\Core\Heading());
		$this->instance('block.library.core.loginout',           new Block\Library\Core\Loginout());
		$this->instance('block.library.core.query',              new Block\Library\Core\Query());
		$this->instance('block.library.core.navigation',         new Block\Library\Core\Navigation());
		$this->instance('block.library.core.navigation-submenu', new Block\Library\Core\NavigationSubmenu());
		$this->instance('block.library.core.post-excerpt',       new Block\Library\Core\PostExcerpt());
		$this->instance('block.library.core.post-template',      new Block\Library\Core\PostTemplate());
		$this->instance('block.library.core.query-pagination',   new Block\Library\Core\QueryPagination());
		$this->instance('block.library.core.tag-cloud',          new Block\Library\Core\TagCloud());
		$this->instance('block.library.core.template-part',      new Block\Library\Core\TemplatePart());

		$this->instance('block.style.variations', new Block\StyleVariations(
			WP_Block_Styles_Registry::get_instance()
		));

		$this->instance('patterns', new Patterns(
			WP_Block_Patterns_Registry::get_instance(),
			WP_Block_Pattern_Categories_Registry::get_instance(),
			WP_Block_Type_Registry::get_instance()
		));

		// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
		$this->instance('block.assets',   new Block\Assets());
		$this->instance('block.render',   new Block\Render(new Block\Rules()));
		$this->instance('editor',         new Editor());
		$this->instance('embeds',         new Embeds());
		$this->instance('frontend',       new Frontend());
		$this->instance('media',          new Media());
		$this->instance('parts',          new Parts());
		$this->instance('templates',      new Templates());
		// phpcs:enable
	}
}
