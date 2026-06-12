<?php
/**
 * Blogin Aarambha Theme Customizer Header Toggle Menu settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Toggle_Menu_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {

		$this->args = [
			// Grouping Settings
			'zenvy_header_toggle_menu_group_settings' => [
				'type'     => 'group',
				'section'  => 'toggle_menu',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_header_toggle_menu_note_one',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_toggle_menu_note_two',
							'zenvy_header_toggle_menu_icon_color',
							'zenvy_header_toggle_menu_icon_background_color',
							'zenvy_header_toggle_menu_note_three',
							'zenvy_header_toggle_menu_text_typo',
							'zenvy_header_toggle_menu_dropdown_container_menu_background',
							'zenvy_header_toggle_menu_padding',
							'zenvy_header_toggle_menu_margin',

						],
					],
				],
			],
			// Note One
			'zenvy_header_toggle_menu_note_one'       => [
				'type'        => 'heading',
				'description' => sprintf( __( 'To set menu, go to <a data-type="section" data-id="menu_locations" class="customizer-focus"><strong>Mobile Menu</strong></a>', 'zenvy' ) ),
				'section'     => 'toggle_menu',
				'priority'    => 10,
			],
			// Note two
			'zenvy_header_toggle_menu_note_two'       => [
				'type'        => 'heading',
				'description' => esc_html__( 'Menu Icon', 'zenvy' ),
				'section'     => 'toggle_menu',
				'priority'    => 40,
			],
			// Icon Color
			'zenvy_header_toggle_menu_icon_color'     => [
				'type'              => 'color',
				'default'           => [
					'color_1' => 'var(--color-bg-dark)',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Color', 'zenvy' ),
				'description'       => esc_html__( 'Set trigger menu icon color.', 'zenvy' ),
				'section'           => 'toggle_menu',
				'priority'          => 40,
				'inherits'          => [
					'color_1' => 'var(--color-bg-dark)',
				],
			],
			// Icon Background Color
			'zenvy_header_toggle_menu_icon_background_color' => [
				'type'              => 'color',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Background Color', 'zenvy' ),
				'description'       => esc_html__( 'Set trigger menu icon background color.', 'zenvy' ),
				'section'           => 'toggle_menu',
				'priority'          => 40,
				'inherits'          => [
					'color_1' => 'var(--color-bg)',
				],
			],
			// Note three
			'zenvy_header_toggle_menu_note_three'     => [
				'type'        => 'heading',
				'description' => esc_html__( 'Dropdown Container', 'zenvy' ),
				'section'     => 'toggle_menu',
				'priority'    => 60,
			],
			// Menu Typography
			'zenvy_header_toggle_menu_text_typo'      => [
				'type'              => 'typography',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
				'label'             => esc_html__( 'Menu Color', 'zenvy' ),
				'description'       => esc_html__( 'Set menu & submenu text color.', 'zenvy' ),
				'section'           => 'toggle_menu',
				'priority'          => 61,
				'units'             => [ 'px', 'rem', 'pt', 'em', 'vw' ],
				'inherits'          => [
					'color_1' => 'var(--color-white)',
				],
				'fields'            => [ 'colors' => true ],
			],
			// Menu Background
			'zenvy_header_toggle_menu_dropdown_container_menu_background' => [
				'type'              => 'color',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Menu Background', 'zenvy' ),
				'description'       => esc_html__( 'Set dropdown container each menu background colors.', 'zenvy' ),
				'section'           => 'toggle_menu',
				'priority'          => 65,
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
					'color_2' => esc_html__( 'Hover', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'rgba(0, 0, 0, 0.8)',
					'color_2' => '#ca77b4',
				],
			],
			// Container Padding
			'zenvy_header_toggle_menu_padding'        => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set toggle menu container padding.', 'zenvy' ),
				'section'           => 'toggle_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 70,
			],
			// Container Margin
			'zenvy_header_toggle_menu_margin'         => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set toggle menu container margin.', 'zenvy' ),
				'section'           => 'toggle_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 75,
			],

		];
	}
}
new Zenvy_Customize_Header_Toggle_Menu_Fields();
