<?php
/**
 * Zenvy Theme Customizer Header Toggle Menu settings
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
