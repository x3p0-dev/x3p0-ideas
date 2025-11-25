<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Stylesheet;

use SplFileInfo;

/**
 * Represents a discovered block stylesheet with its metadata.
 */
final class Stylesheet
{
	private readonly string $namespace;
	private readonly string $slug;
	private readonly string $path;

	public function __construct(SplFileInfo $file, string $path)
	{
		$this->namespace = $file->getPathInfo()->getBasename();
		$this->slug      = $file->getBasename('.css');
		$this->path      = "{$path}/{$this->namespace}/{$this->slug}";
	}

	public function getNamespace(): string
	{
		return $this->namespace;
	}

	public function getSlug(): string
	{
		return $this->slug;
	}

	public function getBlockName(): string
	{
		return "{$this->namespace}/{$this->slug}";
	}

	public function getPath(): string
	{
		return $this->path;
	}

	public function getFilePath(): string
	{
		return get_parent_theme_file_path("{$this->path}.css");
	}

	public function getFileUrl(): string
	{
		return get_parent_theme_file_uri("{$this->path}.css");
	}

	public function hasAssetFile(): bool
	{
		return file_exists(get_parent_theme_file_path("{$this->path}.asset.php"));
	}

	public function getAssetData(): array
	{
		return include get_parent_theme_file_path("{$this->path}.asset.php");
	}
}
