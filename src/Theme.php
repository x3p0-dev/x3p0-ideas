<?php

/**
 * Theme class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Bindings_Registry;
use WP_Block_Pattern_Categories_Registry;
use WP_Block_Patterns_Registry;
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
		$this->instance('block.support.color.scheme', new Block\Support\ColorScheme());

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

		$this->instance('block.style.variations', new Block\StyleVariations(
			WP_Block_Styles_Registry::get_instance()
		));

		$this->instance('patterns', new Patterns(
			WP_Block_Patterns_Registry::get_instance(),
			WP_Block_Pattern_Categories_Registry::get_instance(),
			WP_Block_Type_Registry::get_instance()
		));

		// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
		$this->instance('block.assets',       new Block\Assets());
		$this->instance('block.render',       new Block\Render(new Block\Rules()));
		$this->instance('editor',             new Editor());
		$this->instance('embeds',             new Embeds());
		$this->instance('frontend',           new Frontend());
		$this->instance('media',              new Media());
		$this->instance('template.parts',     new Template\Parts());
		$this->instance('template.templates', new Template\Templates());
		// phpcs:enable

		$this->instance(
			'block.library.core.button',
			new Block\Library\Core\Button($this->get('block.support.color.scheme'))
		);

		$this->instance(
			'block.library.core.post-content',
			new Block\Library\Core\PostContent(new Views\Engine())
		);

		// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
		$blocks = [
			'avatar'             => Block\Library\Core\Avatar::class,
			'archives'           => Block\Library\Core\Archives::class,
			'calendar'           => Block\Library\Core\Calendar::class,
			'categories'         => Block\Library\Core\Categories::class,
			'comment-content'    => Block\Library\Core\CommentContent::class,
			'comments'           => Block\Library\Core\Comments::class,
			'cover'              => Block\Library\Core\Cover::class,
			'file'               => Block\Library\Core\File::class,
			'group'              => Block\Library\Core\Group::class,
			'heading'            => Block\Library\Core\Heading::class,
			'loginout'           => Block\Library\Core\Loginout::class,
			'navigation'         => Block\Library\Core\Navigation::class,
			'navigation-submenu' => Block\Library\Core\NavigationSubmenu::class,
			'post-excerpt'       => Block\Library\Core\PostExcerpt::class,
			'post-template'      => Block\Library\Core\PostTemplate::class,
			'query'              => Block\Library\Core\Query::class,
			'query-pagination'   => Block\Library\Core\QueryPagination::class,
			'tag-cloud'          => Block\Library\Core\TagCloud::class,
			'template-part'      => Block\Library\Core\TemplatePart::class
		];
		// phpcs:enable

		array_walk($blocks, fn($block, $name) => $this->instance(
			"block.library.core.{$name}",
			new $block
		));
	}
}
