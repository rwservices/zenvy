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
        $plugins = array(
            array(
                'name'     => esc_html__( 'Aarambha Demo Sites', 'zenvy' ),
                'slug'     => 'aarambha-demo-sites',
                'required' => false,
            ),
			array(
				'name'     => esc_html__( 'Crucial Real Estate', 'zenvy' ),
				'slug'     => 'crucial-real-estate',
				'required' => false,
			)
        );

        $config = array();

        tgmpa( $plugins, $config );
	}

endif;

add_action( 'tgmpa_register', 'zenvy_recommended_plugins' );
