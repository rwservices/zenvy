<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WooCommerce Header Cart Header Customizer Options
 * @package Zenvy
 */

if ( ! class_exists( 'Zenvy_WooCommerce_Cart_Header' ) ) :

    class Zenvy_WooCommerce_Cart_Header {

        /**
         * Panel ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $element = 'wc_cart';

        /**
         * Main Instance
         *
         * Insures that only one instance of Zenvy_WooCommerce_Cart_Header exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         *
         * @since    1.0.0
         * @access   public
         *
         * @return object
         */
        public static function instance() {

            // Store the instance locally to avoid private static replication
            static $instance = null;

            // Only run these methods if they haven't been ran previously
            if ( null === $instance ) {
                $instance = new Zenvy_WooCommerce_Cart_Header;
            }

            // Always return the instance
            return $instance;
        }

        /**
         *  Run functionality with hooks
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function run() {

            add_filter( 'Zenvy_Customizer_Header_Builder_items', array( $this, 'add_zenvy_header_builder_item' ) );
            add_action( 'customize_register', array( $this, 'customize_register' ), 3 );
            add_filter( 'zenvy_get_template_part', array( $this, 'get_template_part' ), 10, 2 );
        }

        /**
         * Add Item on Header Builder.
         *
         * @param $zenvy_header_builder_item
         * @return array
         * @since    1.0.0
         */
        public function add_zenvy_header_builder_item( $zenvy_header_builder_item ) {
            $zenvy_header_builder_item[ $this->element ] = array(
                'icon'    => 'dashicons dashicons-cart',
                'name'    => esc_html__( 'Cart', 'zenvy' ),
                'id'      => $this->element,
                'section' => $this->element,
            );

            return $zenvy_header_builder_item;
        }

        /**
         * Callback functions for customize_register
         *
         * @since    1.0.2
         * @access   public
         *
         * @param WP_Customize_Manager $wp_customize
         * @return void
         */
        public function customize_register( $wp_customize ) {

            $wp_customize->add_section(
                Zenvy_WooCommerce_Cart_Header()->element,
                array(
                    'title'    => esc_html__( 'WC Cart', 'zenvy' ),
                    'priority' => 80,
                    'panel'    => Zenvy_Customizer_Header_Builder()->panel,
                )
            );
            require ZENVY_THEME_DIR  . 'inc/customizer/builder/header/options/woocommerce/cart/Zenvy_Customize_Header_WooCommerce_Cart_Fields.php';
        }

        /**
         * Load template part
         *
         * @param $template
         * @param $id
         * @return void
         * @since    1.0.0
         */
        function get_template_part( $template, $id ) {
            if ( ! $template && file_exists( ZENVY_THEME_DIR . "/template-parts/header/woocommerce/{$id}.php" ) ) {
                $template = ZENVY_THEME_DIR . "/template-parts/header/woocommerce/{$id}.php";
            }
            return $template;
        }
    }
endif;

/**
 * Create Instance for Zenvy_WooCommerce_Cart_Header
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if ( ! function_exists( 'Zenvy_WooCommerce_Cart_Header' ) ) {

    function Zenvy_WooCommerce_Cart_Header() {
        return Zenvy_WooCommerce_Cart_Header::instance();
    }
    if( Zenvy_Helper::is_woocommerce() ){
        Zenvy_WooCommerce_Cart_Header()->run();
    }
}
