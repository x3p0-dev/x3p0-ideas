<?php

/**
 * Prelude: Composer package prefixer.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-breadcrumbs
 */

declare(strict_types=1);

namespace X3P0\Ideas\Scripts;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use Composer\{Composer, Factory};
use Composer\Script\Event;

/**
 * Used in Composer to add X3PO packages to the `/packages` folder and prefix
 * them with the project namespace. For example, `X3PO\Framework` becomes
 * `X3P0\Namespace\Framework`. This is a form of "vendor prefixing" to avoid
 * conflicts where the packages are used in multiple themes/plugins.
 */
final class Prelude
{
	/**
	 * Namespace to search for and replace.
	 */
	private string $searchNamespace;

	/**
	 * Namespace to replace with.
	 */
	private string $replaceNamespace;

	/**
	 * Vendor folder name to look for.
	 */
	private string $vendorPath;

	/**
	 * Output folder name to store the prefixed packages.
	 */
	private string $outputPath;

	/**
	 * Source vendor directory.
	 */
	private string $vendorDir;

	/**
	 * Output directory for prefixed packages.
	 */
	private string $outputDir;

	/**
	 * Main entry point for Composer scripts.
	 */
	public static function compose(Event $event): void
	{
		(new self(event: $event))->run();
	}

	/**
	 * Sets up the initial object state.
	 */
	private function __construct(Event $event)
	{
		$this->loadConfiguration($event->getComposer());

		$this->vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
		$this->outputDir = dirname(Factory::getComposerFile()) . '/' . $this->outputPath;
	}

	/**
	 * Load configuration from composer.json.
	 */
	private function loadConfiguration(Composer $composer): void
	{
		$extra = $composer->getPackage()->getExtra();

		// Get custom configuration from `extra.package-prefixer`
		// property in `composer.json`.
		if (! isset($extra['x3p0']) || ! isset($extra['x3p0']['prelude'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude' configuration in composer.json"
			);
		}

		$config = $extra['x3p0']['prelude'];

		if (! isset($config['vendor-path'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude.vendor-path' in composer.json"
			);
		}

		if (! isset($config['output-path'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude.output-path' in composer.json"
			);
		}

		if (! isset($config['search-namespace'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude.search-namespace' in composer.json"
			);
		}

		if (! isset($config['replace-namespace'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude.replace-namespace' in composer.json"
			);
		}

		$this->vendorPath      = $config['vendor-path'];
		$this->outputPath      = $config['output-path'];
		$this->searchNamespace = rtrim($config['search-namespace'], '\\');
		$this->replaceNamespace = rtrim($config['replace-namespace'], '\\');
	}

	/**
	 * Run the prefixing process.
	 */
	public function run(): void
	{
		$this->log("Search namespace: {$this->searchNamespace}");
		$this->log("Replace namespace: {$this->replaceNamespace}");
		$this->log("Looking for packages in vendor/{$this->vendorPath}/...");

		$this->cleanOutputDirectory();
		$this->copyPackages();
		$this->prefixNamespaces();

		$this->log("Dependencies prefixed successfully!");
		$this->log("Packages were copied and prefixed to {$this->outputPath}/");
	}

	/**
	 * Clean the output directory.
	 */
	private function cleanOutputDirectory(): void
	{
		if (is_dir($this->outputDir)) {
			$this->deleteDirectory($this->outputDir);
		}

		mkdir($this->outputDir, 0755, true);
	}

	/**
	 * Copy packages from vendor to output directory.
	 */
	private function copyPackages(): void
	{
		$sourceDir = $this->vendorDir . '/' . $this->vendorPath;

		if (! is_dir($sourceDir)) {
			throw new RuntimeException("No packages found in vendor/{$this->vendorPath}/");
		}

		$this->copyDirectory($sourceDir, "{$this->outputDir}/{$this->vendorPath}");
	}

	/**
	 * Prefix namespaces in all PHP files.
	 */
	private function prefixNamespaces(): void
	{
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator(
				$this->outputDir,
				FilesystemIterator::SKIP_DOTS
			)
		);

		foreach ($files as $file) {
			if ($file->isFile() && $file->getExtension() === 'php') {
				$this->prefixFile($file->getPathname());
			}
		}
	}

	/**
	 * Prefix namespaces in a single file.
	 */
	private function prefixFile(string $filePath): void
	{
		$contents = file_get_contents($filePath);

		// Replace search namespace with replace namespace.
		$pattern     = '/\b' . preg_quote($this->searchNamespace, '/') . '\\\\/';
		$replacement = $this->replaceNamespace . '\\';
		$contents    = preg_replace($pattern, $replacement, $contents);

		file_put_contents($filePath, $contents);
	}

	/**
	 * Copy a directory recursively.
	 */
	private function copyDirectory(string $fromDir, string $toDir): void
	{
		$dir = opendir($fromDir);
		@mkdir($toDir, 0755, true);

		while (($file = readdir($dir)) !== false) {
			if ($file === '.' || $file === '..') {
				continue;
			}

			$from = $fromDir . '/' . $file;
			$to   = $toDir . '/' . $file;

			if (is_dir($from)) {
				$this->copyDirectory($from, $to);
			} else {
				copy($from, $to);
			}
		}

		closedir($dir);
	}

	/**
	 * Delete a directory recursively.
	 */
	private function deleteDirectory(string $dir): void
	{
		if (! is_dir($dir)) {
			return;
		}

		$files = array_diff(scandir($dir), ['.', '..']);

		foreach ($files as $file) {
			$path = $dir . '/' . $file;
			is_dir($path) ? $this->deleteDirectory($path) : unlink($path);
		}

		rmdir($dir);
	}

	/**
	 * Log a message.
	 */
	private function log(string $message): void
	{
		echo $message . PHP_EOL;
	}
}
