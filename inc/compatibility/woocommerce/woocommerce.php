<?php
/**
 * WooCommerce Compatibility File
 *
 * @package Zenvy
 */

if ( ! class_exists( 'Zenvy_WooCommerce' ) ) :

	/**
	 * Class Zenvy_WooCommerce
	 *
	 * Handles WooCommerce compatibility for the Zenvy theme.
	 */
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

			// Store the instance locally to avoid private static replication.
			static $instance = null;

			// Only run these methods if they haven't been ran previously.
			if ( null === $instance ) {
				$instance = new Zenvy_WooCommerce();
			}

			// Always return the instance.
			return $instance;
		}

		/**
		 * Run functionality with hooks.
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return void
		 */
		public function run() {
			if ( Zenvy_Helper::is_woocommerce() ) {

				// Load required files.
				$this->load_file();

				// WooCommerce setup function.
				add_action( 'after_setup_theme', [ $this, 'woocommerce_setup' ] );

				// WooCommerce specific scripts & stylesheets.
				add_action( 'wp_enqueue_scripts', [ $this, 'woocommerce_scripts' ] );

				// Add 'woocommerce-active' class to the body tag.
				add_filter( 'body_class', [ $this, 'woocommerce_body_class' ] );

				// See https://gist.github.com/mikejolley/2044109.
				add_filter( 'woocommerce_add_to_cart_fragments', [ $this, 'cart_fragment' ], 10, 1 );

				/**
				 * Remove WooCommerce Default hooks.
				 */
				add_filter( 'woocommerce_show_page_title', '__return_null' );

				add_action( 'woocommerce_before_main_content', [ $this, 'woocommerce_output_content_wrapper' ], 5 );
				add_action( 'zenvy_sidebar_after', [ $this, 'woocommerce_output_content_wrapper_end' ], 9999 );
				remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

				/**
				 * WooCommerce tabs titles.
				 */
				add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );
				add_filter( 'woocommerce_product_description_heading', '__return_false' );

				/**
				 * Shop Page action.
				 */
				add_filter(
					'loop_shop_columns',
					function () {
						return 3;
					}
				);

				add_action( 'woocommerce_before_shop_loop', [ $this, 'products_results_ordering_before' ], 19 );
				add_action( 'woocommerce_before_shop_loop', [ $this, 'products_results_ordering_after' ], 31 );

				/**
				 * Checkout Page action.
				 */
				add_action( 'woocommerce_checkout_before_order_review_heading', [ $this, 'wrap_order_review_before' ], 5 );
				add_action( 'woocommerce_checkout_after_order_review', [ $this, 'wrap_order_review_after' ], 15 );

				/**
				 * Single Product filters.
				 */
				add_action( 'woocommerce_before_single_product_summary', [ $this, 'single_product_wrap_before' ], -99 );
				add_action( 'woocommerce_after_single_product_summary', [ $this, 'single_product_wrap_after' ], 9 );

				add_filter( 'woocommerce_output_related_products_args', [ $this, 'woocommerce_related_products_args' ], 10 );
				add_filter( 'woocommerce_upsell_display_args', [ $this, 'woocommerce_upsell_display_args' ], 10 );
			}
		}

		/**
		 * Output the opening woocommerce content wrapper.
		 *
		 * @return void
		 */
		public function woocommerce_output_content_wrapper() {
			echo '<section class="page-wrapper">';
			echo '<div class="container d-flex flex-wrap">';
		}

		/**
		 * Output the closing woocommerce content wrapper.
		 *
		 * @return void
		 */
		public function woocommerce_output_content_wrapper_end() {
			echo '</div><!-- .container -->';
			echo '</section><!-- .page-wrapper -->';
		}

		/**
		 * Load required files.
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return void
		 */
		public function load_file() {
			require ZENVY_THEME_DIR . 'inc/customizer/builder/header/options/woocommerce/cart/class-zenvy-woocommerce-cart-header.php';
			require ZENVY_THEME_DIR . 'inc/customizer/builder/header/options/woocommerce/cart/functions-zenvy-woocommerce-cart-header.php';
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
				[
					'thumbnail_image_width' => 420,
					'single_image_width'    => 800,
					'product_grid'          => [
						'default_rows'    => 3,
						'min_rows'        => 1,
						'default_columns' => 3,
						'min_columns'     => 1,
						'max_columns'     => 4,
					],
				]
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
			wp_enqueue_style( 'zenvy-woocommerce', ZENVY_THEME_URI . 'assets/build/css/woocommerce' . ZENVY_RTL_SUFFIX . '.css', null, ZENVY_THEME_VERSION, 'all' );
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
			$defaults                   = [];
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
		public function woocommerce_upsell_display_args( $args ) {
			$defaults                   = [];
			$defaults['columns']        = 3;
			$defaults['posts_per_page'] = 3;

			$args = wp_parse_args( $defaults, $args );

			return $args;
		}

		/**
		 * Yith Wishlist ajax to update count.
		 *
		 * @return void
		 */
		public function yith_wcwl_ajax_update_count() {
			wp_send_json(
				[
					'count' => yith_wcwl_count_all_products(),
				]
			);
		}

		/**
		 * Shop page search and result before.
		 *
		 * @return void
		 */
		public function products_results_ordering_before() {
			echo '<div class="d-flex justify-content-between align-items-center woocommerce-sorting-wrapper">';
		}

		/**
		 * Shop page search and result after.
		 *
		 * @return void
		 */
		public function products_results_ordering_after() {
			echo '</div><!-- .woocommerce-sorting-wrapper -->';
		}

		/**
		 * Checkout wrapper.
		 *
		 * @return void
		 */
		public function wrap_order_review_before() {
			echo '<div class="checkout-wrapper">';
		}

		/**
		 * Checkout wrapper end.
		 *
		 * @return void
		 */
		public function wrap_order_review_after() {
			echo '</div><!-- .checkout-wrapper -->';
		}

		/**
		 * Single product top area wrapper.
		 *
		 * @return void
		 */
		public function single_product_wrap_before() {
			echo '<div class="d-flex product-gallery-summary gallery-default">';
		}

		/**
		 * Single product top area wrapper end.
		 *
		 * @return void
		 */
		public function single_product_wrap_after() {
			echo '</div><!-- .product-gallery-summary -->';
		}
	}

endif;

if ( ! function_exists( 'zenvy_woocommerce_instance' ) ) {

	/**
	 * Returns the main instance of Zenvy_WooCommerce.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	function zenvy_woocommerce_instance() {
		return Zenvy_WooCommerce::instance();
	}

	zenvy_woocommerce_instance()->run();
}