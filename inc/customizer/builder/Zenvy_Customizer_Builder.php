<?php
/**
 * Zenvy Customizer Builder
 *
 * @package Zenvy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'zenvy_sanitize_field_recursive' ) ) {

    function zenvy_sanitize_field_recursive( $value ) {
        if ( ! is_array( $value ) ) {
            $value = wp_kses_post( $value );
        } else {
            if ( is_array( $value ) ) {
                foreach ( $value as $k => $v ) {
                    $value[ $k ] = zenvy_sanitize_field_recursive( $v );
                }
            }
        }
        return $value;
    }
}

if ( ! function_exists( 'zenvy_sanitize_field' ) ) {

    function zenvy_sanitize_field( $input ) {
        $input = wp_unslash( $input );
        if ( ! is_array( $input ) ) {
            $input = json_decode( urldecode_deep( $input ), true );
        }
        $output = zenvy_sanitize_field_recursive( $input );
        $output = json_encode( $output );
        return $output;
    }
}

/**
 * Add Builder to WP Customize
 *
 * Class Zenvy_Customizer_Builder
 */
class Zenvy_Customizer_Builder {

    /**
     * Main Instance
     *
     * Insures that only one instance of Zenvy_Customizer_Builder exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     *
     *
     *
     * @return object
     */
    public static function instance() {

        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been ran previously
        if ( null === $instance ) {
            $instance = new Zenvy_Customizer_Builder;
        }

        // Always return the instance
        return $instance;
    }

    /**
     * Run functionality with hooks
     *
     *
     *
     * @return void
     */
    function run() {

        if ( is_admin() ) {
            add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) );
            add_action( 'customize_controls_print_footer_scripts', array( $this, 'builder_template' ) );
        }

    }

    /**
     * Get all builders registered.
     *
     * Insures that every builder is registered by zenvy_builders filter
     *
     *
     *
     * @return array
     */
    public function get_builders() {
        $builders = array();
        $builders = apply_filters( 'zenvy_builders', $builders );
        return $builders;
    }

    /**
     * Callback functions for customize_controls_enqueue_scripts,
     * Enqueue script and style for builder
     *
     *
     *
     * @return void
     */
    function enqueue() {

        // Enqueue customizer styles.
        wp_enqueue_style(
            'customizer-builder',
            ZENVY_THEME_URI . 'assets/build/css/customize-builder.css',
            array(),
            ZENVY_THEME_VERSION,
            'all'
        );

        wp_enqueue_script(
            'customizer-builder',
            ZENVY_THEME_URI . 'assets/build/js/customize-builder.js',
            [
                'customize-controls',
                'jquery-ui-droppable'
            ],
            ZENVY_THEME_VERSION,
            true
        );

        wp_localize_script(
            'customizer-builder',
            'Zenvy_Customizer_Builder',
            array(
                'footer_moved_widgets_text' => '',
                'builders'                  => $this->get_builders(),
                'desktop_label'             => esc_html__( 'Desktop', 'zenvy' ),
                'mobile_tablet_label'       => esc_html__( 'Mobile/Tablet', 'zenvy' ),
            )
        );
    }



    /**
     * Callback functions for customize_controls_print_footer_scripts,
     * Add Builder Template
     *
     * @access   public
     *
     * @return void
     */
    function builder_template() {

        require ZENVY_THEME_DIR . 'inc/customizer/builder/header/views/builder-template.php';
    }
}

if ( ! function_exists( 'zenvy_customizer_builder' ) ) {

    function zenvy_customizer_builder() {

        return Zenvy_Customizer_Builder::instance();
    }
    zenvy_customizer_builder()->run();
}
