<?php
/**
 * Blogin Aarambha Theme Customizer Header Color Mode settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Color_Mode_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_header_color_mode_group_settings' => [
                'type'              => 'group',
                'section'           => 'color_mode',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'custom_logo',
                            'zenvy_header_color_mode_icon_size'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_color_mode_icon_color',
                            'zenvy_header_color_mode_icon_bg_color',
                            'zenvy_header_color_mode_padding',
                            'zenvy_header_color_mode_margin'
                        )
                    )
                ]
            ],
            // Font Size
			'zenvy_header_color_mode_icon_size' => [
				'type'              => 'range',
				'default'           => ['desktop' => '13px'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Icon Size', 'zenvy' ),
				'section'           => 'color_mode',
				'priority'          => 15,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
            // Icon color
            'zenvy_header_color_mode_icon_color' => [
                'type'              => 'color',
                'default'           => ['color_1' => 'var(--color-link)'],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Icon Color', 'zenvy' ),
                'section'           => 'color_mode',
                'priority'          => 20,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                ],
                'inherits'          => [
                    'color_1'           => 'var(--color-link)',
                ]
            ],
            // Icon background color
            'zenvy_header_color_mode_icon_bg_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background Color', 'zenvy' ),
                'section'           => 'color_mode',
                'priority'          => 30,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)',
                ]
            ],
            // Padding
            'zenvy_header_color_mode_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set container padding.', 'zenvy' ),
                'section'           => 'color_mode',
                'priority'          => 35,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'zenvy_header_color_mode_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'zenvy' ),
                'description'       => esc_html__( 'Set container margin.', 'zenvy' ),
                'section'           => 'color_mode',
                'priority'          => 40,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Zenvy_Customize_Header_Color_Mode_Fields();
