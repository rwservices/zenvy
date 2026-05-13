<?php
/**
 * Blogin Aarambha Theme Customizer Footer Top Row settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Top_Row_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_footer_top_row_group_settings' => [
                'type'              => 'group',
                'section'           => 'zenvy_footer_top',
                'priority'          => 5,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_top_row_left_col_content_justify',
                            'zenvy_footer_top_row_center_col_content_justify',
                            'zenvy_footer_top_row_right_col_content_justify'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_top_row_background_overlay',
                            'zenvy_footer_top_row_padding'
                        )
                    )
                ]
            ],

			// Left Column Justify Content
			'zenvy_footer_top_row_left_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'start',
					'tablet'    => 'start',
					'mobile'    => 'start'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Left Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Left Column.', 'zenvy' ),
				'section'           => 'zenvy_footer_top',
				'priority'          => 17,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Center Column Justify Content
			'zenvy_footer_top_row_center_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'center',
					'tablet'    => 'center',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Center Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Center Column.', 'zenvy' ),
				'section'           => 'zenvy_footer_top',
				'priority'          => 18,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Right Column Justify Content
			'zenvy_footer_top_row_right_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'end',
					'tablet'    => 'end',
					'mobile'    => 'end'
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Right Column', 'zenvy' ),
				'description'       => esc_html__( 'Choose position for the content in the Right Column.', 'zenvy' ),
				'section'           => 'zenvy_footer_top',
				'priority'          => 19,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'zenvy' ),
					'center'    => esc_html__( 'Center', 'zenvy' ),
					'end'       => esc_html__( 'End', 'zenvy' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
            // Background Overlay
            'zenvy_footer_top_row_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg-dark)'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
                'description'       => esc_html__( 'Set Background overlay color for top row container.', 'zenvy' ),
                'section'           => 'zenvy_footer_top',
                'priority'          => 20,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-dark)'
                ],
                'fields'            => ['colors' => true],
            ],
            // Padding
            'zenvy_footer_top_row_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '25px',
                        'side_3'            => '25px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'section'           => 'zenvy_footer_top',
                'priority'          => 35,
                'description'       => esc_html__( 'Set footer top row padding.', 'zenvy' ),
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ]
            ]
        ];
    }

}
new Zenvy_Customize_Footer_Top_Row_Fields();
