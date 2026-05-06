<?php
/**
 * Blogin Aarambha Theme Customizer Header Search Icon settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Search_Icon_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_header_search_icon_group_settings' => [
                'type'              => 'group',
                'section'           => 'search_icon',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_search_icon_placeholder'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_search_icon_container_padding',
                            'zenvy_header_search_icon_container_margin',
                            'zenvy_header_search_icon_color',
                            'zenvy_header_search_icon_background',
                            'zenvy_header_search_icon_padding'
                        )
                    )
                ]
            ],
            // Placeholder
            'zenvy_header_search_icon_placeholder' => [
                'type'              => 'text',
                'default'           => esc_html__( 'Search...', 'zenvy' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Placeholder', 'zenvy' ),
                'description'       => esc_html__( 'Set Search Model with placeholder.', 'zenvy' ),
                'section'           => 'search_icon',
                'priority'          => 15,
            ],
            // Padding
            'zenvy_header_search_icon_container_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set search icon container padding.', 'zenvy' ),
                'section'           => 'search_icon',
                'priority'          => 20,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'zenvy_header_search_icon_container_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'zenvy' ),
                'description'       => esc_html__( 'Set search icon container margin.', 'zenvy' ),
                'section'           => 'search_icon',
                'priority'          => 25,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Icon Color
            'zenvy_header_search_icon_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Icon', 'zenvy' ),
                'description'       => esc_html__( 'Set icon color.', 'zenvy' ),
                'section'           => 'search_icon',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'priority'          => 30,
                'inherits'          => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)',
                ]
            ],
            // Background
            'zenvy_header_search_icon_background' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background', 'zenvy' ),
                'description'       => esc_html__( 'Set icon  background.', 'zenvy' ),
                'section'           => 'search_icon',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'priority'          => 35,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-1)',
                    'color_2'           => 'var(--color-bg-1)',
                ]
            ],
            // Padding
            'zenvy_header_search_icon_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '11px',
                        'side_2'            => '18px',
                        'side_3'            => '11px',
                        'side_4'            => '18px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set search icon padding.', 'zenvy' ),
                'section'           => 'search_icon',
                'priority'          => 40,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            
        ];
    }

}
new Zenvy_Customize_Header_Search_Icon_Fields();
