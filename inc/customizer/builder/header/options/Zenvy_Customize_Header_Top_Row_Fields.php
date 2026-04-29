<?php
/**
 * Zenvy Theme Customizer Header Top Row settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Top_Row_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Min Height
			'zenvy_header_top_row_height' => [
				'type'              => 'range',
				'default'           => ['desktop' => '0px'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Min Height', 'zenvy' ),
				'description'       => esc_html__( 'To set Min Height at the top row of Header.', 'zenvy' ),
				'section'           => 'zenvy_header_top',
				'priority'          => 15,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'input_attrs'       => [
					'min'               => 0,
					'max'               => 400
				]
			],
			// Left Column Justify Content
			'zenvy_header_top_row_left_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'start',
					'tablet'    => 'start',
					'mobile'    => 'start'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Left Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Left Column.', 'zenvy' ),
				'section'           => 'zenvy_header_top',
				'priority'          => 17,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Center Column Justify Content
			'zenvy_header_top_row_center_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'center',
					'tablet'    => 'center',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Center Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Center Column.', 'zenvy' ),
				'section'           => 'zenvy_header_top',
				'priority'          => 18,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Right Column Justify Content
			'zenvy_header_top_row_right_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'end',
					'tablet'    => 'end',
					'mobile'    => 'end'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Right Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Right Column.', 'zenvy' ),
				'section'           => 'zenvy_header_top',
				'priority'          => 19,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
            // Background Overlay
            'zenvy_header_top_row_background_overlay' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
                'description'       => esc_html__( 'Set Background overlay color for top row container.', 'zenvy' ),
                'section'           => 'zenvy_header_top',
                'priority'          => 20,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)'
                ],
                'fields'            => ['colors' => true],
            ],
        ];
    }

}
new Zenvy_Customize_Header_Top_Row_Fields();
