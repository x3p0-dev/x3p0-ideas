<?php

/**
 * Superpower class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022-2024, Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools;

/**
 * Generates a random "powered by" message.
 */
class Superpower
{
	/**
	 * Holds the potential messages.
	 */
	protected array $messages = [];

	/**
	 * Sets the initial object state.
	 */
	public function __construct()
	{
		$this->messages['text'] = [
			__('Powered by heart and soul.', 'x3p0-ideas'),
			__('Powered by crazy ideas and passion.', 'x3p0-ideas'),
			__('Powered by the thing that holds all things together in the universe.', 'x3p0-ideas'),
			__('Powered by love.', 'x3p0-ideas'),
			__('Powered by the vast and endless void.', 'x3p0-ideas'),
			__('Powered by the code of a maniac.', 'x3p0-ideas'),
			__('Powered by peace and understanding.', 'x3p0-ideas'),
			__('Powered by coffee.', 'x3p0-ideas'),
			__('Powered by sleepless nights.', 'x3p0-ideas'),
			__('Powered by the love of all things.', 'x3p0-ideas'),
			__('Powered by something greater than myself.', 'x3p0-ideas'),
			// 2022-10-05 - @justintadlock
			__('Powered by elbow grease. Held together by tape and bubble gum.', 'x3p0-ideas'),
			__('Powered by an old mixtape and memories of lost love.', 'x3p0-ideas'),
			__('Powered by thoughts of old love letters.', 'x3p0-ideas')
		];

		// @todo Come up with emoji equivalents for the messages that
		// are commented out.
		$this->messages['emoji'] = [
			__('Powered by ❤️ and soul.', 'x3p0-ideas'),
			__('Powered by crazy 🤔 and passion.', 'x3p0-ideas'),
		//	__('Powered by the thing that holds all things together in the universe.', 'x3p0-ideas'),
			__('Powered by ❤️.', 'x3p0-ideas'),
		//	__('Powered by the vast and endless void.', 'x3p0-ideas'),
		//	__('Powered by the code of a maniac.', 'x3p0-ideas'),
			__('Powered by ☮️ and understanding.', 'x3p0-ideas'),
			__('Powered by ☕.', 'x3p0-ideas'),
			__('Powered by sleepless 🌛.', 'x3p0-ideas'),
			__('Powered by ❤️ for all things.', 'x3p0-ideas'),
		//	__('Powered by something greater than myself.', 'x3p0-ideas'),
			// 2022-10-05 - @justintadlock
		//	__('Powered by elbow grease. Held together by tape and bubble gum.', 'x3p0-ideas'),
			__('Powered by an old mix 💿 and memories of 💔.', 'x3p0-ideas'),
			__('Powered by thoughts of old 💌.', 'x3p0-ideas')
		];
	}

	/**
	 * Returns the message.
	 */
	public function render(string $type = ''): string
	{
		$collection = match ($type) {
			'text'  => $this->messages['text'],
			'emoji' => $this->messages['emoji'],
			default => [
				...$this->messages['text'],
				...$this->messages['emoji']
			]
		};

		return $collection[ array_rand($collection, 1) ];
	}

	/**
	 * Returns the default messages.
	 */
	public function messages(): array
	{
		return $this->messages;
	}
}
