<?php
/**
 * Zenvy Theme Customizer
 *
 * @package Zenvy
 */

/**
 * Zenvy_Customizer class
 */
class Zenvy_Customizer {

	/**
	 * Setup class.
	 */
	public function __construct() {

		add_action( 'customize_register', [ $this, 'zenvy_customize_register' ], 10, 1 );

		add_action( 'customize_preview_init', [ $this, 'zenvy_customize_preview_js' ], 10 );

		add_action( 'customize_controls_enqueue_scripts', [ $this, 'zenvy_customize_js' ] );

		add_action( 'after_setup_theme', [ $this, 'zenvy_customize_option_fields' ] );
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function zenvy_customize_register( $wp_customize ) {

		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->remove_control( 'header_textcolor' );
		$wp_customize->remove_control( 'header_image' );

		/** Move default sections to global panel */

		$wp_customize->get_section( 'colors' )->panel    = 'zenvy_global_panel';
		$wp_customize->get_section( 'colors' )->priority = 5;

		$wp_customize->get_section( 'title_tagline' )->panel    = 'zenvy_header';
		$wp_customize->get_section( 'title_tagline' )->priority = 35;

		$wp_customize->get_control( 'custom_logo' )->priority     = 15;
		$wp_customize->get_control( 'blogname' )->priority        = 35;
		$wp_customize->get_control( 'blogname' )->label           = '';
		$wp_customize->get_control( 'blogdescription' )->priority = 45;
		$wp_customize->get_control( 'blogdescription' )->label    = '';

		// customizer dir path.
		$customizer_dir = ZENVY_THEME_DIR . 'inc/customizer';

		// Selective refresh
		require $customizer_dir . '/selective-refresh.php';

		// Customizer sanitize callback functions
		require_once $customizer_dir . '/Zenvy_Customizer_Sanitize_Callback.php';

		// Custom Section
		require_once $customizer_dir . '/sections/Zenvy_Customize_Custom_Section.php';

		// Load base class for controls.
		require_once $customizer_dir . '/controls/base/Zenvy_Customize_Base_Control.php';
		// Load custom control classes.
		require_once $customizer_dir . '/controls/background/Zenvy_Customize_Background_Control.php';
		require_once $customizer_dir . '/controls/border/Zenvy_Customize_Border_Control.php';
		require_once $customizer_dir . '/controls/box-shadow/Zenvy_Customize_Box_Shadow_Control.php';
		require_once $customizer_dir . '/controls/typography/Zenvy_Customize_Typography_Control.php';
		require_once $customizer_dir . '/controls/sortable/Zenvy_Customize_Sortable_Control.php';
		require_once $customizer_dir . '/controls/group/Zenvy_Customize_Group_Control.php';
		require_once $customizer_dir . '/controls/toggle/Zenvy_Customize_Toggle_Control.php';
		require_once $customizer_dir . '/controls/color/Zenvy_Customize_Color_Control.php';
		require_once $customizer_dir . '/controls/buttonset/Zenvy_Customize_Buttonset_Control.php';
		require_once $customizer_dir . '/controls/range/Zenvy_Customize_Range_Control.php';
		require_once $customizer_dir . '/controls/dimensions/Zenvy_Customize_Dimensions_Control.php';
		require_once $customizer_dir . '/controls/radio-image/Zenvy_Customize_Radio_Image_Control.php';
		require_once $customizer_dir . '/controls/heading/Zenvy_Customize_Heading_Control.php';
		require_once $customizer_dir . '/controls/select/Zenvy_Customize_Select_Control.php';
		require_once $customizer_dir . '/controls/select/Zenvy_Customize_Multi_Select_Control.php';
		require_once $customizer_dir . '/controls/select/Zenvy_Customize_Icon_Select_Control.php';
		require_once $customizer_dir . '/controls/repeater/Zenvy_Customize_Repeater_Control.php';
		require_once $customizer_dir . '/controls/repeater/Zenvy_Customize_Repeater_Setting.php';

		/**
		 * Add Panels
		 */
		self::zenvy_add_panels( $wp_customize );

		/**
		 * Add Sections
		 */
		self::zenvy_add_sections( $wp_customize );

		/**
		 * Add Repeater Fields
		 */
		self::zenvy_add_repeater_fields( $wp_customize );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public function zenvy_customize_preview_js() {

		wp_enqueue_script( 'zenvy-customizer-preview', ZENVY_THEME_URI . 'assets/build/js/customizer-preview.js', [ 'customize-preview' ], ZENVY_THEME_VERSION, true );
	}

	/**
	 * heme Customizer JS
	 */
	public function zenvy_customize_js() {

		// Enqueue the style.
		wp_enqueue_style( 'zenvy-customize-controls', ZENVY_THEME_URI . 'assets/build/css/customize-controls.css', null, ZENVY_THEME_VERSION, 'all' );

		// Add output of Customizer settings as inline style.
		wp_add_inline_style( 'zenvy-customize-controls', Zenvy_Customizer_Inline_Style::css_output( 'customizer' ) );

		// Enqueue alpha color picker script
		wp_enqueue_script( 'wp-color-picker-alpha', ZENVY_THEME_URI . 'assets/build/library/wp-color-picker-alpha.js', [ 'jquery', 'wp-color-picker' ], '2.1.4', true );

		// Enqueue the font awesome style.
		wp_enqueue_style( 'font-awesome', ZENVY_THEME_URI . 'assets/build/library/font-awesome.css', [], '4.7.0' );

		// Enqueue the scripts.
		wp_enqueue_script( 'zenvy-customize-controls', ZENVY_THEME_URI . 'assets/build/js/customize-controls.js', [ 'jquery', 'customize-controls', 'customize-base', 'wp-color-picker-alpha', 'jquery-ui-sortable' ], ZENVY_THEME_VERSION, true );
	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	public function zenvy_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function zenvy_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Include customizer options.
	 */
	public function zenvy_customize_option_fields() {

		/**
		 * Customizer outputs
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/Zenvy_Customizer_Inline_Style.php';

		/**
		 * Base field class.
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/options/Zenvy_Customize_Base_Field.php';

		/**
		 * Global Fields
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Social_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Placeholder_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Body_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Container_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Page_Header_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Sidebar_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Typography_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/global/Zenvy_Customize_Global_Color_Fields.php';

		/**
		 * Front Page Fields
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_General_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_Featured_Section_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_Explore_Section_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_Latest_Posts_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_Quote_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_Trending_Posts_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_Youtube_Promotion_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/front-page/Zenvy_Customize_Front_Page_Shop_Section_Fields.php';

		/**
		 * Blog Posts Fields
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/options/blog-posts/Zenvy_Customize_Blog_Page_Header_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/blog-posts/Zenvy_Customize_Blog_Posts_Layout_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/blog-posts/Zenvy_Customize_Blog_Post_Featured_Image_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/blog-posts/Zenvy_Customize_Blog_Post_Title_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/blog-posts/Zenvy_Customize_Blog_Post_Read_More_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/blog-posts/Zenvy_Customize_Blog_Pagination_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/blog-posts/Zenvy_Customize_Blog_Sidebar_Fields.php';

		/**
		 * Single Posts Fields
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-post/Zenvy_Customize_Single_Post_Content_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-post/Zenvy_Customize_Single_Post_Header_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-post/Zenvy_Customize_Single_Post_Featured_Image_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-post/Zenvy_Customize_Single_Post_Title_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-post/Zenvy_Customize_Single_Post_Sidebar_Fields.php';

		/**
		 * Single Page Fields
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-page/Zenvy_Customize_Single_Page_Content_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-page/Zenvy_Customize_Single_Page_Header_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-page/Zenvy_Customize_Single_Page_Featured_Image_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-page/Zenvy_Customize_Single_Page_Title_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/single-page/Zenvy_Customize_Single_Page_Sidebar_Fields.php';
		/**
		 * 404 Page Fields
		 */
		require ZENVY_THEME_DIR . 'inc/customizer/options/404-page/Zenvy_Customize_404_Page_Header_Fields.php';
		require ZENVY_THEME_DIR . 'inc/customizer/options/404-page/Zenvy_Customize_404_Page_Content_Fields.php';
	}

	/**
	 * Add customizer panels
	 *
	 * @access public
	 * @param object $wp_customize the object.
	 * @return void
	 */
	public static function zenvy_add_panels( $wp_customize ) {

		$panels = [
			'global'                 => [
				'title'    => esc_html__( 'Global', 'zenvy' ),
				'priority' => 10,
			],
			'blog_posts'             => [
				'title'    => esc_html__( 'Archive Posts', 'zenvy' ),
				'priority' => 30,
			],
			'single_post'            => [
				'title'    => esc_html__( 'Single Post', 'zenvy' ),
				'priority' => 35,
			],

			'front_page'             => [
				'title'    => esc_html__( 'Front Page', 'zenvy' ),
				'priority' => 50,
			],
			'single_page'            => [
				'title'    => esc_html__( 'Single Page', 'zenvy' ),
				'priority' => 55,
			],
			'about_page'             => [
				'title'    => esc_html__( 'About Page', 'zenvy' ),
				'priority' => 60,
			],
			'404_page'               => [
				'title'    => esc_html__( '404 Page', 'zenvy' ),
				'priority' => 60,
			],
		];

		foreach ( $panels as $panel_id => $panel_args ) {
			$wp_customize->add_panel( 'zenvy_' . str_replace( '-', '_', $panel_id ) . '_panel', $panel_args );
		}
	}

	/**
	 * Add customizer sections
	 *
	 * @access public
	 * @param object $wp_customize the object.
	 * @return void
	 */
	public static function zenvy_add_sections( $wp_customize ) {

		$sections = [];

		/*
		--------------------------------------------------------------
		# Global Sections
		--------------------------------------------------------------*/
		// Typography
		$sections['typography'] = [
			'title'    => esc_html__( 'Typography', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 10,
		];
		// Body
		$sections['body'] = [
			'title'    => esc_html__( 'Body', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 10,
		];
		// Container
		$sections['container'] = [
			'title'    => esc_html__( 'Container', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 15,
		];
		// Page Header
		$sections['page_header'] = [
			'title'    => esc_html__( 'Page Header', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 30,
		];
		// Post Meta
		$sections['post_meta'] = [
			'title'    => esc_html__( 'Post Meta', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 35,
		];
		// Sidebar
		$sections['sidebar'] = [
			'title'    => esc_html__( 'Sidebar', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 40,
		];
		// Social
		$sections['social'] = [
			'title'    => esc_html__( 'Social', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 45,
		];

		// Placeholder
		$sections['placeholder'] = [
			'title'    => esc_html__( 'Placeholder Image', 'zenvy' ),
			'panel'    => 'zenvy_global_panel',
			'priority' => 50,
		];
		/*
		--------------------------------------------------------------
		# Header Sections
		--------------------------------------------------------------*/
		// Header General
		$sections['header_general'] = [
			'title'    => esc_html__( 'Header General', 'zenvy' ),
			'panel'    => 'zenvy_header_panel',
			'priority' => 10,
		];

		/*
		--------------------------------------------------------------
		# Front Page Sections
		--------------------------------------------------------------*/
		// General Settings
		$sections['front_page_general'] = [
			'title'    => esc_html__( 'General', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'priority' => 10,
		];

		// Featured Section
		$sections['front_page_featured'] = [
			'title'    => esc_html__( 'Featured Section', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'priority' => 15,
		];

		// Explore Section
		$sections['front_page_explore'] = [
			'title'    => esc_html__( 'Explore Categories Section', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'priority' => 20,
		];

		// Latest Posts
		$sections['front_page_latest_posts'] = [
			'title'    => esc_html__( 'Latest Posts Section', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'priority' => 25,
		];

		// Testimonial
		$sections['front_page_quote'] = [
			'title'    => esc_html__( 'Testimonial Quote Section', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'priority' => 30,
		];

		// Trending Posts
		$sections['front_page_trending_posts'] = [
			'title'    => esc_html__( 'Trending Posts Section', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'description' => esc_html__( 'The trending posts section will display the most popular posts based on the number of comments. You can set the number of posts to display in this section.', 'zenvy' ),
			'priority' => 35,
		];

		// Youtube Promotion Section
		$sections['front_page_youtube_promotion'] = [
			'title'    => esc_html__( 'YouTube Promotion Section', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'priority' => 40,
		];

		// Woocommerce shop Section
		$sections['front_page_shop'] = [		
			'title'    => esc_html__( 'Shop Section', 'zenvy' ),
			'panel'    => 'zenvy_front_page_panel',
			'priority' => 45,
		];

		/*
		--------------------------------------------------------------
		# About Page Sections
		--------------------------------------------------------------*/
		// Sortable Elements
		$sections['about_page_elements'] = [
			'title'    => esc_html__( 'Sortable Elements', 'zenvy' ),
			'panel'    => 'zenvy_about_page_panel',
			'priority' => 10,
		];

		// Mission Section
		$sections['about_page_mission'] = [
			'title'    => esc_html__( 'Our Mission', 'zenvy' ),
			'panel'    => 'zenvy_about_page_panel',
			'priority' => 15,
		];
		// Process Section
		$sections['about_page_process'] = [
			'title'    => esc_html__( 'Work Process', 'zenvy' ),
			'panel'    => 'zenvy_about_page_panel',
			'priority' => 20,
		];
		// Why Us Section
		$sections['about_page_services'] = [
			'title'    => esc_html__( 'Why Us?', 'zenvy' ),
			'panel'    => 'zenvy_about_page_panel',
			'priority' => 20,
		];
		// Agent Section
		$sections['about_page_agents'] = [
			'title'    => esc_html__( 'Property Agents', 'zenvy' ),
			'panel'    => 'zenvy_about_page_panel',
			'priority' => 20,
		];

		/*
		--------------------------------------------------------------
		# Blog Posts Sections
		--------------------------------------------------------------*/
		// Page Header
		$sections['blog_page_header'] = [
			'title'    => esc_html__( 'Page Header', 'zenvy' ),
			'panel'    => 'zenvy_blog_posts_panel',
			'priority' => 10,
		];
		// Posts layout
		$sections['blog_posts_layout'] = [
			'title'    => esc_html__( 'Post Content', 'zenvy' ),
			'panel'    => 'zenvy_blog_posts_panel',
			'priority' => 15,
		];
		// Featured Image
		$sections['blog_post_featured_image'] = [
			'title'    => esc_html__( 'Featured Image', 'zenvy' ),
			'panel'    => 'zenvy_blog_posts_panel',
			'priority' => 20,
		];
		// Post title
		$sections['blog_post_title'] = [
			'title'    => esc_html__( 'Post Title', 'zenvy' ),
			'panel'    => 'zenvy_blog_posts_panel',
			'priority' => 25,
		];
		// Read More
		$sections['blog_post_read_more'] = [
			'title'    => esc_html__( 'Read More', 'zenvy' ),
			'panel'    => 'zenvy_blog_posts_panel',
			'priority' => 40,
		];
		// Pagination
		$sections['blog_pagination'] = [
			'title'    => esc_html__( 'Pagination', 'zenvy' ),
			'panel'    => 'zenvy_blog_posts_panel',
			'priority' => 45,
		];
		// Sidebar
		$sections['blog_sidebar'] = [
			'title'    => esc_html__( 'Sidebar', 'zenvy' ),
			'panel'    => 'zenvy_blog_posts_panel',
			'priority' => 50,
		];

		/*
		--------------------------------------------------------------
		# Single Post Sections
		--------------------------------------------------------------*/
		// Post Header
		$sections['single_post_header'] = [
			'title'    => esc_html__( 'Page Header', 'zenvy' ),
			'panel'    => 'zenvy_single_post_panel',
			'priority' => 10,
		];
		// Post Content
		$sections['single_post_content'] = [
			'title'    => esc_html__( 'Post Content', 'zenvy' ),
			'panel'    => 'zenvy_single_post_panel',
			'priority' => 10,
		];

		// Post Title
		$sections['single_post_title'] = [
			'title'    => esc_html__( 'Post Title', 'zenvy' ),
			'panel'    => 'zenvy_single_post_panel',
			'priority' => 20,
		];
		// Featured Image
		$sections['single_post_featured_image'] = [
			'title'    => esc_html__( 'Featured Image', 'zenvy' ),
			'panel'    => 'zenvy_single_post_panel',
			'priority' => 25,
		];
		// Sidebar
		$sections['single_post_sidebar'] = [
			'title'    => esc_html__( 'Sidebar', 'zenvy' ),
			'panel'    => 'zenvy_single_post_panel',
			'priority' => 45,
		];
		/*
		--------------------------------------------------------------
		# Single Page Sections
		--------------------------------------------------------------*/
		// Page Header
		$sections['single_page_header'] = [
			'title'    => esc_html__( 'Page Header', 'zenvy' ),
			'panel'    => 'zenvy_single_page_panel',
			'priority' => 10,
		];

		// Page Content
		$sections['single_page_content'] = [
			'title'    => esc_html__( 'Page Content', 'zenvy' ),
			'panel'    => 'zenvy_single_page_panel',
			'priority' => 15,
		];

		// Page Title
		$sections['single_page_title'] = [
			'title'    => esc_html__( 'Page Title', 'zenvy' ),
			'panel'    => 'zenvy_single_page_panel',
			'priority' => 20,
		];
		// Featured Image
		$sections['single_page_featured_image'] = [
			'title'    => esc_html__( 'Featured Image', 'zenvy' ),
			'panel'    => 'zenvy_single_page_panel',
			'priority' => 25,
		];
		// Sidebar
		$sections['single_page_sidebar'] = [
			'title'    => esc_html__( 'Sidebar', 'zenvy' ),
			'panel'    => 'zenvy_single_page_panel',
			'priority' => 30,
		];

		/*
		--------------------------------------------------------------
		# Error Page Sections
		--------------------------------------------------------------*/
		// 404 Page Header
		$sections['404_page_header'] = [
			'title'    => esc_html__( 'Page Header', 'zenvy' ),
			'panel'    => 'zenvy_404_page_panel',
			'priority' => 10,
		];
		// 404 Page Header
		$sections['404_page_content'] = [
			'title'    => esc_html__( 'Page Content', 'zenvy' ),
			'panel'    => 'zenvy_404_page_panel',
			'priority' => 15,
		];

		// Register sections.
		foreach ( $sections as $section_id => $section_args ) {
			$wp_customize->add_section( 'zenvy_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		// Register sections.
		$wp_customize->add_section(
			new Zenvy_Customize_Custom_Section(
				$wp_customize,
				'zenvy_section_separator_one',
				[
					'priority'     => 20,
					'inline_style' => 'background:#eee;border-left:0;',
				]
			)
		);
		$wp_customize->add_section(
			new Zenvy_Customize_Custom_Section(
				$wp_customize,
				'zenvy_section_separator_two',
				[
					'priority'     => 46,
					'inline_style' => 'background:#eee;border-left:0;',
				]
			)
		);
		$wp_customize->add_section(
			new Zenvy_Customize_Custom_Section(
				$wp_customize,
				'zenvy_section_separator_three',
				[
					'priority'     => 65,
					'inline_style' => 'background:#eee;border-left:0;',
				]
			)
		);

		// Header Builder
		$wp_customize->add_section(
			new Zenvy_Customize_Custom_Section(
				$wp_customize,
				'zenvy_section_separator_five',
				[
					'priority'     => 30,
					'inline_style' => 'background:#eee;border-left:0;',
					'panel'        => 'zenvy_header',
				]
			)
		);

		// Footer Builder
		$wp_customize->add_section(
			new Zenvy_Customize_Custom_Section(
				$wp_customize,
				'zenvy_section_separator_six',
				[
					'priority'     => 30,
					'inline_style' => 'background:#eee;border-left:0;',
					'panel'        => 'zenvy_footer',
				]
			)
		);
		$wp_customize->add_section(
			new Zenvy_Customize_Custom_Section(
				$wp_customize,
				'zenvy_section_separator_seven',
				[
					'priority'     => 60,
					'inline_style' => 'background:#eee;border-left:0;',
					'panel'        => 'zenvy_footer',
				]
			)
		);

		// Front Page
		$wp_customize->add_section(
			new Zenvy_Customize_Custom_Section(
				$wp_customize,
				'zenvy_front_page_section_eight',
				[
					'panel'        => 'zenvy_front_page_panel',
					'priority'     => 11,
					'inline_style' => 'background:#eee;border-left:0;',
				]
			)
		);
	}

	/**
	 * Add customizer repeater fields
	 *
	 * @access public
	 * @param object $wp_customize the object.
	 * @return void
	 */
	public static function zenvy_add_repeater_fields( $wp_customize ) {

		// Global Social Icons
		$wp_customize->add_setting(
			new Zenvy_Customize_Repeater_Setting(
				$wp_customize,
				'zenvy_social_icons',
				[
					'default'           => [
						[
							'network' => 'facebook',
							'icon'    => '',
							'link'    => '#',
						],
						[
							'network' => 'twitter',
							'icon'    => '',
							'link'    => '#',
						],
					],
					'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_repeater' ],
				]
			)
		);
		$wp_customize->add_control(
			new Zenvy_Customize_Repeater_Control(
				$wp_customize,
				'zenvy_social_icons',
				[
					'section'   => 'zenvy_social_section',
					'priority'  => 15,
					'fields'    => [
						'network' => [
							'type'    => 'select',
							'label'   => esc_html__( 'Select Network', 'zenvy' ),
							'choices' => Zenvy_Helper::social_network_list(),
						],
						'link'    => [
							'type'    => 'url',
							'default' => '#',
							'label'   => esc_html__( 'Link', 'zenvy' ),
						],
						'icon'    => [
							'type'        => 'font',
							'label'       => esc_html__( 'Custom Icon', 'zenvy' ),
							'description' => esc_html__( 'To replace the default social icon, Click below input field and choose the icon. Example: fa-facebook-f', 'zenvy' ),
						],
					],
					'row_label' => [
						'type'  => 'field',
						'value' => esc_html__( 'Social', 'zenvy' ),
						'field' => 'network',
					],
				]
			)
		);

		// Front Page: Explore Section Repeater
		$wp_customize->add_setting(
			new Zenvy_Customize_Repeater_Setting(
				$wp_customize,
				'zenvy_front_page_explore_section_lists',
				[
					'default'           => '',
					'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_repeater' ],
				]
			)
		);
		$wp_customize->add_control(
			new Zenvy_Customize_Repeater_Control(
				$wp_customize,
				'zenvy_front_page_explore_section_lists',
				[
					'section'   => 'zenvy_front_page_explore_section',
					'fields'    => [
						'category_slug' => array(
                            'type' => 'select',
                            'label' => esc_html__('Select Category', 'zenvy'),
                            'choices' => Zenvy_Helper::get_terms('category'),
                            'default' => __('Category to be displayed', 'zenvy'),
                        ),
                        'category_image' => array(
                            'type' => 'image',
                            'label' => esc_html__('Category Image', 'zenvy'),
                        ),
					],
					'row_label' => [
						'type'  => 'field',
						'value' => esc_html__( 'Category', 'zenvy' ),
						'field' => 'category_slug',
					],
					'priority'  => 15,
				]
			)
		);

		// Header Builder: Contact Info
		$wp_customize->add_setting(
			new Zenvy_Customize_Repeater_Setting(
				$wp_customize,
				'zenvy_header_contact_info_list',
				[
					'default'           => [
						[
							'title'     => esc_html__( '0123456789', 'zenvy' ),
							'subtitle'  => esc_html__( 'phone number', 'zenvy' ),
							'icon'      => 'fa-phone',
							'link_type' => 'tel',
							'link'      => '#',
						],
						[
							'title'     => esc_html__( 'youremail@gmail.com', 'zenvy' ),
							'subtitle'  => esc_html__( 'email address', 'zenvy' ),
							'icon'      => 'fa-envelope',
							'link_type' => 'email',
							'link'      => '#',
						],
						[
							'title'     => esc_html__( 'address', 'zenvy' ),
							'subtitle'  => esc_html__( 'find us', 'zenvy' ),
							'icon'      => 'fa-map-marker',
							'link_type' => 'disable',
							'link'      => '#',
						],
					],
					'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_repeater' ],
				]
			)
		);
		$wp_customize->add_control(
			new Zenvy_Customize_Repeater_Control(
				$wp_customize,
				'zenvy_header_contact_info_list',
				[
					'label'       => esc_html__( 'Contact Info', 'zenvy' ),
					'description' => esc_html__( 'Click add button to add new contact item.', 'zenvy' ),
					'section'     => 'contact_info',
					'priority'    => 15,
					'fields'      => [
						'icon'      => [
							'type'        => 'font',
							'label'       => esc_html__( 'Icon', 'zenvy' ),
							'description' => esc_html__( 'Example: fa fa-facebook-f', 'zenvy' ),
						],
						'title'     => [
							'type'  => 'text',
							'label' => esc_html__( 'Title', 'zenvy' ),
						],
						'subtitle'  => [
							'type'  => 'text',
							'label' => esc_html__( 'Sub Title', 'zenvy' ),
						],
						'link_type' => [
							'type'    => 'select',
							'default' => '#',
							'label'   => esc_html__( 'Link Type', 'zenvy' ),
							'choices' => [
								'url'     => esc_html__( 'URL', 'zenvy' ),
								'tel'     => esc_html__( 'Tel', 'zenvy' ),
								'email'   => esc_html__( 'Email', 'zenvy' ),
								'disable' => esc_html__( 'Disable', 'zenvy' ),
							],
						],
						'link'      => [
							'type'    => 'url',
							'default' => '#',
							'label'   => esc_html__( 'URL', 'zenvy' ),
						],
					],
					'row_label'   => [
						'type'  => 'field',
						'value' => esc_html__( 'Contact', 'zenvy' ),
						'field' => 'title',
					],
				]
			)
		);

		// Footer Builder: Multi Button
		$wp_customize->add_setting(
			new Zenvy_Customize_Repeater_Setting(
				$wp_customize,
				'zenvy_footer_multi_buttons_list',
				[
					'default'           => [
						[
							'title' => esc_html__( 'log in / register', 'zenvy' ),
							'icon'  => 'fa-user-circle-o',
							'link'  => '#',
						],
					],
					'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_repeater' ],
				]
			)
		);
		$wp_customize->add_control(
			new Zenvy_Customize_Repeater_Control(
				$wp_customize,
				'zenvy_footer_multi_buttons_list',
				[
					'label'       => esc_html__( 'Buttons List', 'zenvy' ),
					'description' => esc_html__( 'Click add button to add new button item.', 'zenvy' ),
					'section'     => 'footer_multi_buttons',
					'priority'    => 15,
					'fields'      => [
						'icon'  => [
							'type'        => 'font',
							'label'       => esc_html__( 'Icon', 'zenvy' ),
							'description' => esc_html__( 'Example: fa fa-facebook-f', 'zenvy' ),
						],
						'title' => [
							'type'  => 'text',
							'label' => esc_html__( 'Title', 'zenvy' ),
						],
						'link'  => [
							'type'    => 'url',
							'default' => '#',
							'label'   => esc_html__( 'URL', 'zenvy' ),
						],
					],
					'row_label'   => [
						'type'  => 'field',
						'value' => esc_html__( 'Button', 'zenvy' ),
						'field' => 'title',
					],
				]
			)
		);
	}
}
new Zenvy_Customizer();
