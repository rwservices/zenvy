<?php
/**
 * Blogin Aarambha Theme Customizer Footer Menu settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Menu_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_footer_menu_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_menu',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_menu_note_one',
                            'zenvy_footer_menu_spacing',
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_menu_font_colors',
                            'zenvy_footer_menu_background_color',
							'zenvy_footer_menu_note_six',
							'zenvy_footer_menu_container_padding',
							'zenvy_footer_menu_container_margin'
                        )
                    )
                ]
            ],
            // Note One
            'zenvy_footer_menu_note_one' => [
                'type'              => 'heading',
                'description'       => sprintf(__( 'To set menu, go to <a data-type="section" data-id="menu_locations" class="customizer-focus"><strong>Footer Menu</strong></a>', 'zenvy' )),
                'section'           => 'footer_menu',
                'priority'          => 10,
            ],
            // Items Spacing
            'zenvy_footer_menu_spacing' => [
                'type'              => 'range',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Menu Spacing', 'zenvy' ),
                'description'       => esc_html__( 'Slide to set Menu Spacing.', 'zenvy' ),
                'section'           => 'footer_menu',
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'priority'          => 20
            ],
            // Menu font color
            'zenvy_footer_menu_font_colors' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Font Colors', 'zenvy' ),
                'description'       => esc_html__( 'Set menu normal and hover colors.', 'zenvy' ),
                'section'           => 'footer_menu',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' )
                ],
                'priority'          => 35,
                'inherits'            => [
                    'color_1'           => 'var(--color-white)',
                    'color_2'           => 'var(--color-gray-500)',
                ],
            ],
            // Menu Background
            'zenvy_footer_menu_background_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background', 'zenvy' ),
                'description'       => esc_html__( 'Set menu each item background.', 'zenvy' ),
                'section'           => 'footer_menu',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' )
                ],
                'priority'          => 40,
                'inherits'            => [
                    'color_1'           => 'var(--color-bg-dark)',
                    'color_2'           => 'var(--color-bg-dark)',
                ],
            ],
			// Heading four
			'zenvy_footer_menu_note_six' => [
				'type'              => 'heading',
				'label'             => esc_html__( 'CONTAINER', 'zenvy' ),
				'section'           => 'footer_menu',
				'priority'          => 65,
			],
			// Container Padding
			'zenvy_footer_menu_container_padding' => [
				'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '10px',
                        'side_3'            => '10px',
                        'linked'            => 'off'
                    ]
                ],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set Padding to the Footer Menu.', 'zenvy' ),
				'section'           => 'footer_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 70,
			],
			// Container Margin
			'zenvy_footer_menu_container_margin' => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set Margin to the Footer Menu.', 'zenvy' ),
				'section'           => 'footer_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 75,
			],
        ];
    }

}
new Zenvy_Customize_Footer_Menu_Fields();
