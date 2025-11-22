<?php

/**
 * Rule repository.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule;

/**
 * Repository class for managing rule instances.
 */
final class RuleRepository
{
	/**
	 * Cached rule instances.
	 *
	 * @var array<string, Rule>
	 */
	private array $cache = [];

	/**
	 * Sets up the initial object state.
	 */
	public function __construct(private readonly RuleFactory $ruleFactory)
	{}

	/**
	 * Finds and returns a rule instance.
	 */
	public function find(string $key): ?Rule
	{
		if (! $this->has($key)) {
			$this->cache[$key] = $this->ruleFactory->make($key);
		}

		return $this->cache[$key];
	}

	/**
	 * Saves a rule instance to the cache.
	 */
	public function save(string $key, Rule $rule): void
	{
		$this->cache[$key] = $rule;
	}

	/**
	 * Deletes a rule instance from the cache.
	 */
	public function delete(string $key): void
	{
		unset($this->cache[$key]);
	}

	/**
	 * Checks if a rule instance exists in the cache.
	 */
	public function has(string $key): bool
	{
		return array_key_exists($key, $this->cache);
	}
}
