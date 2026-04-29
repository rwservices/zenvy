<?php
/**
 * Zenvy Theme Customizer Header Primary Menu settings
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
				'type'     => 'group',
				'section'  => 'primary_menu',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_header_primary_menu_note_one',
							'zenvy_header_primary_parent_menu_spacing',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_primary_menu_note_four',
							'zenvy_header_primary_menu_padding',
							'zenvy_header_primary_menu_margin',

						],
					],
				],
			],
			// Note One
			'zenvy_header_primary_menu_note_one'       => [
				'type'        => 'heading',
				'description' => sprintf( __( 'To set menu, go to <a data-type="section" data-id="menu_locations" class="customizer-focus"><strong>Primary Menu</strong></a>', 'zenvy' ) ),
				'section'     => 'primary_menu',
				'priority'    => 10,
			],
			// Items Spacing
			'zenvy_header_primary_parent_menu_spacing' => [
				'type'              => 'range',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Menu Spacing', 'zenvy' ),
				'description'       => esc_html__( 'Slide to change the value of Parent Menu Spacing.', 'zenvy' ),
				'section'           => 'primary_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 20,
			],
			// Heading four
			'zenvy_header_primary_menu_note_four'      => [
				'type'     => 'heading',
				'label'    => esc_html__( 'CONTAINER', 'zenvy' ),
				'section'  => 'primary_menu',
				'priority' => 105,
			],
			// Container Padding
			'zenvy_header_primary_menu_padding'        => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set primary menu container padding.', 'zenvy' ),
				'section'           => 'primary_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 110,
			],
			// Container Margin
			'zenvy_header_primary_menu_margin'         => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set primary menu container margin.', 'zenvy' ),
				'section'           => 'primary_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 115,
			],
		];
	}
}
new Zenvy_Customize_Header_Primary_Menu_Fields();
