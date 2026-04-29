<?php
/**
 * Zenvy Theme Customizer Header Social Icons settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Social_Icons_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_header_social_icon_group_settings' => [
				'type'     => 'group',
				'section'  => 'social_icons',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_header_social_icon_note_one',
							'zenvy_header_social_icon_link_open',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_social_icon_padding',
							'zenvy_header_social_icon_margin',
							'zenvy_header_social_icon_note_two',
							'zenvy_header_social_icon_item_border',
							'zenvy_header_social_icon_item_padding',
							'zenvy_header_social_icon_item_margin',
						],
					],
				],
			],
			// Heading One
			'zenvy_header_social_icon_note_one'       => [
				'type'        => 'heading',
				'description' => sprintf( __( 'Configure social icons in Global &raquo; Social &raquo; <a data-type="control" data-id="zenvy_social_icons" class="customizer-focus"><strong> Social Icons </strong></a>.', 'zenvy' ) ),
				'section'     => 'social_icons',
				'priority'    => 15,
			],
			// Link Open
			'zenvy_header_social_icon_link_open'      => [
				'type'              => 'toggle',
				'default'           => '',
				'section'           => 'social_icons',
				'priority'          => 40,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Link Open', 'zenvy' ),
				'description'       => esc_html__( 'Enable to open the link in the new tab.', 'zenvy' ),
			],
			// Padding
			'zenvy_header_social_icon_padding'        => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set social container padding.', 'zenvy' ),
				'section'           => 'social_icons',
				'priority'          => 42,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_header_social_icon_margin'         => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set social container margin.', 'zenvy' ),
				'section'           => 'social_icons',
				'priority'          => 45,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Heading One
			'zenvy_header_social_icon_note_two'       => [
				'type'     => 'heading',
				'label'    => esc_html__( 'ITEM', 'zenvy' ),
				'section'  => 'social_icons',
				'priority' => 50,
			],
			// Border
			'zenvy_header_social_icon_item_border'    => [
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
				'description'       => esc_html__( 'Set each item border width.', 'zenvy' ),
				'section'           => 'social_icons',
				'priority'          => 65,
				'fields'            => [ 'width' => true ],
			],
			// Padding
			'zenvy_header_social_icon_item_padding'   => [
				'type'              => 'dimensions',
				'default'           => [
					'desktop' => [
						'side_1' => '10px',
						'side_2' => '15px',
						'side_3' => '10px',
						'side_4' => '15px',
						'linked' => 'off',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set each item padding.', 'zenvy' ),
				'section'           => 'social_icons',
				'priority'          => 80,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_header_social_icon_item_margin'    => [
				'type'              => 'dimensions',
				'default'           => [
					'desktop' => [
						'side_1' => '0px',
						'side_2' => '0px',
						'side_3' => '0px',
						'side_4' => '0px',
						'linked' => 'on',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set each item margin.', 'zenvy' ),
				'section'           => 'social_icons',
				'priority'          => 85,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],

		];
	}
}
new Zenvy_Customize_Header_Social_Icons_Fields();
