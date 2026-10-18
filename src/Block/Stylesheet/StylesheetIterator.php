<?php

/**
 * Stylesheet iterator.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Stylesheet;

use CallbackFilterIterator;
use EmptyIterator;
use FilesystemIterator;
use Iterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * Discovers and iterates through block stylesheet files.
 *
 * This class provides an iterator implementation that recursively searches a
 * specified directory path for CSS files and wraps them in Stylesheet objects.
 * It implements the Iterator interface, allowing it to be used in foreach loops
 * and other iteration contexts.
 *
 * The discovery process filters for valid CSS files only and automatically
 * resolves the path relative to the parent theme directory. If the specified
 * path doesn't exist, an empty iterator is returned.
 */
final class StylesheetIterator implements Iterator
{
	/**
	 * The internal iterator for traversing CSS files.
	 */
	private readonly Iterator $iterator;

	/**
	 * The current Stylesheet object in the iteration.
	 */
	private ?Stylesheet $current = null;

	/**
	 * Sets up the stylesheet discovery iterator. Initializes the discovery
	 * process for the given path by creating a recursive file iterator that
	 * will search for CSS files.
	 */
	public function __construct(protected readonly string $path)
	{
		$this->iterator = $this->createIterator();
	}

	/**
	 * Returns the current Stylesheet object.
	 */
	public function current(): ?Stylesheet
	{
		return $this->current;
	}

	/**
	 * Returns the key of the current iterator position.
	 */
	public function key(): mixed
	{
		return $this->iterator->key();
	}

	/**
	 * Moves to the next CSS file in the directory tree and updates the
	 * current Stylesheet object.
	 */
	public function next(): void
	{
		$this->iterator->next();
		$this->updateCurrent();
	}

	/**
	 * Resets the iterator to the beginning and sets the current Stylesheet
	 * to the first CSS file found.
	 */
	public function rewind(): void
	{
		$this->iterator->rewind();
		$this->updateCurrent();
	}

	/**
	 * Returns true if both the internal iterator is valid and a current
	 * Stylesheet object exists.
	 */
	public function valid(): bool
	{
		return $this->iterator->valid() && $this->current !== null;
	}

	/**
	 * Builds a recursive directory iterator that searches the specified path
	 * for CSS files. If the path doesn't exist, returns an empty iterator.
	 * The iterator is wrapped in a CallbackFilterIterator that only includes
	 * files with a .css extension.
	 */
	private function createIterator(): Iterator
	{
		$path = get_parent_theme_file_path($this->path);

		if (! is_dir($path)) {
			return new EmptyIterator();
		}

		$iterator = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator(
				$path,
				FilesystemIterator::SKIP_DOTS
			)
		);

		return new CallbackFilterIterator(
			$iterator,
			fn($file) => $file instanceof SplFileInfo
				&& $file->isFile()
				&& $file->getExtension() === 'css'
		);
	}

	/**
	 * If the iterator is at a valid position, creates a new Stylesheet
	 * object from the current file. Otherwise, sets current to null.
	 */
	private function updateCurrent(): void
	{
		if ($this->iterator->valid()) {
			$file = $this->iterator->current();
			$this->current = new Stylesheet($file, $this->path);
			return;
		}

		$this->current = null;
	}
}
