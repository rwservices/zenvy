<?php
/**
 * Blogin Aarambha Theme Customizer Header Primary Menu settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Primary_Menu_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_header_primary_menu_group_settings' => [
                'type'              => 'group',
                'section'           => 'primary_menu',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_primary_menu_note_one',
                            'zenvy_header_primary_parent_menu_spacing'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_primary_menu_note_five',
                            'zenvy_header_primary_parent_menu_colors',
                            'zenvy_header_primary_parent_menu_background_color',
                            'zenvy_header_primary_menu_note_three',
                            'zenvy_header_primary_child_menu_colors',
                            'zenvy_header_primary_child_menu_background_colors',
                            'zenvy_header_primary_child_menu_border',
                            'zenvy_header_primary_menu_note_four',
							'zenvy_header_primary_menu_container_padding',
							'zenvy_header_primary_menu_container_margin',

                        )
                    )
                ]
            ],
            // Note One
            'zenvy_header_primary_menu_note_one' => [
                'type'              => 'heading',
				'description'       => sprintf(__( 'To set menu, go to <a data-type="section" data-id="menu_locations" class="customizer-focus"><strong>Primary Menu</strong></a>', 'zenvy' )),
                'section'           => 'primary_menu',
                'priority'          => 10,
            ],
            // Items Spacing
            'zenvy_header_primary_parent_menu_spacing' => [
                'type'              => 'range',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Menu Spacing', 'zenvy' ),
                'description'       => esc_html__( 'Slide to change the value of Parent Menu Spacing.', 'zenvy' ),
                'section'           => 'primary_menu',
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'priority'          => 20
            ],
            // Heading Three
            'zenvy_header_primary_menu_note_five' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'PARENT MENU', 'zenvy' ),
                'section'           => 'primary_menu',
                'priority'          => 53,
            ],
            // Menu Colors
            'zenvy_header_primary_parent_menu_colors' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Colors', 'zenvy' ),
                'description'       => esc_html__( 'Set parent menu each item normal and hover colors.', 'zenvy' ),
                'section'           => 'primary_menu',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' )
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)',
                ],
                'priority'          => 55,
            ],
            // Menu Background
            'zenvy_header_primary_parent_menu_background_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background', 'zenvy' ),
                'description'       => esc_html__( 'Set parent menu each item background.', 'zenvy' ),
                'section'           => 'primary_menu',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' )
                ],
                'priority'          => 60,
                'inherits'            => [
                    'color_1'           => 'var(--color-bg-1)',
                    'color_2'           => 'var(--color-bg-1)',
                ],
            ],
            // Heading Three
            'zenvy_header_primary_menu_note_three' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'CHILD MENU', 'zenvy' ),
                'section'           => 'primary_menu',
                'priority'          => 70,
            ],
            // Child Menu Colors
            'zenvy_header_primary_child_menu_colors' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Colors', 'zenvy' ),
                'description'       => esc_html__( 'Set child menu each item normal and hover colors.', 'zenvy' ),
                'section'           => 'primary_menu',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' )
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-bg-1)',
                ],
                'priority'          => 75,
            ],
            // SubMenu Background
            'zenvy_header_primary_child_menu_background_colors' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background Colors', 'zenvy' ),
                'description'       => esc_html__( 'Set child menu each item background colors.', 'zenvy' ),
                'section'           => 'primary_menu',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' )
                ],
                'priority'          => 80,
                'inherits'            => [
                    'color_1'           => 'var(--color-bg-1)',
                    'color_2'           => 'var(--color-bg-3)',
                ],
            ],
            // child menu border
            'zenvy_header_primary_child_menu_border' => [
                'type'              => 'border',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_border' ],
                'label'             => esc_html__( 'Border Color', 'zenvy' ),
                'description'       => esc_html__( 'Set child menu bottom border color.', 'zenvy' ),
                'section'           => 'primary_menu',
                'priority'          => 90,
                'fields'            => ['colors'=>true],
                'inherits'            => [
                    'color_1'           => 'var(--color-1)'
                ],
            ],
            // Heading four
            'zenvy_header_primary_menu_note_four' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'CONTAINER', 'zenvy' ),
                'section'           => 'primary_menu',
                'priority'          => 105,
            ],
			// Container Padding
			'zenvy_header_primary_menu_container_padding' => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set primary menu container padding.', 'zenvy' ),
				'section'           => 'primary_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 110,
			],
			// Container Margin
			'zenvy_header_primary_menu_container_margin' => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set primary menu container margin.', 'zenvy' ),
				'section'           => 'primary_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 115,
			]
        ];
    }

}
new Zenvy_Customize_Header_Primary_Menu_Fields();
