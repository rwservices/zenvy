<?php 
/**
 * Zenvy Customizer Global Button Fields
 * 
 * @package Zenvy
 */

class Zenvy_Customize_Global_Button_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Color
            'zenvy_button_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Font Color', 'zenvy' ),
                'section'           => 'zenvy_button_section',
                'priority'          => 15,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-white)',
                    'color_2'           => 'var(--color-white)',
                ]
            ],
            // Background Color
            'zenvy_button_bg_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background Color', 'zenvy' ),
                'section'           => 'zenvy_button_section',
                'priority'          => 15,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)',
                ]
            ],
            // Border
            'zenvy_button_border' => [
                'type'              => 'border',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_border' ],
                'label'             => esc_html__( 'Border', 'zenvy' ),
                'section'           => 'zenvy_button_section',
                'priority'          => 15,
				'fields'            => ['colors' => true, 'radius' => true],
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-link)',
                ],
            ]
        ];
    }

}
new Zenvy_Customize_Global_Button_Fields();
