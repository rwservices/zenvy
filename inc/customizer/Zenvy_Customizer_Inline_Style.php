<?php

/**
 * Zenvy Customizer Styles
 *
 * @package Zenvy
 */

class Zenvy_Customizer_Inline_Style
{

	/**
	 * Get CSS Built from Customizer Options.
	 *
	 * @access static public
	 * @param string $type Whether to return CSS for the "front-end", "block-editor" or "classic-editor".
	 * @return string
	 */
	public static function css_output($type = 'front-end')
	{

		ob_start();

		// Front-End Styles.
		if ('front-end' === $type) {

			// Root
			self::root_output();

			/*
			--------------------------------------------------------------
			# Header Builder -> Top Row
			--------------------------------------------------------------*/
			// Min Height
			self::range(
				['.site-header .top-header .site-header-row'],
				'zenvy_header_top_row_height',
				['desktop' => '0px'],
				'min-height'
			);
			self::background(
				['.site-header .top-header::before'],
				'zenvy_header_top_row_background_overlay',
				''
			);
			/*
			--------------------------------------------------------------
			# Header Builder -> Main Row
			--------------------------------------------------------------*/
			// Min Height
			self::range(
				['.site-header .main-header .site-header-row'],
				'zenvy_header_main_row_height',
				['desktop' => '80px'],
				'min-height'
			);
			self::background(
				['.site-header .main-header::before'],
				'zenvy_header_main_row_background_overlay'
			);
			/*
			--------------------------------------------------------------
			# Header Builder -> Bottom Row
			--------------------------------------------------------------*/
			// Min Height
			self::range(
				['.site-header .bottom-header .site-header-row'],
				'zenvy_header_bottom_row_height',
				['desktop' => '0px'],
				'min-height'
			);
			self::background(
				['.site-header .bottom-header::before'],
				'zenvy_header_bottom_row_background_overlay'
			);
			/*
			--------------------------------------------------------------
			# Header Builder -> HTML
			--------------------------------------------------------------*/
			// Text Typography
            self::typography(
                ['.site-header .header-html-wrap'],
                'zenvy_header_html_text_typo',
                ''
            );
            // Link Color
            self::color(
                ['.site-header .header-html-wrap a','.site-header .header-html-wrap a:hover'],
                'zenvy_header_html_text_link_color',
                ''
            );

			// Container Padding
			self::dimensions(
				['.site-header .header-html-wrap'],
				'zenvy_header_html_padding',
				[
					'desktop' => [
						'side_1' => '10px',
						'side_3' => '10px',
						'linked' => 'off',
					],
				]
			);
			// Container Margin
			self::dimensions(
				['.site-header .header-html-wrap'],
				'zenvy_header_html_margin',
				'',
				'margin'
			);

			/*
			--------------------------------------------------------------
			# Header Builder -> Site Identify
			--------------------------------------------------------------*/
			// logo margin
			self::generate_css(
				['.site-header .site-branding.flex-row .site-logo'],
				['margin-right'],
				'10px'
			);
			// Logo Width
			self::generate_css(
				['.site-header .site-branding .site-logo .custom-logo'],
				['width'],
				'185px'
			);
			// Site Title
			self::typography(
				[
					'.site-title a',
					'.site-title>a:hover',
				],
				'zenvy_header_site_title_typo',
				''
			);
			// Site Tagline
			self::typography(
				['.site-header .site-branding .site-title-wrap .site-description'],
				'zenvy_header_site_tagline_typo',
				''
			);
			// Site Identify Padding
			self::dimensions(
				['.site-header .site-branding'],
				'zenvy_header_site_identify_padding',
				''
			);
			// Site Identify Margin
			self::dimensions(
				['.site-header .site-branding'],
				'zenvy_header_site_identify_margin',
				'',
				'margin'
			);
			/*
			--------------------------------------------------------------
			# Header Builder -> Social Icons
			--------------------------------------------------------------*/
			// Container Padding
			self::dimensions(
				['.site-header .header-social-wrap'],
				'zenvy_header_social_icon_padding',
				''
			);
			// Container Margin
			self::dimensions(
				['.site-header .header-social-wrap'],
				'zenvy_header_social_icon_margin',
				'',
				'margin'
			);
			// Icon color
            self::color(
                ['.site-header .header-social-wrap li a','.site-header .header-social-wrap li:hover a'],
                'zenvy_header_social_icon_item_icon_color',
                [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)'
                ]
            );
			// Item Background color
			self::color(
				['.site-header .header-social-wrap li a', '.site-header .header-social-wrap li:hover a'],
				'zenvy_header_social_icon_item_background',
				[
					'color_1' => 'var(--color-bg)',
					'color_2' => 'var(--color-bg)',
				],
				'background-color'
			);
			// Item Border
			self::border(
				['.site-header .header-social-wrap li a'],
				'zenvy_header_social_icon_item_border',
				[
					'width' => [
						'side_1' => '1px',
						'side_2' => '1px',
						'side_3' => '1px',
						'side_4' => '1px',
						'linked' => 'off',
					],
				]
			);
			// Item Padding
			self::dimensions(
				['.site-header .header-social-wrap li a'],
				'zenvy_header_social_icon_item_padding',
				[
					'desktop' => [
						'side_1' => '10px',
						'side_2' => '15px',
						'side_3' => '10px',
						'side_4' => '15px',
						'linked' => 'off',
					],
				]
			);

			// Item Gap
            self::range(
                ['.site-header ul.header-social-wrap >*:not(:last-child)'],
                'zenvy_header_social_icon_gap',
                ['desktop' => '2px'],
                'margin-right'
            );

			/*
			--------------------------------------------------------------
			# Header Builder -> Primary Menu
			--------------------------------------------------------------*/
			// Container Padding
			self::dimensions(
				['.site-header .primary-navbar'],
				'zenvy_header_primary_menu_container_padding',
				''
			);
			// Container Margin
			self::dimensions(
				['.site-header .primary-navbar'],
				'zenvy_header_primary_menu_container_margin',
				'',
				'margin'
			);
			// Parent Menu Spacing
			$primary_menu_spacing = get_theme_mod('zenvy_header_primary_parent_menu_spacing', '');
			if ($primary_menu_spacing && ($primary_menu_spacing['desktop'] === '0px')) {
				self::generate_css(
					['.site-header .primary-navbar .main-navigation div>ul>li'],
					['margin'],
					'0 -3px'
				);
			} else {
				self::range(
					['.site-header .primary-navbar .main-navigation div>ul>li'],
					'zenvy_header_primary_parent_menu_spacing',
					'',
					'margin-left'
				);
			}

			// Parent Menu Colors
            self::color(
                ['
                .site-header .primary-navbar .menu-top-menu-container>ul>li>a,
                .site-header .main-navigation .menu-item-has-children::before,
                .main-navigation.enable-submenu .menu-top-menu-container>ul>li.menu-item-has-children::before
                ','
                .site-header .primary-navbar .menu-top-menu-container>ul>li:hover>a,
                .site-header .main-navigation .menu-item-has-children:hover::before,
                .main-navigation.enable-submenu .menu-top-menu-container>ul>li.menu-item-has-children:hover::before
                '
                ],
                'zenvy_header_primary_parent_menu_colors',
                '',
                'color'
            );
            $parent_menu_color = get_theme_mod('zenvy_header_primary_parent_menu_colors','');
            $parent_menu_background = get_theme_mod('zenvy_header_primary_parent_menu_background_color','');
            if ( !empty($parent_menu_color['color_2'] ) ) {
                self::generate_css(
                    ['
                    .site-header .primary-navbar .menu-top-menu-container>ul>li.current_page_item>a,
                    .site-header .primary-navbar .menu-top-menu-container>ul>li.current_page_item.menu-item-has-children::before,
                    .site-header .primary-navbar .menu-top-menu-container>ul>li.current-menu-item>a,
                    .site-header .primary-navbar .menu-top-menu-container>ul>li.current-menu-item.menu-item-has-children::before
                    '],
                    ['color'],
                    $parent_menu_color['color_2']
                );
            }
            if ( !empty($parent_menu_background['color_2'] ) ) {
                self::generate_css(
                    ['.site-header .primary-navbar .menu-top-menu-container>ul>li.current_page_item>a,.site-header .primary-navbar .menu-top-menu-container>ul>li.current-menu-item>a'],
                    ['background-color'],
                    $parent_menu_background['color_2']
                );
            }
            // Parent Menu Background
            self::color(
                ['.site-header .primary-navbar .menu-top-menu-container>ul>li>a','.site-header .primary-navbar .menu-top-menu-container>ul>li:hover>a'],
                'zenvy_header_primary_parent_menu_background_color',
                '',
                'background-color'
            );

            // child Menu Colors
            self::color(
                ['
                .site-header .primary-navbar .main-navigation ul li ul li a,
                .site-header .primary-navbar .main-navigation ul li ul li.menu-item-has-children::before
                ',
				'.site-header .primary-navbar .main-navigation ul li ul li:hover a,
                .site-header .primary-navbar .main-navigation ul li ul li.menu-item-has-children:hover::before
                '
                ],
                'zenvy_header_primary_child_menu_colors',
                '',
                'color'
            );

            // Child Menu Background
            self::color(
                ['.site-header .primary-navbar .main-navigation ul li ul li a',
                    '.site-header .primary-navbar .main-navigation ul li ul li:hover a'],
                'zenvy_header_primary_child_menu_background_colors',
                '',
                'background-color'
            );
            $child_menu_color = get_theme_mod('zenvy_header_primary_child_menu_colors','');
            $child_menu_background = get_theme_mod('zenvy_header_primary_child_menu_background_colors','');
            if ( !empty($child_menu_color['color_2'] ) ) {
                self::generate_css(
                    ['
                    .site-header .primary-navbar .main-navigation ul li ul li.current_page_item>a,
                    .site-header .primary-navbar .main-navigation ul li ul li.current_page_item.menu-item-has-children::before,
                    .site-header .primary-navbar .main-navigation ul li ul li.current-menu-item>a,
                    .site-header .primary-navbar .main-navigation ul li ul li.current-menu-item.menu-item-has-children::before
                    '],
                    ['color'],
                    $child_menu_color['color_2']
                );
            }
            if ( !empty($child_menu_background['color_2'] ) ) {
                self::generate_css(
                    ['
                    .site-header .primary-navbar .main-navigation ul li ul li.current_page_item>a,
                    .site-header .primary-navbar .main-navigation ul li ul li.current-menu-item>a,
                    '],
                    ['background-color'],
                    $child_menu_background['color_2']
                );
            }

			/*
			--------------------------------------------------------------
			# Header Builder -> Toggle Menu
			--------------------------------------------------------------*/
			// Icon Color
           self::color(
                ['
                .site-header .mobile-navbar .mean-container .meanmenu-reveal span,
                .site-header .mobile-navbar .mean-container .meanmenu-reveal span:before,
                .site-header .mobile-navbar .mean-container .meanmenu-reveal span:after
                '],
                'zenvy_header_toggle_menu_icon_color',
                ['color_1'=> 'var(--color-accent-secondary)'],
                'background'
            );
            // Icon background color
            self::color(
                ['.site-header .mobile-navbar .mean-container a.meanmenu-reveal'],
                'zenvy_header_toggle_menu_icon_background_color',
                '',
                'background-color'
            );
           // Menu Typography
           self::typography(
                ['.site-header .mobile-navbar .mean-container .mean-nav ul li a'],
                'zenvy_header_toggle_menu_text_typo',
                ''
            );
            // Menu Background
            self::color(
                ['.site-header .mobile-navbar .mean-container .mean-nav>ul,.site-header .mobile-navbar .main-navigation ul li ul li:hover>a','.site-header .mobile-navbar .mean-container .mean-nav>ul>li>a:hover'],
                'zenvy_header_toggle_menu_dropdown_container_menu_background',
                '',
                'background-color'
            );
			// Container Padding
			self::dimensions(
				['.site-header .header-toggle-menu-wrap'],
				'zenvy_header_toggle_menu_padding',
				'',
				'padding'
			);
			// Container Padding
			self::dimensions(
				['.site-header .header-toggle-menu-wrap'],
				'zenvy_header_toggle_menu_margin',
				'',
				'margin'
			);
			/*
			--------------------------------------------------------------
			# Header Builder -> Button
			--------------------------------------------------------------*/
			// Icon color
            self::color(
                ['.site-header .header-button-wrap a','.site-header .header-button-wrap a:hover'],
                'zenvy_header_button_color',
                [
                    'color_1'   => 'var(--color-white)',
                    'color_2'   => 'var(--color-white)'
                ]
            );
            // Background color
            self::color(
                ['.site-header .header-button-wrap a','.site-header .header-button-wrap a:hover'],
                'zenvy_header_button_background',
                [
                    'color_1'   => 'var(--color-link)',
                    'color_2'   => 'var(--color-link-hover)'
                ],
                'background-color'
            );
			// Padding
            self::dimensions(
                ['.site-header .header-button-wrap a'],
                'zenvy_header_button_padding',
                [
                    'desktop'           => [
                        'side_1'            => '12px',
                        'side_2'            => '18px',
                        'side_3'            => '12px',
                        'side_4'            => '18px',
                        'linked'            => 'off'
                    ]
                ]
            );
			
			// Padding
			self::dimensions(
				['.site-header .header-button-wrap'],
				'zenvy_header_button_container_padding',
				'',
				'padding'	
			);
			// Margin
			self::dimensions(
				['.site-header .header-button-wrap a'],
				'zenvy_header_button_container_margin',
				'',
				'margin'
			);

			/*
			--------------------------------------------------------------
			# Header Builder -> Account
			--------------------------------------------------------------*/
			// Icon text color
			self::color(
				['.site-header .header-account-wrap a','.site-header .header-account-wrap a:hover'],
				'zenvy_header_account_icon_color',
				[
					'color_1'   => 'var(--color-white)',
					'color_2'   => 'var(--color-white)'
				]
			);
			// Background color
			self::color(
				['.site-header .header-account-wrap a', '.site-header .header-account-wrap a:hover'],
				'zenvy_header_account_background',
				[
					'color_1'   => 'var(--color-white)',
					'color_2'   => 'var(--color-white)'
				],
				'background-color'
			);

			// Padding
			self::dimensions(
				['.site-header .header-account-wrap a'],
				'zenvy_header_account_padding',
				[
					'desktop' => [
						'side_1' => '12px',
						'side_2' => '18px',
						'side_3' => '12px',
						'side_4' => '18px',
						'linked' => 'off',
					],
				]
			);
			// Container Margin
			self::dimensions(
				['.site-header .header-account-wrap a'],
				'zenvy_header_account_container_margin',
				'',
				'margin'
			);

			// Container Padding
			self::dimensions(
				['.site-header .header-account-wrap'],
				'zenvy_header_account_container_padding',
				'',
				'padding'
			);

			/*
			--------------------------------------------------------------
			# Header Builder -> Menu Trigger
			--------------------------------------------------------------*/
			// Icon Text Gap
			self::range(
				['.site-header .header-menu-trigger-wrap a.flex-row-reverse .icon'],
				'zenvy_header_menu_trigger_icon_text_gap',
				'',
				'padding-left'
			);
			self::range(
				['.site-header .header-menu-trigger-wrap a.flex-row .icon'],
				'zenvy_header_menu_trigger_icon_text_gap',
				'',
				'padding-right'
			);
			// Icon Size
			self::range(
				['.site-header .header-menu-trigger-wrap a .icon'],
				'zenvy_header_menu_trigger_icon_size',
				'',
				'font-size'
			);
			// Text Size
			self::range(
				['.site-header .header-menu-trigger-wrap a label'],
				'zenvy_header_menu_trigger_text_size',
				'',
				'font-size'
			);
			// Icon color
			self::color(
				['.site-header .header-menu-trigger-wrap a', '.site-header .header-menu-trigger-wrap a:hover'],
				'zenvy_header_menu_trigger_color'
			);
			// Background color
			self::color(
				['.site-header .header-menu-trigger-wrap a', '.site-header .header-menu-trigger-wrap a:hover'],
				'zenvy_header_menu_trigger_background',
				'',
				'background-color'
			);
			// Border
			self::border(
				['.site-header .header-menu-trigger-wrap a'],
				'zenvy_header_menu_trigger_border',
				''
			);
			// box shadow
			self::box_shadow(
				['.site-header .header-menu-trigger-wrap a'],
				'zenvy_header_menu_trigger_box_shadow',
				''
			);
			// Padding
			self::dimensions(
				['.site-header .header-menu-trigger-wrap a'],
				'zenvy_header_menu_trigger_padding',
				''
			);
			// Margin
			self::dimensions(
				['.site-header .header-menu-trigger-wrap a'],
				'zenvy_header_menu_trigger_margin',
				'',
				'margin'
			);

			/*--------------------------------------------------------------
            # Header Builder -> Color Mode Icon
            --------------------------------------------------------------*/
            // Icon Size
            self::range(
                ['.site-header .header-color-mode-wrap #theme-toggle span'],
                'zenvy_header_color_mode_icon_size',
                ['desktop' => '13px'],
                'font-size'
            );
            // Background color
            self::color(
                ['.site-header .header-color-mode-wrap #theme-toggle span'],
                'zenvy_header_color_mode_icon_bg_color',
                '',
                'background-color'
            );
            // Icon color
            self::color(
                ['.site-header .header-color-mode-wrap #theme-toggle span i'],
                'zenvy_header_color_mode_icon_color',
				 [
					'color_1'   => 'var(--color-link)',
				],
                'color'
            );
            // Padding
            self::dimensions(
                ['.site-header .header-color-mode-wrap #theme-toggle span'],
                'zenvy_header_color_mode_padding',
                ''
            );
            // Margin
            self::dimensions(
                ['.site-header .header-color-mode-wrap'],
                'zenvy_header_color_mode_margin',
                '',
                'margin'
            );

			/*
			--------------------------------------------------------------
			# Header Builder -> Search Icon
			--------------------------------------------------------------*/
			// Icon color
            self::color(
                ['.site-header .site-header-section .header-search-icon-wrap .search-toggle','.site-header .site-header-section .header-search-icon-wrap .search-toggle:hover'],
                'zenvy_header_search_icon_color',
                ''
            );
            // Background color
            self::color(
                ['.site-header .site-header-section .header-search-icon-wrap .search-toggle','.site-header .site-header-section .header-search-icon-wrap .search-toggle:hover'],
                'zenvy_header_search_icon_background',
                '',
                'background-color'
            );
			// Button Background color
			self::color(
				['.site-header .header-search-section .search-form input[type="submit"]','.site-header .header-search-section .search-form input[type="submit"]:hover'],
				'zenvy_header_search_button_background',
				'',
				'background-color'
			);
			// Container Padding
			self::dimensions(
				['.site-header .header-search-icon-wrap'],
				'zenvy_header_search_icon_container_padding',
				''
			);
			// Container Margin
			self::dimensions(
				['.site-header .header-search-icon-wrap'],
				'zenvy_header_search_icon_container_margin',
				'',
				'margin'
			);
			// Padding
			self::dimensions(
				['.site-header .header-search-icon-wrap .search-toggle'],
				'zenvy_header_search_icon_padding',
				[
					'desktop' => [
						'side_1' => '12px',
						'side_2' => '18px',
						'side_3' => '12px',
						'side_4' => '18px',
						'linked' => 'off',
					],
				]
			);

			if (class_exists('WooCommerce')) {
				/*
				--------------------------------------------------------------
				# Header Builder -> WC Cart
				--------------------------------------------------------------*/
				// Icon Size
				self::range(
					['.site-header .header-wc-cart-wrap .wc-icon i'],
					'zenvy_header_woocommerce_cart_icon_size',
					['desktop' => '16px'],
					'font-size'
				);

				// Icon color
				self::color(
					['.site-header .header-wc-cart-wrap .wc-icon i', '.site-header .header-wc-cart-wrap .wc-icon i:hover'],
					'zenvy_header_woocommerce_cart_icon_color',
					'',
					'color'
				);

				// Background color
				self::color(
					['.site-header .header-wc-cart-wrap', '.site-header .header-wc-cart-wrap:hover'],
					'zenvy_header_woocommerce_cart_icon_background',
					'',
					'background-color'
				);
				// Count Color
				self::color(
					['.site-header .header-wc-cart-wrap .wc-icon .cart-value'],
					'zenvy_header_woocommerce_cart_count_color',
					'',
					'color'
				);

				// Background color
				self::color(
					['.site-header .header-wc-cart-wrap .wc-icon .cart-value'],
					'zenvy_header_woocommerce_cart_count_background',
					'',
					'background-color'
				);

				// Padding
				self::dimensions(
					['.site-header .header-wc-cart-wrap'],
					'zenvy_header_woocommerce_cart_padding',
					''
				);
				// Margin
				self::dimensions(
					['.site-header .header-wc-cart-wrap'],
					'zenvy_header_woocommerce_cart_margin',
					'',
					'margin'
				);


			}
			/*
			--------------------------------------------------------------
			# Global -> Body
			--------------------------------------------------------------*/
			self::background(['body'], 'zenvy_body_background');

			/*
			--------------------------------------------------------------
			# Global -> Typography
			--------------------------------------------------------------*/
			// Base
			self::typography(
				['body'],
				'zenvy_base_typography',
				''
			);

			// Heading
			self::typography(
				['h1, h2, h3, h4, h5, h6'],
				'zenvy_heading_typography',
				''
			);			

			/*
			--------------------------------------------------------------
			# Global -> Featured Image Color
			--------------------------------------------------------------*/
			// Background Overlay Color
			self::color(
				['.featured-image,.featured-image a::before'],
				'zenvy_placeholder_color',
				['color_1' => '#dbdcdf'],
				'background-color'
			);

			/*
			--------------------------------------------------------------
			# Global -> Page Header
			--------------------------------------------------------------*/
			// Container Background Image
			self::background(
				['.page-title-wrap'],
				'zenvy_page_header_background',
				''
			);
			$page_header_image = get_theme_mod('zenvy_page_header_background', '');
			if ($page_header_image && (isset( $page_header_image['image'] ) || isset( $page_header_image['image'] )) ) {
				$page_header_image_bg = get_theme_mod('zenvy_page_header_background_overlay', [
					'colors'     => [
						'color_1' => 'var(--color-bg-light)',
					]]);
				if (!empty($page_header_image_bg) && !empty($page_header_image_bg['colors']['color_1'])) {
					$overlay_color = $page_header_image_bg['colors']['color_1'];
				} else {
					$overlay_color = 'transparent';
				}
				self::generate_css(
					['.page-title-wrap::before'],
					['background'],
					$overlay_color
				);
			} else {
				// Container Background Overlay
				self::background(
					['.page-title-wrap::before'],
					'zenvy_page_header_background_overlay',
					[
					'colors'     => [
						'color_1' => 'var(--color-bg-light)',
					]],
				);
			}

			/*--------------------------------------------------------------
            # Global -> Button
            --------------------------------------------------------------*/
            // color
            self::color(
                ['
                .box-button, .read-more-wrap .read-more-button, .wpcf7-submit[type="submit"], input[type="submit"], button[type="submit"], .comment-form input[type="submit"],
                .post-navigation .nav-links .nav-previous a, .pagination-wrap .nav-links .nav-previous a,
                .post-navigation .nav-links .nav-next a, .pagination-wrap .nav-links .nav-next a,
                .back-to-top a, .wp-block-search .wp-block-search__button,
                .mc4wp-form input[type=submit],
                button:not(.components-button),
                a.button,
                .wp-block-button__link,
                input[type="button"],
                input[type="reset"],
                input[type="submit"]
                ','
                .box-button:hover, .read-more-wrap .read-more-button:hover, .wpcf7-submit[type="submit"]:hover, input[type="submit"]:hover, button[type="submit"]:hover, .comment-form input[type="submit"]:hover,
                .post-navigation .nav-links .nav-previous a:hover, .pagination-wrap .nav-links .nav-previous a:hover,
                .post-navigation .nav-links .nav-next a:hover, .pagination-wrap .nav-links .nav-next a:hover,
                .back-to-top a:hover,
                .wp-block-search .wp-block-search__button:hover,
                .mc4wp-form input[type=submit]:hover,
                button:not(.components-button):hover,
                a.button:hover,
                .wp-block-button__link:hover,
                input[type="button"]:hover,
                input[type="reset"]:hover,
                input[type="submit"]:hover
                '],
                'zenvy_button_color',
                '',
                'color'
            );
            // Background color
            self::color(
                ['
                .box-button, .read-more-wrap .read-more-button, .wpcf7-submit[type="submit"], input[type="submit"], button[type="submit"], .comment-form input[type="submit"],
                .post-navigation .nav-links .nav-previous a, .pagination-wrap .nav-links .nav-previous a,
                .post-navigation .nav-links .nav-next a, .pagination-wrap .nav-links .nav-next a,
                .back-to-top a,
                .wp-block-search .wp-block-search__button,
                .mc4wp-form input[type=submit],
                button:not(.components-button),
                a.button,
                .wp-block-button__link,
                input[type="button"],
                input[type="reset"],
                input[type="submit"]
                ','
                .box-button:hover, .read-more-wrap .read-more-button:hover, .wpcf7-submit[type="submit"]:hover, input[type="submit"]:hover, button[type="submit"]:hover, .comment-form input[type="submit"]:hover,
                .post-navigation .nav-links .nav-previous a:hover, .pagination-wrap .nav-links .nav-previous a:hover,
                .post-navigation .nav-links .nav-next a:hover, .pagination-wrap .nav-links .nav-next a:hover,
                .back-to-top a:hover,
                .wp-block-search .wp-block-search__button:hover,
                .mc4wp-form input[type=submit]:hover,
                button:not(.components-button):hover,
                a.button:hover,
                .wp-block-button__link:hover,
                input[type="button"]:hover,
                input[type="reset"]:hover,
                input[type="submit"]:hover
                '],
                'zenvy_button_bg_color',
                '',
                'background-color'
            );
             // Border
             self::border(
                ['
                .box-button, .read-more-wrap .read-more-button, .wpcf7-submit[type="submit"], input[type="submit"], button[type="submit"], .comment-form input[type="submit"],
                .post-navigation .nav-links .nav-previous a, .pagination-wrap .nav-links .nav-previous a,
                .post-navigation .nav-links .nav-next a, .pagination-wrap .nav-links .nav-next a,
                .back-to-top a,
                .wp-block-search .wp-block-search__button,
                .mc4wp-form input[type=submit],
                button:not(.components-button),
                a.button,
                .wp-block-button__link,
                input[type="button"],
                input[type="reset"],
                input[type="submit"]
                '],
                'zenvy_button_border',
                ''
            );

			// Item Gap
			self::generate_css(
				['.site-header .page-title-wrap .text-left .breadcrumbs ul li,.site-header .page-title-wrap .text-center .breadcrumbs ul li'],
				['margin-right'],
				'20px'
			);
			self::generate_css(
				['.site-header .page-title-wrap .text-left .breadcrumbs ul li,.site-header .page-title-wrap .text-center .breadcrumbs ul li'],
				['margin-right'],
				'25px',
				'',
				'',
				'@media only screen and (min-width: 720px)'
			);
			self::generate_css(
				['.site-header .page-title-wrap .text-left .breadcrumbs ul li,.site-header .page-title-wrap .text-center .breadcrumbs ul li'],
				['margin-right'],
				'30px',
				'',
				'',
				'@media only screen and (min-width: 1024px)'
			);

			// Item Separator Spacing
			self::generate_css(
				['.site-header .page-title-wrap .container>.breadcrumbs ul li::before'],
				['right'],
				'12px',
				'-'
			);
			self::generate_css(
				['.site-header .page-title-wrap .container>.breadcrumbs ul li::before'],
				['right'],
				'15px',
				'-',
				'',
				'@media only screen and (min-width: 720px)'
			);
			self::generate_css(
				['.site-header .page-title-wrap .container>.breadcrumbs ul li::before'],
				['right'],
				'19px',
				'-',
				'',
				'@media only screen and (min-width: 1024px)'
			);
			// Post meta
			// Bottom Spacing
			self::range(
				['.site-header .page-title-wrap .container>.header-post-meta'],
				'zenvy_page_header_post_meta_spacing',
				[
					'desktop' => '10px',
				],
				'margin-bottom'
			);
			// Is Home Page or archive page or search page
			if (is_home() || is_archive() || is_search() || is_404()) {

				/*
				--------------------------------------------------------------
				# Post Content
				--------------------------------------------------------------*/
				// Read More button icon gap
				self::generate_css(
					['.zenvy-blog #primary .post .post-content .read-more-wrap a .icon'],
					['margin-left'],
					'10px'
				);
				/*
				--------------------------------------------------------------
				# Pagination
				--------------------------------------------------------------*/
				// is archive type agent
				if (is_post_type_archive('agent')) {
					self::generate_css(
						['.post-type-archive-agent .site-header .page-title-wrap .archive-description'],
						['display'],
						'none'
					);
				}
			}

			// Is Single Post
			if ('post' === get_post_type()) {

				/*
				--------------------------------------------------------------
				# Post Content
				--------------------------------------------------------------*/
				// Background Color
				// self::color(
				// 	['.single .single-post-wrapper .post .post-navigation .nav-links a', '.single .single-post-wrapper .post .post-navigation .nav-links a::before,.single .single-post-wrapper .post .post-navigation .nav-links a:hover'],
				// 	'zenvy_single_post_navigation_background',
				// 	[
				// 		'color_1' => '#F8F5FC',
				// 		'color_2' => 'var(--color-bg-2)',
				// 	],
				// 	'background-color'
				// );
			}

			// Is 404 Page
			if (is_404()) {

				/*
				--------------------------------------------------------------
				# Page Content
				--------------------------------------------------------------*/
				// Image Height
				self::generate_css(
					['.error404 .error-404 .error-page-content figure img'],
					['height'],
					'150px'
				);
				// Spacing
				self::generate_css(
					['.error404 .error-404 .error-page-content figure'],
					['margin-bottom'],
					'15px'
				);
				self::generate_css(
					['.error404 .error-404 .error-page-content a.home-button'],
					['margin-bottom'],
					'15px'
				);
				self::generate_css(
					['.error404 .error-404 .error-page-content form.search-form'],
					['margin-bottom'],
					'15px'
				);
				// Background
				self::background(
					['.error404 .error-404.not-found'],
					'zenvy_404_error_background'
				);
			}

			// Is Static Front Page Enable
			if (Zenvy_Helper::front_page_enable()) {

				// Front page : Featured Section
				// Background
				self::background(
					['.zenvy-front-page .featured-slider'],
					'zenvy_front_page_featured_section_background',
					''
				);

				// Background Overlay	
				self::background(
					['.zenvy-front-page .featured-slider::before'],
					'zenvy_front_page_featured_section_background_overlay',
					[
						'background' => 'color',
						'colors'     => [
							'color_1' => 'var(--color-bg)',
						],
					]
				);

				// Front page : Explore Section
				// Background
				self::background(
					['.zenvy-front-page .explore-section'],
					'zenvy_front_page_explore_section_background',
					''
				);

				// Background Overlay
				self::background(
					['.zenvy-front-page .explore-section::before'],
					'zenvy_front_page_explore_section_background_overlay',
					[
						'background' => 'color',
						'colors'     => [
							'color_1' => 'var(--color-bg)',
						],
					]
				);

				// Front page : Latest Posts Section
				// Background
				self::background(
					['.zenvy-front-page .latest-posts-section'],
					'zenvy_front_page_latest_posts_background',
					''
				);

				// Background Overlay
				self::background(
					['.zenvy-front-page .latest-posts-section::before'],
					'zenvy_front_page_latest_posts_background_overlay',
					[
						'background' => 'color',
						'colors'     => [
							'color_1' => 'var(--color-bg)',
						],
					]
				);

				// Front page : Quote Section
				// Background
				self::background(
					['.zenvy-front-page .testimonial-quote-section .testimonial-quote-content-wrap'],
					'zenvy_front_page_quote_background',
					''
				);

				//Background Overlay
				self::background(
					['.zenvy-front-page .testimonial-quote-section .testimonial-quote-content-wrap'],
					'zenvy_front_page_quote_background_overlay',
					[
						'background' => 'color',
						'colors'     => [
							'color_1' => 'var(--color-bg-light)',
						],
					]
				);


				// Front page : Trending Posts Section
				// Background
				self::background(
					['.zenvy-front-page .trending-posts-section'],
					'zenvy_front_page_trending_posts_background',
					''
				);

				// Background Overlay
				self::background(
					['.zenvy-front-page .trending-posts-section::before'],
					'zenvy_front_page_trending_posts_background_overlay',
					[
						'background' => 'color',
						'colors'     => [
							'color_1' => 'var(--color-bg)',
						],
					]
				);

				// Front page : Youtube Promotion Section
				// Background
				self::background(
					['.zenvy-front-page .video-post-section'],
					'zenvy_front_page_youtube_promotion_background',
					''
				);

				// Background Overlay
				self::background(
					['.zenvy-front-page .video-post-section::before'],
					'zenvy_front_page_youtube_promotion_background_overlay',
					[
						'background' => 'color',
						'colors'     => [
							'color_1' => 'var(--color-bg-light)',
						],
					]
				);

				// Front page : Shop Section
				// Background
				self::background(
					['.zenvy-front-page .shop-section'],
					'zenvy_front_page_shop_section_background',
					''
				);

				// Background Overlay
				self::background(
					['.zenvy-front-page .shop-section::before'],
					'zenvy_front_page_shop_section_background_overlay',
					[
						'background' => 'color',
						'colors'     => [
							'color_1' => 'var(--color-bg)',
						],
					]
				);

				/*
				--------------------------------------------------------------
				# Post Content
				--------------------------------------------------------------*/
				// Read More button icon gap
				self::generate_css(
					['.zenvy-front-page #page .latest-news-section .post .post-content .read-more-wrap a .icon'],
					['margin-left'],
					'10px'
				);
			}
			// Sidebar
			if (is_active_sidebar('sidebar-1') && Zenvy_Helper::get_sidebar_layout()) {

				/*
				--------------------------------------------------------------
				# Sidebar Container
				--------------------------------------------------------------*/
				// Sidebar Width
				self::generate_css(
					['.have-sidebar #secondary'],
					['width'],
					'380px',
					'',
					'',
					'@media only screen and (min-width: 1024px)'
				);
				self::generate_css(
					['.have-sidebar #primary'],
					['width'],
					'380px',
					'calc(100% - ',
					')',
					'@media only screen and (min-width: 1024px)'
				);
				// Sidebar Gap
				if (Zenvy_Helper::get_sidebar_layout() === 'right') {
					self::generate_css(
						['.have-sidebar #secondary.right-sidebar'],
						['padding-left'],
						'25px',
						'',
						'',
						'@media only screen and (min-width: 1024px)'
					);
					self::generate_css(
						['.have-sidebar #primary.content-area'],
						['padding-right'],
						'25px',
						'',
						'',
						'@media only screen and (min-width: 1024px)'
					);
				} elseif (Zenvy_Helper::get_sidebar_layout() === 'left') {
					self::generate_css(
						['.have-sidebar #secondary.left-sidebar'],
						['padding-right'],
						'25px',
						'',
						'',
						'@media only screen and (min-width: 1024px)'
					);
					self::generate_css(
						['.have-sidebar #primary.content-area'],
						['padding-left'],
						'25px',
						'',
						'',
						'@media only screen and (min-width: 1024px)'
					);
				}
			}
			/*
			--------------------------------------------------------------
			# Footer Builder -> Top Row
			--------------------------------------------------------------*/
			// Background
			self::background(
				['.site-footer .top-footer'],
				'zenvy_footer_top_row_background',
				''
			);
			self::background(
				['.site-footer .top-footer::before'],
				'zenvy_footer_top_row_background_overlay',
				''
			);
			// Padding
			self::dimensions(
				['.site-footer .top-footer .container>.row.columns'],
				'zenvy_footer_top_row_padding',
				[
					'desktop' => [
						'side_1' => '25px',
						'side_3' => '25px',
						'linked' => 'off',
					],
				]
			);
			/*
			--------------------------------------------------------------
			# Footer Builder -> Main Row
			--------------------------------------------------------------*/
			// Background
			self::background(
				['.site-footer .main-footer'],
				'zenvy_footer_main_row_background'
			);
			self::background(
				['.site-footer .main-footer::before'],
				'zenvy_footer_main_row_background_overlay',
				[
					'background' => 'color',
					'colors'     => [
						'color_1' => 'rgba(0,0,0,0.22)',
					],
				]
			);
			// Padding
			self::dimensions(
				['.site-footer .main-footer .container>.row.columns'],
				'zenvy_footer_main_row_padding',
				[
					'desktop' => [
						'side_1' => '25px',
						'side_3' => '25px',
						'linked' => 'off',
					],
				]
			);
			/*
			--------------------------------------------------------------
			# Footer Builder -> Bottom Row
			--------------------------------------------------------------*/
			self::background(
				['.site-footer .bottom-footer::before'],
				'zenvy_footer_bottom_row_background_overlay',
				[
					'background' => 'color',
					'colors'     => [
						'color_1' => 'var(--color-bg-3)',
					],
				]
			);
			// Padding
			self::dimensions(
				['.site-footer .bottom-footer .container>.row.columns'],
				'zenvy_footer_bottom_row_padding',
				''
			);
			/*
			--------------------------------------------------------------
			# Footer Builder -> Footer HTML
			--------------------------------------------------------------*/
			// Text Typography
            self::typography(
                ['.site-footer .footer-html-wrap'],
                'zenvy_footer_html_text_typo',
                [
					'colors' =>	[
						'color_1'           => 'var(--color-white)',
					]
				]
            );
            // Link Color
            self::color(
                ['.site-footer .footer-html-wrap a','.site-footer .footer-html-wrap a:hover'],
                'zenvy_footer_html_text_link_color',
                ''
            );

			// Container Padding
			self::dimensions(
				['.site-footer .footer-html-wrap'],
				'zenvy_footer_html_padding',
				[
					'desktop' => [
						'side_1' => '10px',
						'side_3' => '10px',
						'linked' => 'off',
					],
				]
			);
			// Container Margin
			self::dimensions(
				['.site-footer .footer-html-wrap'],
				'zenvy_footer_html_margin',
				'',
				'margin'
			);

			/*
			--------------------------------------------------------------
			# Footer Builder -> Footer Menu
			--------------------------------------------------------------*/
			// Container Padding
            self::dimensions(
                ['.site-footer .footer-navbar'],
                'zenvy_footer_menu_container_padding',
                [
                    'desktop'           => [
                        'side_1'            => '10px',
                        'side_3'            => '10px',
                        'linked'            => 'off'
                    ]
                ],
				'padding'
            );
            // Container Margin
            self::dimensions(
                ['.site-footer .footer-navbar'],
                'zenvy_footer_menu_container_margin',
                '',
                'margin'
            );
            // Item Gap
            self::range(
                ['.site-footer .footer-navbar ul.menu-wrapper >*:not(:last-child)'],
                'zenvy_footer_menu_spacing',
                '',
                'margin-right'
            );
            // Menu Colors
            self::color(
                ['.site-footer .footer-navbar ul.menu-wrapper li,
                .site-footer .footer-navbar ul.menu-wrapper li a',
                '.site-footer .footer-navbar ul.menu-wrapper li a:hover'],
                'zenvy_footer_menu_font_colors',
                ''
            );
            // Menu Background
            self::color(
                ['.site-footer .footer-navbar ul.menu-wrapper li,
                .site-footer .footer-navbar ul.menu-wrapper li a',
                '.site-footer .footer-navbar ul.menu-wrapper li a:hover'],
                'zenvy_footer_menu_background_color',
                '',
                'background-color'
            );
			
			/*
			--------------------------------------------------------------
			# Footer Builder -> Button
			--------------------------------------------------------------*/
			// Icon color
			self::color(
				['.site-footer .footer-button-wrap a','.site-footer .footer-button-wrap a:hover'],
				'zenvy_footer_button_color',
				[
					'color_1'   => 'var(--color-bg-dark)',
					'color_2'   => 'var(--color-bg-dark)'
				]
			);
			// Background color
			self::color(
				['.site-footer .footer-button-wrap a','.site-footer .footer-button-wrap a:hover'],
				'zenvy_footer_button_background',
				[
					'color_1'   => 'var(--color-white)',
					'color_2'   => 'var(--color-gray-500)'
				],
				'background-color'
			);
			// Border
			self::border(
				['.site-footer .footer-button-wrap a'],
				'zenvy_footer_button_border',
				[
					'width' => [
						'side_1' => '1px',
						'side_2' => '1px',
						'side_3' => '1px',
						'side_4' => '1px',
						'linked' => 'off',
					],
				]
			);
			// Padding
			self::dimensions(
				['.site-footer .footer-button-wrap a'],
				'zenvy_footer_button_padding',
				[
					'desktop' => [
						'side_1' => '7px',
						'side_2' => '15px',
						'side_3' => '7px',
						'side_4' => '15px',
						'linked' => 'off',
					],
				]
			);
			// Margin
			self::dimensions(
				['.site-footer .footer-button-wrap a'],
				'zenvy_footer_button_margin',
				[
					'desktop' => [
						'side_1' => '5px',
						'side_2' => '5px',
						'side_3' => '5px',
						'side_4' => '5px',
						'linked' => 'on',
					],
				],
				'margin'
			);

			/*
			--------------------------------------------------------------
			# Footer Builder -> Copyright Text
			--------------------------------------------------------------*/
			// Text Typography
            self::typography(
                ['.site-footer .site-info,.site-footer .site-info a','.site-footer .site-info a:hover'],
                'zenvy_footer_copyright_text_typo',
                [
                    'colors'            => [
                        'color_1'           => 'var(--color-white)',
                        'color_2'           => 'var(--color-gray-600)'
                    ]
                ]
            );

			// Padding
			self::dimensions(
				['.site-footer .site-info'],
				'zenvy_footer_copyright_padding',
				[
					'desktop' => [
						'side_1' => '10px',
						'side_3' => '10px',
						'linked' => 'off',
					],
				],
				'padding'
			);
			// Margin
			self::dimensions(
				['.site-footer .site-info'],
				'zenvy_footer_copyright_margin',
				'',
				'margin'
			);

			/*
			--------------------------------------------------------------
			# Footer Builder -> Social Icons
			--------------------------------------------------------------*/
			// Icon Size
			self::generate_css(
				['.site-footer .footer-social-wrap li a .icon'],
				['font-size'],
				'18px'
			);
			// Container Padding
			self::dimensions(
				['.site-footer .footer-social-wrap'],
				'zenvy_footer_social_icon_padding',
				''
			);
			// Container Margin
			self::dimensions(
				['.site-footer .footer-social-wrap'],
				'zenvy_footer_social_icon_margin',
				'',
				'margin'
			);
			// Item Gap
            self::range(
                ['.site-footer ul.footer-social-wrap >*:not(:last-child)'],
                'zenvy_footer_social_icon_gap',
                ['desktop' => '2px'],
                'margin-right'
            );
			// Icon color
            self::color(
                ['.site-footer .footer-social-wrap li a span','.site-footer .footer-social-wrap li:hover a span'],
                'zenvy_footer_social_icon_item_icon_color',
                [
                    'color_1'           => 'var(--color-white)',
                    'color_2'           => 'var(--color-gray-500)'
                ]
            );
            // Item Background color
            self::color(
                ['.site-footer .footer-social-wrap li','.site-footer .footer-social-wrap li:hover'],
                'zenvy_footer_social_icon_item_background',
                [
					'color_1'           => 'var(--color-bg-dark)',
                    'color_2'           => 'var(--color-bg-dark)'
                ],
                'background-color'
            );
			// Item Border
			self::border(
				['.site-footer .footer-social-wrap li'],
				'zenvy_footer_social_icon_item_border',
				[
					'width' => [
						'side_1' => '0px',
						'side_2' => '0px',
						'side_3' => '0px',
						'side_4' => '0px',
						'linked' => 'on',
					],
				]
			);
			// Item Padding
			self::dimensions(
				['.site-footer .footer-social-wrap li'],
				'zenvy_footer_social_icon_item_padding',
				[
					'desktop' => [
						'side_1' => '10px',
						'side_2' => '15px',
						'side_3' => '10px',
						'side_4' => '15px',
						'linked' => 'off',
					],
				]
			);
		}

		/*--------------------------------------------------------------
		# Footer Builder -> Sidebar 1, Sidebar 2, Sidebar 3, Sidebar 4, Sidebar 5, Sidebar 6
		--------------------------------------------------------------*/
		// Sidebar Widgets Typography
		self::typography(
			['
				.site-footer .footer-sidebar-wrap .widget .widget-title,
				.site-footer .footer-sidebar-wrap .widget_block h2,
				.site-footer .footer-sidebar-wrap .widget .widget-title a,
				.site-footer .footer-sidebar-wrap .widget_block h2 a
				'],
			'zenvy_footer_builder_widget_title_typo',
			''
		);
		// Sidebar Widget Content
		self::typography(
			['
				.site-footer .footer-sidebar-wrap .widget ul li,
				.site-footer .footer-sidebar-wrap .widget ul li a,
				.site-footer .footer-sidebar-wrap .widget .calendar_wrap,
				.site-footer .footer-sidebar-wrap .widget input,
				.site-footer .footer-sidebar-wrap .widget input::placeholder,
				.site-footer .footer-sidebar-wrap .widget textarea,
				.site-footer .footer-sidebar-wrap .widget input::placeholder,
				.site-footer .footer-sidebar-wrap .widget select,
				.site-footer .footer-sidebar-wrap .widget .wp-caption-text,
				.site-footer .footer-sidebar-wrap .widget .textwidget,
				.site-footer .widget p,
				.site-footer .widget li,
				.site-footer .widget span,
				.site-footer .footer-sidebar-wrap .widget .textwidget a,
				.site-footer .footer-sidebar-wrap .widget_block .wp-block-group__inner-container ul li,
				.site-footer .footer-sidebar-wrap .widget_tag_cloud a,
				.site-footer .footer-sidebar-wrap .widget_block .wp-block-group__inner-container ul li a
				','
				.site-footer .footer-sidebar-wrap .widget ul li a:hover,
				.site-footer .footer-sidebar-wrap .widget .textwidget a:hover,
				.site-footer .footer-sidebar-wrap .widget_tag_cloud a:hover,
				.site-footer .footer-sidebar-wrap .widget_block .wp-block-group__inner-container ul li a:hover
				'],
			'zenvy_footer_builder_widget_content_typo',
			''
		);
		// Widget Padding
		self::dimensions(
			['.site-footer .footer-sidebar-wrap .widget'],
			'zenvy_footer_builder_widget_padding',
			''
		);

		// Customizer Styles.
		if ('customizer' === $type) {

			// Root
			self::root_output();
		}

		// Return the results.
		return ob_get_clean();
	}

	public static function root_output()
	{
		/*
		--------------------------------------------------------------
		# Root
		--------------------------------------------------------------*/
		// Accent Colors
		self::customizer_inherit_colors(
			'zenvy_accent_color',
			null,
			[
				'color_1' => '--color-primary',
				'color_2' => '--color-secondary',
				'color_3' => '--color-tertiary',
			]
		);
		// Heading H1-H6 Colors
		self::customizer_inherit_colors(
			'zenvy_heading_color',
			null,
			[
				'color_1' => '--color-heading',
			]
		);
		// Text Colors
		self::customizer_inherit_colors(
			'zenvy_text_color',
			null,
			[
				'color_1' => '--color-text',
				'color_2' => '--color-text-light',
			]
		);
		// Link Colors
		self::customizer_inherit_colors(
			'zenvy_link_color',
			null,
			[
				'color_1' => '--color-link',
				'color_2' => '--color-link-hover',
			]
		);
		// Border & Shadow Colors
		self::customizer_inherit_colors(
			'zenvy_border_shadow_color',
			null,
			[
				'color_1' => '--color-border',
				'color_2' => '--color-box-shadow',
			]
		);
		// Background Colors
		self::customizer_inherit_colors(
			'zenvy_background_color',
			null,
			[
				'color_1' => '--color-bg',
				'color_2' => '--color-bg-light',
				'color_3' => '--color-bg-dark',
			]
		);

		// Container Width
		self::customizer_inherit_colors(
			'zenvy_container_max_width',
			['desktop' => '1170px'],
			[
				'desktop' => '--container-width',
			]
		);
	}

	/**
	 * Inherit Color for the root
	 *
	 * @access static public
	 * @param string $setting
	 * @param null   $default
	 * @param array  $inheritColors
	 * @return void echo style
	 */
	public static function customizer_inherit_colors($setting, $default = null, $inheritColors = [])
	{

		$values = get_theme_mod($setting, $default);
		$output = '';
		if ($values && $values !== $default) {
			foreach ($values as $index => $val) {
				if (! isset($inheritColors[$index])) {
					continue;
				}

				$output .= $inheritColors[$index] . ':' . esc_attr($val) . ';';
			}
		}

		// Output
		$output = $output !== '' ? ':root{ ' . $output . ' }' : '';

		echo $output; // // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Background control value output
	 *
	 * @access static public
	 * @param array  $selectors
	 * @param string $setting
	 * @param null   $default
	 * @return void echo style
	 */
	public static function background($selectors, $setting, $default = null)
	{

		$values = get_theme_mod($setting, $default);
		$output = '';

		if ($values) {

			// Execute only sectors is array type
			if (is_array($selectors)) {
				$display_type = isset($values['background'])
					? $values['background']
					: (isset($values['image']) ? 'image' : 'color');

				foreach ($selectors as $s_index => $selector) {
					++$s_index;

					// for color
					if ($display_type === 'color' && isset($values['colors'])) {
						$output .= isset($values['colors']['color_' . $s_index]) ? $selector . '{ background-color:' . esc_attr($values['colors']['color_' . $s_index]) . ';}' : '';
					}
					// for gradient
					elseif ($display_type === 'gradient' && isset($values['gradient'])) {
						$output .= $selector . '{';

						$output .= 'background:';
						$output .= isset($values['gradient']['color_' . $s_index]) ? esc_attr($values['gradient']['color_' . $s_index]) : '';
						$output .= ';';

						$output .= 'background:-webkit-linear-gradient(to right,';
						$output .= isset($values['gradient']['color_1']) ? esc_attr($values['gradient']['color_1']) . ', ' : '';
						$output .= isset($values['gradient']['color_2']) ? esc_attr($values['gradient']['color_2']) : '';
						$output .= ');';

						$output .= 'background:linear-gradient(to right,';
						$output .= isset($values['gradient']['color_1']) ? esc_attr($values['gradient']['color_1']) . ', ' : '';
						$output .= isset($values['gradient']['color_2']) ? esc_attr($values['gradient']['color_2']) : '';
						$output .= ');';

						$output .= '}';
					}
					// for image
					elseif ($display_type === 'image' && isset($values['image'])) {
						$output .= $selector . '{ background-image:url("' . esc_url($values['image']) . '");';
						$output .= isset($values['position']) ? 'background-position:' . esc_attr($values['position']) . ';' : '';
						$output .= isset($values['size']) ? 'background-size:' . esc_attr($values['size']) . ';' : '';
						$output .= isset($values['repeat']) ? 'background-repeat:' . esc_attr($values['repeat']) . ';' : '';
						$output .= isset($values['attachment']) ? 'background-attachment:' . esc_attr($values['attachment']) . ';' : '';
						$output .= '}';
					}
				}
			}
		}

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Border control value output
	 *
	 * @access static public
	 * @param array  $selectors
	 * @param string $setting
	 * @param null   $default
	 * @return void echo style
	 */
	public static function border($selectors, $setting, $default = null)
	{

		$values     = get_theme_mod($setting, $default);
		$output     = '';
		$properties = '';

		if ($values) {

			// border radius
			$properties .= isset($values['radius']) ? 'border-radius: ' . esc_attr($values['radius']) . ';' : '';

			// execute if linked is "on"
			if (isset($values['width']) && (count($values['width']) > 4) && $values['width']['linked'] === 'on') {
				$properties .= isset($values['style']) && (isset($values['colors']) && ! empty($values['colors'])) ? 'border: ' : 'border-width: ';
				// width
				$width = '';
				foreach (['side_1', 'side_2', 'side_3', 'side_4'] as $side) {
					if (isset($values['width']) && isset($values['width'][$side])) {
						$width .= esc_attr($values['width'][$side]) . ' ';
						break;
					}
				}

				// Width
				$properties .= esc_attr($width) . ' ';

				// style
				$properties .= isset($values['style']) ? esc_attr($values['style']) . ' ' : '';

				$properties .= ';';
			}
			// Execute if linked is "off"
			else {

				// border width
				$widths = '';
				foreach (['top', 'right', 'bottom', 'left'] as $index => $key) {
					++$index;
					$widths .= isset($values['width']) && isset($values['width']['side_' . $index]) ? 'border-' . $key . '-width: ' . esc_attr($values['width']['side_' . $index]) . ';' : '';
				}
				$properties .= $widths !== '' ? 'border-width: 0;' : '';
				$properties .= esc_attr($widths);
				// border style
				$properties .= isset($values['style']) ? 'border-style: ' . esc_attr($values['style']) . ';' : '';
			}

			// Execute only sectors is array type
			if (is_array($selectors)) {
				foreach ($selectors as $s_index => $selector) {
					++$s_index;
					$border_color = isset($values['colors']) && isset($values['colors']['color_' . $s_index]) ? 'border-color: ' . esc_attr($values['colors']['color_' . $s_index]) . ';' : '';
					$output      .= $selector . '{' . $properties . $border_color . '}';
				}
			}
		}

		// output
		$output = '' !== $output ? $output : '';

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Box Shadow control value output
	 *
	 * @access static public
	 * @param array  $selectors
	 * @param string $setting
	 * @param null   $default
	 * @return void echo style
	 */
	public static function box_shadow($selectors, $setting, $default = null)
	{

		$values     = get_theme_mod($setting, $default);
		$output     = '';
		$properties = '';

		if ($values) {

			// Execute only if blur value is set and value > 0
			if (isset($values['blur'])) {

				// Inset
				$properties .= isset($values['inset']) ? 'inset ' : '';

				// Horizontal Length
				$properties .= isset($values['h_length']) && floatval($values['h_length']) !== 0 ? esc_attr($values['h_length']) . ' ' : '0 ';

				// Vertical Length
				$properties .= isset($values['v_length']) && floatval($values['v_length']) !== 0 ? esc_attr($values['v_length']) . ' ' : '0 ';

				// Blur
				$properties .= floatval($values['blur']) !== 0 ? esc_attr($values['blur']) . ' ' : '0 ';

				// spread
				$properties .= isset($values['spread']) && floatval($values['spread']) !== 0 ? esc_attr($values['spread']) . ' ' : '0 ';

				// Execute only sectors is array type
				if (is_array($selectors)) {
					foreach ($selectors as $s_index => $selector) {
						++$s_index;

						$output .= $selector . '{box-shadow: ';
						$output .= $properties;
						$output .= isset($values['colors']) && isset($values['colors']['color_' . $s_index]) ? esc_attr($values['colors']['color_' . $s_index]) . ';' : ';';
						$output .= '}';
					}
				}
			}
		}

		// Output
		$output = '' !== $output ? $output : '';

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Typography control value output
	 *
	 * @param   array  $selectors
	 * @param   string $control
	 * @param   null   $default
	 * @param   null   $media_query
	 * @return  void echo style
	 */
	public static function typography($selectors, $control, $default = null, $media_query = null)
	{

		$values      = get_theme_mod($control, $default);
		$sm_css      = '';
		$md_css      = '';
		$lg_css      = '';
		$output      = '';
		$media_query = isset($media_query) ? $media_query : ['@media only screen and (min-width:720px)', '@media only screen and (min-width:1024px)'];

		if ($values) {
			if (is_array($selectors)) {
				foreach ($selectors as $s_index => $selector) {
					++$s_index;

					// Font Family
					$sm_css .= isset($values['font_family']) ? 'font-family: ' . esc_attr($values['font_family']) . ';' : '';
					// Font Weight
					$sm_css .= isset($values['weight']) ? 'font-weight: ' . esc_attr($values['weight']) . ';' : '';
					// Font Style
					$sm_css .= isset($values['style']) ? 'font-style: ' . esc_attr($values['style']) . ';' : '';
					// Text Transform
					$sm_css .= isset($values['text_transform']) ? 'text-transform: ' . esc_attr($values['text_transform']) . ';' : '';
					// Text Decoration
					$sm_css .= isset($values['text_decoration']) ? 'text-decoration: ' . esc_attr($values['text_decoration']) . ';' : '';

					// font size
					$sm_css .= isset($values['font_size']['mobile'])
						? 'font-size: ' . esc_attr($values['font_size']['mobile']) . ';'
						: (isset($values['font_size']['tablet'])
							? 'font-size: ' . esc_attr($values['font_size']['tablet']) . ';'
							: (isset($values['font_size']['desktop'])
								? 'font-size: ' . esc_attr($values['font_size']['desktop']) . ';'
								: ''
							)
						);

					$md_css .= isset($values['font_size']['tablet'])
						? 'font-size: ' . esc_attr($values['font_size']['tablet']) . ';'
						: (isset($values['font_size']['desktop']) && isset($values['font_size']['mobile'])
							? 'font-size: ' . esc_attr($values['font_size']['desktop']) . ';'
							: ''
						);

					$lg_css .= isset($values['font_size']['desktop']) && isset($values['font_size']['tablet']) && isset($values['font_size']['mobile'])
						? 'font-size: ' . esc_attr($values['font_size']['desktop']) . ';'
						: '';

					// letter spacing
					$sm_css .= isset($values['letter_spacing']['mobile'])
						? 'letter-spacing: ' . esc_attr($values['letter_spacing']['mobile']) . ';'
						: (isset($values['letter_spacing']['tablet'])
							? 'letter-spacing: ' . esc_attr($values['letter_spacing']['tablet']) . ';'
							: (isset($values['letter_spacing']['desktop'])
								? 'letter-spacing: ' . esc_attr($values['letter_spacing']['desktop']) . ';'
								: ''
							)
						);

					$md_css .= isset($values['letter_spacing']['tablet'])
						? 'letter-spacing: ' . esc_attr($values['letter_spacing']['tablet']) . ';'
						: (isset($values['letter_spacing']['desktop']) && isset($values['letter_spacing']['mobile'])
							? 'letter-spacing: ' . esc_attr($values['letter_spacing']['desktop']) . ';'
							: ''
						);

					$lg_css .= isset($values['letter_spacing']['desktop']) && isset($values['letter_spacing']['tablet']) && isset($values['letter_spacing']['mobile'])
						? 'letter-spacing: ' . esc_attr($values['letter_spacing']['desktop']) . ';'
						: '';

					// Line Height
					$sm_css .= isset($values['line_height']['mobile'])
						? 'line-height: ' . esc_attr($values['line_height']['mobile']) . ';'
						: (isset($values['line_height']['tablet'])
							? 'line-height: ' . esc_attr($values['line_height']['tablet']) . ';'
							: (isset($values['line_height']['desktop'])
								? 'line-height: ' . esc_attr($values['line_height']['desktop']) . ';'
								: ''
							)
						);

					$md_css .= isset($values['line_height']['tablet'])
						? 'line-height: ' . esc_attr($values['line_height']['tablet']) . ';'
						: (isset($values['line_height']['desktop']) && isset($values['line_height']['mobile'])
							? 'line-height: ' . esc_attr($values['line_height']['desktop']) . ';'
							: ''
						);

					$lg_css .= isset($values['line_height']['desktop']) && isset($values['line_height']['tablet']) && isset($values['line_height']['mobile'])
						? 'line-height: ' . esc_attr($values['line_height']['desktop']) . ';'
						: '';

					if ($s_index === 1) {
						// Color
						$sm_css .= isset($values['colors']) && isset($values['colors']['color_' . $s_index]) ? 'color: ' . esc_attr($values['colors']['color_' . $s_index]) . ';' : '';

						// Base CSS
						if ($sm_css !== '') {
							$output .= $selector . '{' . $sm_css . '}';
						}
						// For Medium Device
						if ($md_css !== '') {
							$output .= $media_query[0] . '{' . $selector . '{' . $md_css . '}}';
						}
						// For Large Device
						if ($lg_css !== '') {
							$output .= $media_query[1] . '{' . $selector . '{' . $lg_css . '}}';
						}
					} else {
						// Base CSS
						$output .= isset($values['colors']) && isset($values['colors']['color_' . $s_index]) ? $selector . '{color: ' . esc_attr($values['colors']['color_' . $s_index]) . ';}' : '';
					}
				}
			}
		}

		// Output
		$output = '' !== $output ? $output : '';

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Color control value output
	 *
	 * @access static public
	 * @param array  $selectors
	 * @param string $setting
	 * @param null   $default
	 * @param string $property default is 'color'
	 * @param string $prefix
	 * @param string $suffix
	 * @return void echo style
	 */
	public static function color($selectors, $setting, $default = null, $property = 'color', $prefix = '', $suffix = '')
	{

		$values = get_theme_mod($setting, $default);
		$output = '';

		if ($values) {

			// Execute only sectors is array type
			if (is_array($selectors)) {
				foreach ($selectors as $s_index => $selector) {
					++$s_index;

					$output .= isset($values) && isset($values['color_' . $s_index]) ? $selector . '{' . $property . ': ' . esc_attr($prefix . $values['color_' . $s_index] . $suffix) . ';}' : '';
				}
			}
		}

		// Output
		$output = '' !== $output ? $output : '';

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Range control value output
	 *
	 * @param   string|array $selector
	 * @param   string       $control
	 * @param   null         $default
	 * @param   string       $property default is 'padding'
	 * @param   string       $prefix
	 * @param   string       $suffix
	 * @param   null         $media_query
	 * @return  void echo style
	 */
	public static function range($selector, $control, $default = null, $property = 'padding', $prefix = '', $suffix = '', $media_query = null)
	{

		$values      = get_theme_mod($control, $default);
		$sm_css      = '';
		$md_css      = '';
		$lg_css      = '';
		$output      = '';
		$media_query = isset($media_query) ? $media_query : ['@media only screen and (min-width:720px)', '@media only screen and (min-width:1024px)'];

		if ($values) {
			$selector = is_array($selector) ? join(',', $selector) : $selector;

			// font size
			$sm_css .= isset($values['mobile'])
				? $property . ': ' . esc_attr($prefix . $values['mobile'] . $suffix) . ';'
				: (isset($values['tablet'])
					? $property . ': ' . esc_attr($prefix . $values['tablet'] . $suffix) . ';'
					: (isset($values['desktop'])
						? $property . ': ' . esc_attr($prefix . $values['desktop'] . $suffix) . ';'
						: ''
					)
				);

			$md_css .= isset($values['tablet'])
				? $property . ': ' . esc_attr($prefix . $values['tablet'] . $suffix) . ';'
				: (isset($values['desktop']) && isset($values['mobile'])
					? $property . ': ' . esc_attr($prefix . $values['desktop'] . $suffix) . ';'
					: ''
				);

			$lg_css .= isset($values['desktop']) && isset($values['tablet']) && isset($values['mobile'])
				? $property . ': ' . esc_attr($prefix . $values['desktop'] . $suffix) . ';'
				: '';

			// Base CSS
			if ($sm_css !== '') {
				$output .= $selector . '{' . $sm_css . '}';
			}
			// For Medium Device
			if ($md_css !== '') {
				$output .= $media_query[0] . '{' . $selector . '{' . $md_css . '}}';
			}
			// For Large Device
			if ($lg_css !== '') {
				$output .= $media_query[1] . '{' . $selector . '{' . $lg_css . '}}';
			}
		}

		// Output
		$output = '' !== $output ? $output : '';

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Dimensions control value output
	 *
	 * @param   string|array $selector
	 * @param   string       $control
	 * @param   null         $default
	 * @param   string       $property default is 'padding'
	 * @param   string       $prefix
	 * @param   string       $suffix
	 * @param   null         $media_query
	 * @return  void echo style
	 */
	public static function dimensions($selector, $control, $default = null, $property = 'padding', $prefix = '', $suffix = '', $media_query = null)
	{

		$values      = get_theme_mod($control, $default);
		$sm_css      = '';
		$md_css      = '';
		$lg_css      = '';
		$output      = '';
		$media_query = isset($media_query) ? $media_query : ['@media only screen and (min-width:720px)', '@media only screen and (min-width:1024px)'];

		if ($values) {
			$selector = is_array($selector) ? join(',', $selector) : $selector;

			// width
			foreach (['top', 'right', 'bottom', 'left'] as $index => $key) {
				++$index;

				$sm_css .= isset($values['mobile']) && isset($values['mobile']['side_' . $index])
					? $property . '-' . $key . ': ' . esc_attr($prefix . $values['mobile']['side_' . $index] . $suffix) . ';'
					: (isset($values['tablet']) && isset($values['tablet']['side_' . $index])
						? $property . '-' . $key . ': ' . esc_attr($prefix . $values['tablet']['side_' . $index] . $suffix) . ';'
						: (isset($values['desktop']) && isset($values['desktop']['side_' . $index])
							? $property . '-' . $key . ': ' . esc_attr($prefix . $values['desktop']['side_' . $index] . $suffix) . ';'
							: ''
						)
					);

				$md_css .= isset($values['tablet']) && isset($values['tablet']['side_' . $index])
					? $property . '-' . $key . ': ' . esc_attr($prefix . $values['tablet']['side_' . $index] . $suffix) . ';'
					: (isset($values['desktop']) && isset($values['desktop']['side_' . $index]) && isset($values['mobile']) && isset($values['mobile']['side_' . $index])
						? $property . '-' . $key . ': ' . esc_attr($prefix . $values['desktop']['side_' . $index] . $suffix) . ';'
						: ''
					);

				$lg_css .= isset($values['desktop']) && isset($values['desktop']['side_' . $index]) && isset($values['tablet']) && isset($values['tablet']['side_' . $index]) && isset($values['mobile']) && isset($values['mobile']['side_' . $index])
					? $property . '-' . $key . ': ' . esc_attr($prefix . $values['desktop']['side_' . $index] . $suffix) . ';'
					: '';
			}

			// Base CSS
			if ($sm_css !== '') {
				$output .= $selector . '{' . $sm_css . '}';
			}
			// For Medium Device
			if ($md_css !== '') {
				$output .= $media_query[0] . '{' . $selector . '{' . $md_css . '}}';
			}
			// For Large Device
			if ($lg_css !== '') {
				$output .= $media_query[1] . '{' . $selector . '{' . $lg_css . '}}';
			}
		}

		// Output
		$output = '' !== $output ? $output : '';

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Generate CSS.
	 *
	 * @param array|string    $selector The CSS selector.
	 * @param array           $property  The CSS style.
	 * @param string          $values The CSS value.
	 * @param string          $prefix The CSS prefix.
	 * @param string          $suffix The CSS suffix.
	 * @param void echo style
	 */
	public static function generate_css($selector, $property, $values, $prefix = '', $suffix = '', $media = null)
	{

		$output = '';

		/*
		 * Bail early if we have no $selector elements or properties and $value.
		 */
		if (! $values || ! $selector) {
			return;
		}

		if ($media) {
			$output .= $media . '{';
		}

		$selector = is_array($selector) ? join(',', $selector) : $selector;

		$output .= $selector . '{';
		foreach ($property  as $key => $style) {
			$output .= $style . ':' . esc_attr($prefix . $values . $suffix) . ';';
		}
		$output .= '}';

		if ($media) {
			$output .= '}';
		}

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
new Zenvy_Customizer_Inline_Style();
