<?php

/**
 * Prelude: Composer package prefixer.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
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
 * Prelude copies packages from vendor and applies namespace prefixing to avoid
 * conflicts when packages are used across multiple projects.
 */
final class Prelude
{
	/**
	 * Global namespace prefix to apply to packages.
	 */
	private string $prefix;

	/**
	 * Output folder name to store the prefixed packages.
	 */
	private string $outputPath;

	/**
	 * Package configurations keyed by path pattern.
	 */
	private array $packages;

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

		if (! isset($extra['x3p0']) || ! isset($extra['x3p0']['prelude'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude' configuration in composer.json"
			);
		}

		$config = $extra['x3p0']['prelude'];

		if (! isset($config['prefix'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude.prefix' in composer.json"
			);
		}

		if (! isset($config['output-path'])) {
			throw new RuntimeException(
				"Missing 'extra.x3p0.prelude.output-path' in composer.json"
			);
		}

		if (! isset($config['packages']) || ! is_array($config['packages'])) {
			throw new RuntimeException(
				"Missing or invalid 'extra.x3p0.prelude.packages' in composer.json"
			);
		}

		$this->prefix = rtrim($config['prefix'], '\\');
		$this->outputPath = $config['output-path'];
		$this->packages = $config['packages'];
	}

	/**
	 * Run the prefixing process.
	 */
	public function run(): void
	{
		$this->log("Global prefix: {$this->prefix}");
		$this->log("Output path: {$this->outputPath}");
		$this->log("Processing packages...");

		$this->cleanOutputDirectory();
		$this->processPackages();

		$this->log("Dependencies prefixed successfully!");
		$this->log("Packages copied to {$this->outputPath}/");
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
	 * Process all configured packages.
	 */
	private function processPackages(): void
	{
		$vendorPackages = $this->getVendorPackages();
		$processedPaths = [];

		foreach ($this->packages as $pattern => $options) {
			$matchedPaths = $this->matchPattern($pattern, $vendorPackages);

			foreach ($matchedPaths as $path) {
				// Skip if already processed
				if (in_array($path, $processedPaths, true)) {
					continue;
				}

				$this->processPackage($path, $options);
				$processedPaths[] = $path;
			}
		}
	}

	/**
	 * Get all package paths from vendor directory.
	 */
	private function getVendorPackages(): array
	{
		$packages = [];
		$vendors = glob($this->vendorDir . '/*', GLOB_ONLYDIR);

		foreach ($vendors as $vendor) {
			$vendorName = basename($vendor);

			// Skip composer and bin directories
			if (in_array($vendorName, ['composer', 'bin'])) {
				continue;
			}

			$vendorPackages = glob($vendor . '/*', GLOB_ONLYDIR);

			foreach ($vendorPackages as $package) {
				$packages[] = $vendorName . '/' . basename($package);
			}
		}

		return $packages;
	}

	/**
	 * Match a pattern against package paths.
	 */
	private function matchPattern(string $pattern, array $packages): array
	{
		// Wildcard matches all remaining packages
		if ($pattern === '*') {
			return $packages;
		}

		return array_filter($packages, fn($package) => $this->matchesPattern($pattern, $package));
	}

	/**
	 * Check if a path matches a pattern.
	 */
	private function matchesPattern(string $pattern, string $path): bool
	{
		// Exact match
		if ($pattern === $path) {
			return true;
		}

		// Wildcard pattern
		$regex = '/^' . str_replace(
				['/', '*'],
				['\/', '.*'],
				$pattern
			) . '$/';

		return (bool) preg_match($regex, $path);
	}

	/**
	 * Process a single package.
	 */
	private function processPackage(string $path, array $options): void
	{
		$this->log("  Processing: {$path}");

		$sourcePath = $this->vendorDir . '/' . $path;
		$targetPath = $this->outputDir . '/' . $path;

		if (! is_dir($sourcePath)) {
			$this->log("    Warning: Package not found, skipping");
			return;
		}

		// Copy package files
		$this->copyDirectory($sourcePath, $targetPath);

		// Apply namespace transformations
		$replace = $options['replace'] ?? null;

		$this->prefixPackageNamespaces($targetPath, $replace);
	}

	/**
	 * Prefix namespaces in all PHP files within a package.
	 */
	private function prefixPackageNamespaces(string $packagePath, ?string $replace): void
	{
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator(
				$packagePath,
				FilesystemIterator::SKIP_DOTS
			)
		);

		foreach ($files as $file) {
			if ($file->isFile() && $file->getExtension() === 'php') {
				$this->prefixFile($file->getPathname(), $replace);
			}
		}
	}

	/**
	 * Prefix namespaces in a single file.
	 */
	private function prefixFile(string $filePath, ?string $replace): void
	{
		$contents = file_get_contents($filePath);

		// Only perform search/replace if configured
		if ($replace) {
			$pattern = '/\b' . preg_quote(rtrim($replace, '\\'), '/') . '\\\\/';
			$contents = preg_replace($pattern, $this->prefix . '\\', $contents);
			file_put_contents($filePath, $contents);
		}
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
