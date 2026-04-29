<?php
/**
 * Zenvy Theme Customizer Footer Social Icons settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Social_Icons_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_footer_social_icon_group_settings' => [
				'type'     => 'group',
				'section'  => 'footer_social',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_footer_social_icon_note_one',
							'zenvy_footer_social_icon_link_open',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_footer_social_icon_padding',
							'zenvy_footer_social_icon_margin',
							'zenvy_footer_social_icon_note_two',
							'zenvy_footer_social_icon_item_border',
							'zenvy_footer_social_icon_item_padding',
							'zenvy_footer_social_icon_item_margin',
						],
					],
				],
			],
			// Heading One
			'zenvy_footer_social_icon_note_one'       => [
				'type'        => 'heading',
				'description' => sprintf( __( 'Configure social icons in Global &raquo; Social &raquo; <a data-type="control" data-id="zenvy_social_icons" class="customizer-focus"><strong> Social Icons </strong></a>.', 'zenvy' ) ),
				'section'     => 'footer_social',
				'priority'    => 15,
			],
			// Link Open
			'zenvy_footer_social_icon_link_open'      => [
				'type'              => 'toggle',
				'default'           => '',
				'section'           => 'footer_social',
				'priority'          => 40,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Link Open', 'zenvy' ),
				'description'       => esc_html__( 'Enable to open the link in the new tab.', 'zenvy' ),
			],
			// Padding
			'zenvy_footer_social_icon_padding'        => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set social container padding.', 'zenvy' ),
				'section'           => 'footer_social',
				'priority'          => 42,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_footer_social_icon_margin'         => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set social container margin.', 'zenvy' ),
				'section'           => 'footer_social',
				'priority'          => 45,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Heading One
			'zenvy_footer_social_icon_note_two'       => [
				'type'     => 'heading',
				'label'    => esc_html__( 'ITEM', 'zenvy' ),
				'section'  => 'footer_social',
				'priority' => 50,
			],
			// Border
			'zenvy_footer_social_icon_item_border'    => [
				'type'              => 'border',
				'default'           => [
					'width' => [
						'side_1' => '0px',
						'side_2' => '0px',
						'side_3' => '0px',
						'side_4' => '0px',
						'linked' => 'on',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_border' ],
				'label'             => esc_html__( 'Border', 'zenvy' ),
				'description'       => esc_html__( 'Set border width to each item.', 'zenvy' ),
				'section'           => 'footer_social',
				'priority'          => 65,
				'fields'            => [ 'width' => true ],
			],
			// Padding
			'zenvy_footer_social_icon_item_padding'   => [
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
				'description'       => esc_html__( 'Set padding to each item.', 'zenvy' ),
				'section'           => 'footer_social',
				'priority'          => 80,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_footer_social_icon_item_margin'    => [
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
				'description'       => esc_html__( 'Set margin to each item.', 'zenvy' ),
				'section'           => 'footer_social',
				'priority'          => 85,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],

		];
	}
}
new Zenvy_Customize_Footer_Social_Icons_Fields();
