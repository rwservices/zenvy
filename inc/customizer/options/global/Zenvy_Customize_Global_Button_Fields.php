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
            // Type
			'zenvy_button_type'       => [
				'type'              => 'buttonset',
				'default'           => [ 'desktop' => 'button' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Display as', 'zenvy' ),
				'section'           => 'zenvy_button_section',
				'priority'          => 5,
				'choices'           => [
					'text'   => esc_html__( 'Text', 'zenvy' ),
					'button' => esc_html__( 'Button', 'zenvy' ),
				],
			],
			// Button Arrow
			'zenvy_button_arrow' => [
				'type'              => 'toggle',
				'default'           => ['desktop'=>'true'],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Button Arrow', 'zenvy' ),
				'description'       => esc_html__( 'Info::- Enable Arrow Icon after Text and this works only if button type is text.', 'zenvy' ),
				'section'           => 'zenvy_button_section',
				'priority'          => 10,
			],
            // Color
            'zenvy_button_text_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Text Color', 'zenvy' ),
                'section'           => 'zenvy_button_section',
                'priority'          => 15,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-text)',
                    'color_2'           => 'var(--color-secondary)',
                ]
            ],
            'zenvy_button_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Button Color', 'zenvy' ),
                'section'           => 'zenvy_button_section',
                'priority'          => 15,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-button)',
                    'color_2'           => 'var(--color-button-hover)',
                ]
            ],
            // Background Color
            'zenvy_button_bg_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Button BG', 'zenvy' ),
                'section'           => 'zenvy_button_section',
                'priority'          => 15,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'inherits'            => [
                    'color_1'           => 'var(--bg-button)',
                    'color_2'           => 'var(--bg-button-hover)',
                ]
            ],
            // Border
            'zenvy_button_border' => [
                'type'              => 'border',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_border' ],
                'label'             => esc_html__( 'Button Border', 'zenvy' ),
                'section'           => 'zenvy_button_section',
                'priority'          => 15,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-border-button)',
                ],
            ],
            
        ];
    }

}
new Zenvy_Customize_Global_Button_Fields();
