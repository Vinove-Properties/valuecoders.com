<?php

namespace WebpConverter\Error\Notice;

/**
 * {@inheritdoc}
 */
class PathUploadsUnavailableNotice implements NoticeInterface {

	const ERROR_KEY = 'path_uploads_unavailable';

	/**
	 * {@inheritdoc}
	 */
	public function get_key(): string {
		return self::ERROR_KEY;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_message(): array {
		return [
			sprintf(
			/* translators: %1$s: filter name, %2$s: server path, %3$s: open anchor tag, %4$s: close anchor tag */
				__( 'The path for /uploads files does not exist (the is_dir() function returns false). Use the %1$s filter to set the correct path. The current path is: %2$s. Please, read %3$sthe plugin FAQ%4$s to learn more.', 'webp-converter-for-media' ),
				'<strong>webpc_dir_path</strong>',
				'<strong>' . apply_filters( 'webpc_dir_path', '', 'uploads' ) . '</strong>',
				'<a href="https://url.mattplugins.com/converter-error-path-uploads-unavailable-faq" target="_blank">',
				'</a>'
			),
		];
	}
}
