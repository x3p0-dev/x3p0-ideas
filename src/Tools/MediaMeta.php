<?php

/**
 * Media Metadata tool.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2008-2024 Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools;

use WP_Post;

/**
 * Simplifies the process of getting media metadata, which core WordPress has no
 * standardized methods for handling. This class allows you to get the metadata
 * for a single attachment post and output meta values by key.
 */
class MediaMeta
{
	/**
	 * Maps specific keys to their rendering methods.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const KEY_METHODS = [
		'aperture'          => 'aperture',
		'created_timestamp' => 'createdTimestamp',
		'dimensions'        => 'dimensions',
		'file_name'         => 'fileName',
		'file_size'         => 'fileSize',
		'focal_length'      => 'focalLength',
		'lyrics'            => 'lyrics',
		'mime_type'         => 'mimeType',
		'shutter_speed'     => 'shutterSpeed'
	];

	/**
	 * Stores the raw attachment metadata.
	 */
	private array $raw = [];

	/**
	 * Stores all copies of the meta that has been searched for. If found,
	 * the value is formatted and escaped. Else, it is an empty string.
	 */
	private array $meta = [];

	/**
	 * Sets up the new media metadata object.
	 */
	public function __construct(protected ?WP_Post $post)
	{
		// If we have a valid attachment post object, get the metadata.
		if (
			$this->post instanceof WP_Post
			&& 'attachment' === get_post_type($this->post)
		) {
			$this->raw = wp_get_attachment_metadata($this->post->ID);
		}
	}

	/**
	 * Checks if the metadata exists for the attachment.
	 */
	public function has(string $key): bool
	{
		return isset($this->meta[ $key ])
			? ! empty($this->meta[ $key ])
			: boolval($this->render($key));
	}

	/**
	 * Displays the formatted and escaped metadata.
	 */
	public function display(string $key): void
	{
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $this->render($key);
	}

	/**
	 * Returns the escaped and formatted media meta.
	 */
	public function render(string $key): string
	{
		// If the meta has already been formatted, return it early.
		if (isset($this->meta[ $key ])) {
			return $this->meta[ $key ];
		}

		// If the meta key is mapped to a specific method, return the
		// method value.
		if (isset(self::KEY_METHODS[ $key ])) {
			$method = self::KEY_METHODS[ $key ];

			return $this->meta[ $key ] = $this->$method($key);
		}

		// Escape and return the raw meta value.
		return $this->meta[ $key ] = esc_html($this->get($key));
	}

	/**
	 * Internal function for checking if the raw metadata exists. Use the
	 * public `has()` method for checking in external scripts.
	 */
	protected function exists(string $key, string $type = ''): bool
	{
		return match ($type) {
			'image' => isset($this->raw['image_meta'][ $key ]),
			'audio' => isset($this->raw['audio'][ $key ]),
			default => isset($this->raw[ $key ])
		};
	}

	/**
	 * Returns the raw value from the media meta.
	 */
	public function get(string $key): string
	{
		if ($this->exists($key)) {
			return strval($this->raw[ $key ]);
		} elseif ($this->exists($key, 'image')) {
			return strval($this->raw['image_meta'][ $key ]);
		} elseif ($this->exists($key, 'audio')) {
			return strval($this->raw['audio'][ $key ]);
		}

		return '';
	}

	/**
	 * Returns the camera aperture for an image.
	 */
	protected function aperture(): string
	{
		if (! $aperture = $this->get('aperture')) {
			return '';
		}

		return sprintf(
			'<sup>f</sup>&#8260;<sub>%s</sub>',
			absint($aperture)
		);
	}

	/**
	 * Returns the created timestamp for an image.
	 */
	protected function createdTimestamp(): string
	{
		if (! $timestamp = $this->get('created_timestamp')) {
			return '';
		}

		return esc_html(wp_date(
			get_option('date_format'),
			intval($timestamp)
		));
	}

	/**
	 * Returns the media dimensions (width/height).
	 */
	protected function dimensions(): string
	{
		$width  = absint($this->get('width'));
		$height = absint($this->get('height'));

		return ! $width || ! $height ? '' : esc_html(sprintf(
			// Translators: Media dimensions - 1 is width and 2 is height.
			__('%1$s &#215; %2$s', 'x3p0-ideas'),
			number_format_i18n($width),
			number_format_i18n($height)
		));
	}

	/**
	 * Returns the media file name, linked to the original media file.
	 */
	protected function fileName(): string
	{
		$filename = basename(get_attached_file($this->post->ID));

		return $filename ? esc_html($filename) : '';
	}

	/**
	 * Returns the media file size.
	 */
	protected function fileSize(): string
	{
		if (! $filesize = $this->get('filesize')) {
			$file = get_attached_file($this->post->ID);

			if (file_exists($file)) {
				$filesize = filesize($file);
			}
		}

		if (! $filesize) {
			return '';
		}

		// Note that `size_format()` can return a string or false.
		// @link https://developer.wordpress.org/reference/functions/size_format/
		$size = size_format(absint($filesize), 2);

		return $size ? esc_html($size) : '';
	}

	/**
	 * Returns the camera focal length for an image.
	 */
	protected function focalLength(): string
	{
		if (! $focal = $this->get('focal_length')) {
			return '';
		}

		return sprintf(
			// Translators: %s is the focal length of a camera.
			esc_html__('%s mm', 'x3p0-ideas'),
			absint($focal)
		);
	}

	/**
	 * Returns the lyrics for an audio file.
	 */
	protected function lyrics(): string
	{
		if ($lyrics = $this->get('unsynchronised_lyric')) {
			$lyrics = wp_strip_all_tags($lyrics);
			$lyrics = wptexturize($lyrics);
			$lyrics = convert_chars($lyrics);
			$lyrics = wpautop($lyrics);
		}

		return $lyrics;
	}

	/**
	 * Returns the media file mime type.
	 */
	protected function mimeType(): string
	{
		if (! $mime_type = get_post_mime_type($this->post)) {
			$mime_type = $this->get('mime_type');
		}

		return $mime_type ? esc_html($mime_type) : '';
	}

	/**
	 * Returns the camera shutter speed for an image.
	 */
	protected function shutterSpeed(): string
	{
		if (! $shutter = $this->get('shutter_speed')) {
			return '';
		}

		$shutter = $speed = floatval(wp_strip_all_tags($shutter));

		if ((1 / $speed) > 1) {
			$num_float   = number_format((1 / $speed), 1);
			$num_integer = number_format((1 / $speed), 0);

			$formatted_num = $num_float === $num_integer
				? number_format_i18n((1 / $speed), 0, '.', '')
				: number_format_i18n((1 / $speed), 1, '.', '');

			$shutter = sprintf(
				'<sup>%s</sup>&#8260;<sub>%s</sub>',
				esc_html(number_format_i18n(1)),
				esc_html($formatted_num)
			);
		}

		return sprintf(
			// Translators: %s is the shutter speed of a camera.
			esc_html__('%s sec', 'x3p0-ideas'),
			$shutter
		);
	}
}
