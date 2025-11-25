<?php

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
 */
final class StylesheetDiscovery implements Iterator
{
	private Iterator $iterator;
	private ?Stylesheet $current = null;

	public function __construct(protected readonly string $path)
	{
		$this->iterator = $this->createIterator();
	}

	public function current(): ?Stylesheet
	{
		return $this->current;
	}

	public function key(): mixed
	{
		return $this->iterator->key();
	}

	public function next(): void
	{
		$this->iterator->next();
		$this->updateCurrent();
	}

	public function rewind(): void
	{
		$this->iterator->rewind();
		$this->updateCurrent();
	}

	public function valid(): bool
	{
		return $this->iterator->valid() && $this->current !== null;
	}

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

	private function updateCurrent(): void
	{
		if ($this->iterator->valid()) {
			$file = $this->iterator->current();
			$this->current = new Stylesheet($file, $this->path);
		} else {
			$this->current = null;
		}
	}
}
