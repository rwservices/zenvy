<?php
/**
 * Plugin recommendation
 *
 * @package Zenvy
 */

// Load TGM library.
require ZENVY_THEME_DIR . 'inc/tgm/class-tgm-plugin-activation.php';

if ( ! function_exists( 'zenvy_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function zenvy_recommended_plugins() {
		$plugins = [
			[
				'name'     => esc_html__( 'Aarambha Demo Sites', 'zenvy' ),
				'slug'     => 'aarambha-demo-sites',
				'required' => false,
			],
			[
				'name'     => esc_html__( 'Crucial Real Estate', 'zenvy' ),
				'slug'     => 'crucial-real-estate',
				'required' => false,
			],
		];

		$config = [];

		tgmpa( $plugins, $config );
	}

endif;

add_action( 'tgmpa_register', 'zenvy_recommended_plugins' );
