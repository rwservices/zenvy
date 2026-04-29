<?php
/**
 * Zenvy Theme Customizer Header Search Icon settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Search_Icon_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_header_search_icon_group_settings'    => [
				'type'     => 'group',
				'section'  => 'search_icon',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_header_search_icon_placeholder',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_search_icon_container_padding',
							'zenvy_header_search_icon_container_margin',
						],
					],
				],
			],
			// Placeholder
			'zenvy_header_search_icon_placeholder'       => [
				'type'              => 'text',
				'default'           => esc_html__( 'Search...', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Placeholder', 'zenvy' ),
				'description'       => esc_html__( 'Set Search Model with placeholder.', 'zenvy' ),
				'section'           => 'search_icon',
				'priority'          => 15,
			],
			// Padding
			'zenvy_header_search_icon_container_padding' => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set search icon container padding.', 'zenvy' ),
				'section'           => 'search_icon',
				'priority'          => 31,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_header_search_icon_container_margin'  => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set search icon container margin.', 'zenvy' ),
				'section'           => 'search_icon',
				'priority'          => 32,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
		];
	}
}
new Zenvy_Customize_Header_Search_Icon_Fields();
