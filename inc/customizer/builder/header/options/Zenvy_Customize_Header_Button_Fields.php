<?php
/**
 * Zenvy Theme Customizer Header Button settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Button_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_header_button_group_settings' => [
				'type'     => 'group',
				'section'  => 'button_one',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_header_button_text',
							'zenvy_header_button_url',
							'zenvy_header_button_url_target',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_button_border',
							'zenvy_header_button_padding',
							'zenvy_header_button_margin',
						],
					],
				],
			],
			// Text
			'zenvy_header_button_text'           => [
				'type'              => 'text',
				'default'           => esc_html__( 'ENG', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Text', 'zenvy' ),
				'section'           => 'button_one',
				'priority'          => 20,
			],
			// URL
			'zenvy_header_button_url'            => [
				'type'              => 'url',
				'default'           => '#',
				'sanitize_callback' => 'esc_url_raw',
				'label'             => esc_html__( 'URL', 'zenvy' ),
				'section'           => 'button_one',
				'priority'          => 25,
			],
			// Link Open
			'zenvy_header_button_url_target'     => [
				'type'              => 'toggle',
				'default'           => '',
				'section'           => 'button_one',
				'priority'          => 50,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Link Open', 'zenvy' ),
				'description'       => esc_html__( 'Enable to open the link in the new tab.', 'zenvy' ),
			],
			// Border
			'zenvy_header_button_border'         => [
				'type'              => 'border',
				'default'           => [
					'width' => [
						'side_1' => '1px',
						'side_2' => '1px',
						'side_3' => '1px',
						'side_4' => '1px',
						'linked' => 'off',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_border' ],
				'label'             => esc_html__( 'Border', 'zenvy' ),
				'description'       => esc_html__( 'Set button border width.', 'zenvy' ),
				'section'           => 'button_one',
				'priority'          => 65,
				'fields'            => [ 'width' => true ],
			],
			// Padding
			'zenvy_header_button_padding'        => [
				'type'              => 'dimensions',
				'default'           => [
					'desktop' => [
						'side_1' => '12px',
						'side_2' => '18px',
						'side_3' => '12px',
						'side_4' => '18px',
						'linked' => 'off',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set button padding.', 'zenvy' ),
				'section'           => 'button_one',
				'priority'          => 75,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_header_button_margin'         => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set button margin.', 'zenvy' ),
				'section'           => 'button_one',
				'priority'          => 80,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],

		];
	}
}
new Zenvy_Customize_Header_Button_Fields();
