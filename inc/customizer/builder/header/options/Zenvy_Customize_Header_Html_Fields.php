<?php
/**
 * Zenvy Theme Customizer Header HTML settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Html_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_header_html_group_settings' => [
				'type'     => 'group',
				'section'  => 'html',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'custom_logo',
							'zenvy_header_html_text',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_html_padding',
							'zenvy_header_html_margin',
						],
					],
				],
			],
			// Textarea
			'zenvy_header_html_text'           => [
				'type'              => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'wp_kses_post',
				'label'             => esc_html__( 'HTML', 'zenvy' ),
				'description'       => esc_html__( 'Enter Text/Simple HTML Code', 'zenvy' ),
				'section'           => 'html',
				'priority'          => 15,
			],
			// Padding
			'zenvy_header_html_padding'        => [
				'type'              => 'dimensions',
				'default'           => [
					'desktop' => [
						'side_1' => '10px',
						'side_3' => '10px',
						'linked' => 'off',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set HTML container padding.', 'zenvy' ),
				'section'           => 'html',
				'priority'          => 55,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_header_html_margin'         => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set HTML container margin.', 'zenvy' ),
				'section'           => 'html',
				'priority'          => 60,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
		];
	}
}
new Zenvy_Customize_Header_Html_Fields();
