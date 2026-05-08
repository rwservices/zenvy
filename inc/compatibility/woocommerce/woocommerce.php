<?php
/**
 * WooCommerce Compatibility File
 *
 *
 * @package Zenvy
 */

if ( ! class_exists( 'Zenvy_WooCommerce' ) ) :

	class Zenvy_WooCommerce {

		/**
		 * Main Instance
		 *
		 * Insures that only one instance of Zenvy_WooCommerce exists in memory at any one
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
				$instance = new Zenvy_WooCommerce;
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
			if ( Zenvy_Helper::is_woocommerce() ) {

                // Load required files
                $this->load_file();

                // WooCommerce setup function
                add_action('after_setup_theme', array($this, 'woocommerce_setup'));

                // WooCommerce specific scripts & stylesheets
                add_action('wp_enqueue_scripts', array($this, 'woocommerce_scripts'));

                // Add 'woocommerce-active' class to the body tag.
                add_filter('body_class', array($this, 'woocommerce_body_class'));

                /*https://gist.github.com/mikejolley/2044109*/
                add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'cart_fragment' ), 10, 1 );

                /**
                 * Remove WooCommerce Default hooks
                 */
                add_filter( 'woocommerce_show_page_title', '__return_null' );
                remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

                /**
                 * Woocommerce tabs titles
                 */
                add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );
                add_filter( 'woocommerce_product_description_heading', '__return_false' );

                /**
                 * Shop Page action
                 */
                add_action('woocommerce_before_shop_loop', array($this, 'products_results_ordering_before'), 19 );
                add_action('woocommerce_before_shop_loop', array($this, 'products_results_ordering_after'), 31 );

                /**
                 * Checkout Page action
                 */
                add_action('woocommerce_checkout_before_order_review_heading', array($this, 'wrap_order_review_before'), 5 );
                add_action('woocommerce_checkout_after_order_review', array($this, 'wrap_order_review_after'), 15 );




                /**
                 * Single Product filters
                 */
                add_action('woocommerce_before_single_product_summary', array($this, 'single_product_wrap_before'), -99 );
                add_action('woocommerce_after_single_product_summary', array($this, 'single_product_wrap_after'), 9 );

                add_filter('woocommerce_output_related_products_args', array($this, 'woocommerce_related_products_args'), 10);
                add_filter('woocommerce_upsell_display_args', array($this, 'woocommerce_upsell_display_args'), 10);
            }

		}

        /**
         *  Load required files
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function load_file() {
            require ZENVY_THEME_DIR . 'inc/customizer/builder/header/options/woocommerce/cart/Zenvy_WooCommerce_Cart_Header.php';
        }

        /**
         * WooCommerce setup function.
         *
         * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
         * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
         * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
         *
         * @return void
         */
        public function woocommerce_setup() {
            add_theme_support(
                'woocommerce',
                array(
                    'thumbnail_image_width' => 420,
                    'single_image_width'    => 800,
                    'product_grid'          => array(
                        'default_rows'    => 3,
                        'min_rows'        => 1,
                        'default_columns' => 3,
                        'min_columns'     => 1,
                        'max_columns'     => 4,
                    )
                )
            );
            add_theme_support( 'wc-product-gallery-zoom' );
            add_theme_support( 'wc-product-gallery-lightbox' );
            add_theme_support( 'wc-product-gallery-slider' );
        }


        /**
         * WooCommerce specific scripts & stylesheets.
         *
         * @return void
         */
        public function woocommerce_scripts() {

            wp_enqueue_style( 'zenvy-woocommerce', ZENVY_THEME_URI . 'assets/build/css/woocommerce' . ZENY_RTL_SUFFIX . '.css', null, ZENVY_THEME_VERSION, 'all' );
        }

        /**
         * Add 'woocommerce-active' class to the body tag.
         *
         * @param  array $classes CSS classes applied to the body tag.
         * @return array $classes modified to include 'woocommerce-active' class.
         */
        public function woocommerce_body_class( $classes ) {
            $classes[] = 'woocommerce-active';
            return $classes;
        }

        /**
         * Cart Fragments.
         *
         * Ensure cart contents update when products are added to the cart via AJAX.
         *
         * @param array $fragments Fragments to refresh via AJAX.
         * @return array Fragments to refresh via AJAX.
         */
        public function cart_fragment( $fragments ) {
            ob_start();
            ?>
            <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
            <?php
            $fragments['span.cart-value'] = ob_get_clean();
            return $fragments;
        }

        /**
         * Related Products Args.
         *
         * @param array $args related products args.
         * @return array $args related products args.
         */
        public function woocommerce_related_products_args( $args ) {
            $defaults    = [];
            $defaults['columns']        = 3;
            $defaults['posts_per_page'] = 3;

            $args = wp_parse_args( $defaults, $args );

            return $args;
        }

        /**
         * Upsell Products Args.
         *
         * @param array $args upsell products args.
         * @return array $args upsell products args.
         */
        public function woocommerce_upsell_display_args( $args )
        {
            $defaults = [];
            $defaults['columns'] = 3;
            $defaults['posts_per_page'] = 3;

            $args = wp_parse_args($defaults, $args);

            return $args;

        }

        /**
         * Yith Wishlist ajax to update count
         *
         */
        public function yith_wcwl_ajax_update_count() {
            wp_send_json( array(
                'count' => yith_wcwl_count_all_products()
            ) );
        }

        /**
         * Shop page search and result before
         *
         */
        public function products_results_ordering_before() {
            echo '<div class="d-flex justify-content-between align-items-center woocommerce-sorting-wrapper">';
        }

        /**
         * Shop page search and result after
         *
         */
        public function products_results_ordering_after() {
            echo '</div><!-- .woocommerce-sorting-wrapper -->';
        }

        /**
         * Checkout wrapper
         */
        public function wrap_order_review_before() {
            echo '<div class="checkout-wrapper">';
        }

        /**
         * Checkout wrapper end
         */
        public function wrap_order_review_after() {
            echo '</div><!-- .checkout-wrapper -->';
        }

        /**
         * Single product top area wrapper
         */
        public function single_product_wrap_before() {
            echo '<div class="d-flex product-gallery-summary gallery-default">';
        }

        /**
         * Single product top area wrapper
         */
        public function single_product_wrap_after() {
            echo '</div><!-- .product-gallery-summary -->';
        }
	}
endif;

/**
 * Create Instance for Zenvy_WooCommerce
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if ( ! function_exists( 'Zenvy_WooCommerce' ) ) {

	function Zenvy_WooCommerce() {

		return Zenvy_WooCommerce::instance();
	}

	Zenvy_WooCommerce()->run();
}