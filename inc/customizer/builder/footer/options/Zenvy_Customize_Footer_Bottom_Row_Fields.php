<?php
/**
 * Zenvy Theme Customizer Footer Bottom Row settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Bottom_Row_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Left Column Justify Content
			'zenvy_footer_bottom_row_left_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'start',
					'tablet'    => 'start',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Left Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Left Column.', 'zenvy' ),
				'section'           => 'zenvy_footer_bottom',
				'priority'          => 17,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Center Column Justify Content
			'zenvy_footer_bottom_row_center_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'center',
					'tablet'    => 'center',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Center Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Center Column.', 'zenvy' ),
				'section'           => 'zenvy_footer_bottom',
				'priority'          => 18,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Right Column Justify Content
			'zenvy_footer_bottom_row_right_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'end',
					'tablet'    => 'end',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Right Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Right Column.', 'zenvy' ),
				'section'           => 'zenvy_footer_bottom',
				'priority'          => 19,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
            // Background Overlay
            'zenvy_footer_bottom_row_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg-3)'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
                'description'       => esc_html__( 'Set Background overlay color for bottom row container.', 'zenvy' ),
                'section'           => 'zenvy_footer_bottom',
                'priority'          => 20,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-3)'
                ],
                'fields'            => ['colors' => true],
            ],
            // Padding
            'zenvy_footer_bottom_row_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'section'           => 'zenvy_footer_bottom',
                'priority'          => 35,
                'description'       => esc_html__( 'Set footer bottom row padding.', 'zenvy' ),
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ]
            ]
        ];
    }

}
new Zenvy_Customize_Footer_Bottom_Row_Fields();
