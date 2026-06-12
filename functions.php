<?php

/**
 * Zenvy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zenvy
 */

/**
 * Zenvy only works in WordPress 5.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Define Constants
 */
if ( ! defined( 'ZENVY_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ZENVY_THEME_VERSION', '1.0.0' );
}
if ( ! defined( 'ZENVY_THEME_DIR' ) ) {
	define( 'ZENVY_THEME_DIR', trailingslashit( get_template_directory() ) );
}
if ( ! defined( 'ZENVY_THEME_URI' ) ) {
	define( 'ZENVY_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
}
if ( ! defined( 'ZENVY_RTL_SUFFIX' ) ) {
	define( 'ZENVY_RTL_SUFFIX', ( is_rtl() ) ? '-rtl' : '' );
}

if ( ! function_exists( 'zenvy_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zenvy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Zenvy, use a find and replace
		 * to change 'zenvy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'zenvy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'featured_post', 330, 440, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			[
				'primary-menu' => esc_html__( 'Primary Menu', 'zenvy' ),
				'mobile-menu'  => esc_html__( 'Mobile Menu', 'zenvy' ),
				'footer-menu'  => esc_html__( 'Footer Menu', 'zenvy' ),
			]
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			[
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);

		// Add support for page excerpt
		add_post_type_support( 'page', 'excerpt' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}

endif;
add_action( 'after_setup_theme', 'zenvy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zenvy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zenvy_content_width', 640 );
}

add_action( 'after_setup_theme', 'zenvy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zenvy_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'zenvy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'zenvy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Front Page:Latest Posts', 'zenvy' ),
			'id'            => 'sidebar-latest-posts',
			'description'   => esc_html__( 'Add widgets for Latest Posts Section sidebar here.', 'zenvy' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
	register_sidebar(
		[
			'name'          => esc_html__( 'Front Page: Trending Posts', 'zenvy' ),
			'id'            => 'sidebar-trending-posts',
			'description'   => esc_html__( 'Add widgets for Trending Posts Section sidebar here.', 'zenvy' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '',
		]
	);

	for ( $sidebar = 1; $sidebar <= 6; $sidebar++ ) {
		register_sidebar(
			[
				'name'          => sprintf( esc_html__( 'Footer Sidebar %d ', 'zenvy' ), absint( $sidebar ) ),
				'id'            => 'footer-sidebar-' . absint( $sidebar ),
				'description'   => esc_html__( 'Display widgets footer section of the site.', 'zenvy' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]
		);
	}
}

add_action( 'widgets_init', 'zenvy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zenvy_scripts() {

	// Font Awesome Style
	wp_enqueue_style( 'fontawesome', ZENVY_THEME_URI . 'assets/build/library/all.min.css', [], '6.1.1' );

	// MeanMenu Style
	wp_enqueue_style( 'meanmenu', ZENVY_THEME_URI . 'assets/build/library/meanmenu.min.css', [], '2.0.7' );

	// Theme Style
	wp_enqueue_style( 'zenvy-style', get_stylesheet_uri(), [], ZENVY_THEME_VERSION );

	// Main Style
	wp_enqueue_style( 'zenvy-main-style', ZENVY_THEME_URI . 'assets/build/css/main.css', null, ZENVY_THEME_VERSION, 'all' );

	// Responsive Style
	wp_enqueue_style( 'zenvy-responsive', ZENVY_THEME_URI . 'assets/build/css/responsive.css', null, ZENVY_THEME_VERSION, 'all' );

	// Add output of Customizer settings as inline style.
	wp_add_inline_style( 'zenvy-main-style', Zenvy_Customizer_Inline_Style::css_output( 'front-end' ) );

	// Enqueue Owl Carousel Style
	wp_enqueue_style( 'owl-carousel', ZENVY_THEME_URI . 'assets/build/library/owl.carousel.css', [], '2.3.4' );
	wp_enqueue_style( 'owl-carousel-theme', ZENVY_THEME_URI . 'assets/build/library/owl.theme.default.css', [], '2.3.4' );

	// Enqueue Owl Carousel Js
	wp_enqueue_script( 'owl-carousel', ZENVY_THEME_URI . 'assets/build/library/owl.carousel.min.js', [ 'jquery' ], '2.3.4', true );

	// Enqueue MeanMenu Js
	wp_enqueue_script( 'meanmenu', ZENVY_THEME_URI . 'assets/build/library/jquery.meanmenu.min.js', [ 'jquery' ], '2.0.8', true );

	// Enqueue Images Loaded Js
	wp_enqueue_script( 'imagesloaded', ZENVY_THEME_URI . 'assets/build/library/imagesloaded.pkgd.min.js', [ 'jquery' ], '4.1.4', true );

	// Enqueue Isotope Js
	wp_enqueue_script( 'isotope', ZENVY_THEME_URI . 'assets/build/library/isotope.pkgd.min.js', [ 'jquery' ], '3.0.6', true );

	// Enqueue theia-sticky-sidebar Js
	$sticky_sidebar = get_theme_mod( 'zenvy_sidebar_sticky', '' );
	if ( $sticky_sidebar ) {
		wp_enqueue_script( 'theia-sticky-sidebar', ZENVY_THEME_URI . 'assets/build/library/theia-sticky-sidebar.min.js', [ 'jquery' ], '1.7.0', true );
	}

	// Main scripts.
	wp_enqueue_script( 'zenvy', ZENVY_THEME_URI . 'assets/build/js/main.js', [ 'jquery' ], ZENVY_THEME_VERSION, true );

	// Localized Scripts for the load more posts.
	$locale = [
		'sticky_sidebar' => $sticky_sidebar ? true : false,
	];
	$locale = apply_filters( 'zenvy_localize_var', $locale );
	wp_localize_script( 'zenvy', 'ZENVY', $locale );

	// Comment Reply
	if ( ! is_singular() || ! comments_open() || ! get_option( 'thread_comments' ) ) {
		return;
	}

	wp_enqueue_script( 'comment-reply' );
}

add_action( 'wp_enqueue_scripts', 'zenvy_scripts' );

function zenvy_admin_scripts( $hook ) {

	if ( 'widgets.php' === $hook ) {
		wp_enqueue_media();
		wp_enqueue_script( 'zenvy-widget', ZENVY_THEME_URI . 'assets/build/js/widget.js', [ 'jquery' ], ZENVY_THEME_VERSION, true );
	}
}
add_action( 'admin_enqueue_scripts', 'zenvy_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require ZENVY_THEME_DIR . 'inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require ZENVY_THEME_DIR . 'inc/template-functions.php';

/**
 * Google fonts utilities
 */
require ZENVY_THEME_DIR . 'inc/classes/Zenvy_Google_Fonts.php';

/**
 * Font Awesome Icon
 */
require ZENVY_THEME_DIR . 'inc/classes/Zenvy_Font_Awesome_Icons.php';

/**
 * Breadcrumb
 */
require ZENVY_THEME_DIR . 'inc/classes/Zenvy_Breadcrumb.php';

/**
 * Helper Functions
 */
require ZENVY_THEME_DIR . 'inc/classes/Zenvy_Helper.php';

/**
 * Customizer additions.
 */
require ZENVY_THEME_DIR . 'inc/customizer/Zenvy_Customizer.php';

// Builder
require ZENVY_THEME_DIR . 'inc/customizer/builder/Zenvy_Customizer_Builder.php';
require ZENVY_THEME_DIR . 'inc/customizer/builder/header/Zenvy_Customizer_Header_Builder.php';
require ZENVY_THEME_DIR . 'inc/customizer/builder/footer/Zenvy_Customizer_Footer_Builder.php';


/**
 * Load theme meta box
 */
require ZENVY_THEME_DIR . 'inc/meta-boxes/Zenvy_Meta_Boxes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require ZENVY_THEME_DIR . 'inc/compatibility/jetpack/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require ZENVY_THEME_DIR . 'inc/compatibility/woocommerce/woocommerce.php';
}

/**
 * Load hooks file.
 */
require ZENVY_THEME_DIR . 'inc/hooks/hooks.php';
require ZENVY_THEME_DIR . 'inc/hooks/functions.php';

/**
 * Load plugin recommendations.
 */
require ZENVY_THEME_DIR . 'inc/tgm/tgm.php';


/** 
 * Widgets
 */
require ZENVY_THEME_DIR . 'inc/widgets/class-zenvy-social-links-widget.php';
require ZENVY_THEME_DIR . 'inc/widgets/class-zenvy-sidebar-posts-widget.php';
require ZENVY_THEME_DIR . 'inc/widgets/class-zenvy-sidebar-tags-widget.php';
