<?php
/**
 * Annotation-based actions and filters for class methods.
 *
 * Class forked from SentencePress\HookAnnotation.
 *
 * @author  Viktor Szépe <viktor@szepe.net>
 * @license https://opensource.org/licenses/MIT MIT
 * @link    https://github.com/szepeviktor/SentencePress
 */

namespace X3P0\Ideas\Tools;

use ReflectionClass;
use ReflectionMethod;

use function add_filter;

trait HookAnnotation
{
	/**
	 * Looks for methods with annotated hooks. If found, adds them as filters
	 * on the hook.
	 *
	 * @since 1.0.0
	 */
	protected function hookMethods(): void
	{
		$methods = ( new ReflectionClass( self::class ) )->getMethods(
			ReflectionMethod::IS_PUBLIC
		);

		foreach ( $methods as $method ) {

			if ( $method->isConstructor() ) {
				continue;
			}

			$meta = $this->getMetadata(
				(string) $method->getDocComment()
			);

			if ( null === $meta ) {
				continue;
			}

			add_filter(
				$meta['hook'],
				[ $this, $method->name ],
				$meta['priority'],
				$method->getNumberOfParameters()
			);
		}
	}

	/**
	 * Read hook from docblock.
	 *
	 * @since 1.0.0
	 */
	protected function getMetadata( string $doc_comment ): ?array
	{
		$matches = [];

		// Looks for docblock comments in the form of:
		// @hook hook_name
		// @hook hook_name 10
		// @hook hook_name first
		// @hook hook_name last
		$found = preg_match(
			'/^\s+\*\s+@hook\s+([\w\/._=-]+)(?:\s+(\d+|first|last))?\s*$/m',
			$doc_comment,
			$matches
		);

		if ( 1 !== $found ) {
			return null;
		}

		if ( ! isset( $matches[2] ) ) {
			return [
				'hook'     => $matches[1],
				'priority' => 10,
			];
		}

		switch ( $matches[2] ) {
			case 'first':
				$priority = PHP_INT_MIN;
				break;
			case 'last':
				$priority = PHP_INT_MAX;
				break;
			default:
				$priority = (int) $matches[2];
				break;
		}

		return [
			'hook'     => $matches[1],
			'priority' => $priority,
		];
	}
}
