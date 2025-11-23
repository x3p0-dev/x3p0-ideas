<?php

/**
 * Site binding class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Binding\Source;

use WP_Block;
use X3P0\Ideas\Block\Binding\BindingSource;

/**
 * Handles registering the `x3p0/site` block bindings source and rendering its
 * output based on the given arguments.
 */
class Site implements BindingSource
{
	public function getName(): string
	{
		return 'x3p0/site';
	}

	public function getLabel(): string
	{
		return __('Site Data', 'x3p0-ideas');
	}

	public function getContext(): array
	{
		return [];
	}

	/**
	 * Returns site data based on the bound attribute.
	 */
	public function callback(array $args, WP_Block $block, string $name): ?string
	{
		return match ($args['key'] ?? null) {
			'copyright'    => $this->renderCopyright(),
			'loginoutText' => $this->renderLoginoutText(),
			'loginoutUrl'  => $this->renderLoginoutUrl(),
			'year'         => $this->renderYear(),
			default        => null
		};
	}

	/**
	 * Returns the site copyright statement.
	 */
	private function renderCopyright(): string
	{
		return esc_html(sprintf(
			// Translators: %s is the current year.
			__('Copyright &copy; %s', 'x3p0-ideas'),
			$this->renderYear()
		));
	}

	/**
	 * Renders a text string to either Log In or Log Out of the site based
	 * on the current user's logged-in status.
	 */
	private function renderLoginoutText(): string
	{
		return  is_user_logged_in()
			? esc_html__('Log Out', 'x3p0-ideas')
			: esc_html__('Log In', 'x3p0-ideas');
	}

	/**
	 * Renders a URL for either logging in or out, depending on the current
	 * user's logged-in status.
	 */
	private function renderLoginoutUrl(): string
	{
		$ssl  = is_ssl() ? 'https://' : 'http://';
		$host = isset($_SERVER['HTTP_HOST']) ? wp_unslash($_SERVER['HTTP_HOST']) : '';
		$uri  = isset($_SERVER['REQUEST_URI']) ? wp_unslash($_SERVER['REQUEST_URI']) : '';

		$redirect = $host && $uri ? esc_url_raw($ssl . $host . $uri) : '';

		return esc_url(is_user_logged_in() ? wp_logout_url($redirect) : wp_login_url($redirect));
	}

	/**
	 * Returns the current year.
	 */
	private function renderYear(): string
	{
		return esc_html(wp_date('Y'));
	}
}
