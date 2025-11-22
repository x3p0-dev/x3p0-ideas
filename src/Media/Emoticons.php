<?php

declare(strict_types=1);

namespace X3P0\Ideas\Media;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles custom emoticon registration and filters.
 */
final class Emoticons implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('smilies', $this->register(...));
	}

	/**
	 * Filters the core emoticon images. All but `:mrgreen` are converted to
	 * emoji in WordPress. This filter replaces `:mrgreen` with the original
	 * SVG version instead of the default PNG.
	 */
	private function register(array $smilies): array
	{
		return [
			...$smilies,
			':mrgreen' => $this->getMrGreenSvg()
		];
	}

	/**
	 * Returns the SVG markup for the :mrgreen: emoticon.
	 * @link https://core.trac.wordpress.org/attachment/ticket/31709/mrgreen.svg
	 */
	private function getMrGreenSvg(): string
	{
		return '<svg class="wp-smiley wp-smiley--mrgreen" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30" xml:space="preserve"><g id="g14"><g><defs><rect id="SVGID_1_" y="0" width="30" height="30"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" overflow="visible"/></clipPath><g id="g16" clip-path="url(#SVGID_2_)"><g id="g22" transform="translate(37,19)"><path id="path24" fill="#51B372" d="M-7.8-4c0,7.8-6.4,14.2-14.2,14.2S-36.2,3.8-36.2-4s6.4-14.2,14.2-14.2S-7.8-11.8-7.8-4"/></g><g id="g26" transform="translate(19,16)"><path id="path28" fill="#1B3A24" d="M-4,1.4c-2.9,0-4.8-0.3-7.1-0.8c-0.5-0.1-1.6,0-1.6,1.6c0,3.2,3.6,7.1,8.7,7.1 c5.1,0,8.7-3.9,8.7-7.1c0-1.6-1-1.7-1.6-1.6C0.8,1-1.1,1.4-4,1.4"/></g><g id="g30" transform="translate(11,24)"><path id="path32" fill="#1B3A24" d="M-2.3-12.9c0,0,0-1.6,1.6-1.6s1.6,1.6,1.6,1.6v1.6c0,0,0,1.6-1.6,1.6s-1.6-1.6-1.6-1.6 V-12.9z"/></g><g id="g34" transform="translate(23,24)"><path id="path36" fill="#1B3A24" d="M-4.8-12.9c0,0,0-1.6,1.6-1.6s1.6,1.6,1.6,1.6v1.6c0,0,0,1.6-1.6,1.6s-1.6-1.6-1.6-1.6 V-12.9z"/></g><g id="g38" transform="translate(10,15)"><path id="path40" fill="#FFFFFF" d="M-2.1,3.2c0,0,2.4,0.8,7.1,0.8s7.1-0.8,7.1-0.8S10.5,6.3,5,6.3S-2.1,3.2-2.1,3.2"/></g></g></g></g></svg>';
	}
}
