<?php
/**
 * Blogin Aarambha Theme Customizer Header Account settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Account_Fields extends Zenvy_Customize_Base_Field {


	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_header_account_group_settings'    => [
				'type'     => 'group',
				'section'  => 'account',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_header_account_note_one',
							'zenvy_header_account_login_text',
							'zenvy_header_account_login_url',
							'zenvy_header_account_note_two',
							'zenvy_header_account_logout_text',
							'zenvy_header_account_logout_url',
							'zenvy_header_account_note_three',
							'zenvy_header_account_url_target',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_account_container_padding',
							'zenvy_header_account_container_margin',
							'zenvy_header_account_icon_color',
							'zenvy_header_account_background',
							'zenvy_header_account_padding',
							'zenvy_header_account_border',
						],
					],
				],
			],
			// Note One
			'zenvy_header_account_note_one'          => [
				'type'     => 'heading',
				'label'    => esc_html__( 'LOGIN', 'zenvy' ),
				'section'  => 'account',
				'priority' => 15,
			],
			// Login Text
			'zenvy_header_account_login_text'        => [
				'type'              => 'text',
				'default'           => esc_html__( 'My Account', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Text', 'zenvy' ),
				'section'           => 'account',
				'priority'          => 20,
			],
			// Account URL
			'zenvy_header_account_login_url'         => [
				'type'              => 'url',
				'default'           => '#',
				'sanitize_callback' => 'esc_url_raw',
				'label'             => esc_html__( 'URL', 'zenvy' ),
				'section'           => 'account',
				'priority'          => 25,
			],
			// Note Two
			'zenvy_header_account_note_two'          => [
				'type'     => 'heading',
				'label'    => esc_html__( 'LOGOUT', 'zenvy' ),
				'section'  => 'account',
				'priority' => 30,
			],
			// Logout Text
			'zenvy_header_account_logout_text'       => [
				'type'              => 'text',
				'default'           => esc_html__( 'Log In', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Text', 'zenvy' ),
				'section'           => 'account',
				'priority'          => 35,
			],
			// Logout URL
			'zenvy_header_account_logout_url'        => [
				'type'              => 'url',
				'default'           => wp_login_url(),
				'sanitize_callback' => 'esc_url_raw',
				'label'             => esc_html__( 'URL', 'zenvy' ),
				'section'           => 'account',
				'priority'          => 40,
			],
			// Note Three
			'zenvy_header_account_note_three'        => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SETTINGS', 'zenvy' ),
				'section'  => 'account',
				'priority' => 45,
			],
			// Link Open
			'zenvy_header_account_url_target'        => [
				'type'              => 'toggle',
				'default'           => '',
				'section'           => 'account',
				'priority'          => 50,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Link Open', 'zenvy' ),
				'description'       => esc_html__( 'Toggle to enable link open in new window tab.', 'zenvy' ),
			],
			// Padding
			'zenvy_header_account_container_padding' => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set account container padding.', 'zenvy' ),
				'section'           => 'account',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 55,
			],
			// Margin
			'zenvy_header_account_container_margin'  => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set account container margin.', 'zenvy' ),
				'section'           => 'account',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 55,
			],
			// Icon Color
			'zenvy_header_account_icon_color'        => [
				'type'              => 'color',
				'default'           => [
					'color_1' => 'var(--color-white)',
					'color_2' => 'var(--color-white)',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Account', 'zenvy' ),
				'description'       => esc_html__( 'Set account text color.', 'zenvy' ),
				'section'           => 'account',
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
					'color_2' => esc_html__( 'Hover', 'zenvy' ),
				],
				'priority'          => 60,
				'inherits'          => [
					'color_1' => 'var(--color-white)',
					'color_2' => 'var(--color-white)',
				],
			],

			// Background
			'zenvy_header_account_background'        => [
				'type'              => 'color',
				'default'           => [
					'color_1' => 'var(--color-link)',
					'color_2' => 'var(--color-link-hover)',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Background', 'zenvy' ),
				'description'       => esc_html__( 'Set account background.', 'zenvy' ),
				'section'           => 'account',
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
					'color_2' => esc_html__( 'Hover', 'zenvy' ),
				],
				'priority'          => 65,
				'inherits'          => [
					'color_1' => 'var(--color-link)',
					'color_2' => 'var(--color-link-hover)',
				],
			],
		
			// Padding
			'zenvy_header_account_padding'           => [
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
				'description'       => esc_html__( 'Set account padding.', 'zenvy' ),
				'section'           => 'account',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 70,
			],
		];
	}
}
new Zenvy_Customize_Header_Account_Fields();
