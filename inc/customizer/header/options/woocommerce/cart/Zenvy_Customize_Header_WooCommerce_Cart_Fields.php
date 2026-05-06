<?php
/**
 * Blogin Aarambha Theme Customizer Header WooCommerce Cart settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_WooCommerce_Cart_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {

        $this->args = [
            // Grouping Settings
            'zenvy_header_woocommerce_cart_group_settings' => [
                'type'              => 'group',
                'section'           => Zenvy_WooCommerce_Cart_Header()->element,
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_woocommerce_cart_icon',
                            'zenvy_header_woocommerce_cart_icon_size'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_woocommerce_cart_icon_color',
                            'zenvy_header_woocommerce_cart_icon_background',
                            'zenvy_header_woocommerce_cart_padding',
                            'zenvy_header_woocommerce_cart_margin'

                        )
                    )
                ]
            ],
            // Icon
            'zenvy_header_woocommerce_cart_icon' => [
                'type'              => 'icon_select',
                'default'           => 'fas fa-bullhorn',
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Icon', 'zenvy' ),
                'section'           => Zenvy_WooCommerce_Cart_Header()->element,
                'priority'          => 10,
                'choices'           => [
                    'fas fa-shopping-cart'      => 'fas fa-shopping-cart',
                    'fas fa-shopping-basket'    => 'fas fa-shopping-basket',
                    'fas fa-shopping-bag'       => 'fas fa-shopping-bag',
                    'fas fa-cart-arrow-down'    => 'fas fa-cart-arrow-down',
                    'fas fa-cart-plus'          => 'fas fa-cart-plus',
                    'fas fa-truck'              => 'fas fa-truck'
                ]
            ],
            // Icon Size
            'zenvy_header_woocommerce_cart_icon_size' => [
                'type'              => 'range',
                'default'           => ['desktop' => '16px'],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Icon Size', 'zenvy' ),
                'description'       => esc_html__( 'Set WooCommerce cart icon size.', 'zenvy' ),
                'section'           => Zenvy_WooCommerce_Cart_Header()->element,
                'priority'          => 10,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],

            // Icon Color
            'zenvy_header_woocommerce_cart_icon_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Cart Icon', 'zenvy' ),
                'description'       => esc_html__( 'Set WooCommerce cart icon color.', 'zenvy' ),
                'section'           => Zenvy_WooCommerce_Cart_Header()->element,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'priority'          => 55,
                'inherits'          => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)',
                ]
            ],
            // Background
            'zenvy_header_woocommerce_cart_icon_background' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Cart Background', 'zenvy' ),
                'description'       => esc_html__( 'Set WooCommerce cart icon background.', 'zenvy' ),
                'section'           => Zenvy_WooCommerce_Cart_Header()->element,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'priority'          => 60,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-1)',
                    'color_2'           => 'var(--color-bg-1)',
                ]
            ],
            // Padding
            'zenvy_header_woocommerce_cart_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '12px',
                        'side_2'            => '18px',
                        'side_3'            => '12px',
                        'side_4'            => '18px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set WooCommerce cart padding.', 'zenvy' ),
                'section'           => Zenvy_WooCommerce_Cart_Header()->element,
                'priority'          => 75,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'zenvy_header_woocommerce_cart_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'zenvy' ),
                'description'       => esc_html__( 'Set WooCommerce cart margin.', 'zenvy' ),
                'section'           => Zenvy_WooCommerce_Cart_Header()->element,
                'priority'          => 80,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Zenvy_Customize_Header_WooCommerce_Cart_Fields();
