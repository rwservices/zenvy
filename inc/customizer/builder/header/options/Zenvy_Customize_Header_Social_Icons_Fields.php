<?php
/**
 * Blogin Aarambha Theme Customizer Header Social Icons settings
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
			'zenvy_header_social_icon_group_settings'  => [
				'type'     => 'group',
				'section'  => 'social_icons',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_header_social_icon_note_one',
							'zenvy_header_social_icon_gap',
							'zenvy_header_social_icon_link_open',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_social_icon_padding',
							'zenvy_header_social_icon_margin',
							'zenvy_header_social_icon_note_two',
							'zenvy_header_social_icon_item_icon_color',
							'zenvy_header_social_icon_item_background',
							'zenvy_header_social_icon_item_padding',
							'zenvy_header_social_icon_item_border',
						],
					],
				],
			],
			// Heading One
			'zenvy_header_social_icon_note_one'        => [
				'type'        => 'heading',
				'description' => sprintf( __( 'Configure social icons in Global &raquo; Social &raquo; <a data-type="control" data-id="zenvy_social_icons" class="customizer-focus"><strong> Social Icons </strong></a>.', 'zenvy' ) ),
				'section'     => 'social_icons',
				'priority'    => 15,
			],
			// Item Gap
			'zenvy_header_social_icon_gap'             => [
				'type'              => 'range',
				'default'           => [
					'desktop' => '2px',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Item Gap', 'zenvy' ),
				'description'       => esc_html__( 'Set gap between each social icon lists.', 'zenvy' ),
				'section'           => 'social_icons',
				'priority'          => 35,
				'input_attrs'       => [
					'min' => 0,
					'max' => 50,
				],
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Link Open
			'zenvy_header_social_icon_link_open'       => [
				'type'              => 'toggle',
				'default'           => '',
				'section'           => 'social_icons',
				'priority'          => 40,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Link Open', 'zenvy' ),
				'description'       => esc_html__( 'Enable to open the link in the new tab.', 'zenvy' ),
			],
			// Padding
			'zenvy_header_social_icon_padding'         => [
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
			'zenvy_header_social_icon_margin'          => [
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
			'zenvy_header_social_icon_note_two'        => [
				'type'     => 'heading',
				'label'    => esc_html__( 'ITEM', 'zenvy' ),
				'section'  => 'social_icons',
				'priority' => 50,
			],
			// Icon Color
			'zenvy_header_social_icon_item_icon_color' => [
				'type'              => 'color',
				'default'           => [
					'color_1' => 'var(--color-link)',
					'color_2' => 'var(--color-link-hover)',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Icon', 'zenvy' ),
				'description'       => esc_html__( 'Set each items icon as same color.', 'zenvy' ),
				'section'           => 'social_icons',
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
					'color_2' => esc_html__( 'Hover', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-link)',
					'color_2' => 'var(--color-link-hover)',
				],
				'priority'          => 55,
			],
			// Background Color
			'zenvy_header_social_icon_item_background' => [
				'type'              => 'color',
				'default'           => [
					'color_1' => 'var(--color-bg)',
					'color_2' => 'var(--color-bg)',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Background', 'zenvy' ),
				'description'       => esc_html__( 'Set each item background color.', 'zenvy' ),
				'section'           => 'social_icons',
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
					'color_2' => esc_html__( 'Hover', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-bg)',
					'color_2' => 'var(--color-bg)',
				],
				'priority'          => 60,
			],
			// Padding
			'zenvy_header_social_icon_item_padding'    => [
				'type'              => 'dimensions',
				'default'           => [
					'desktop' => [
						'side_1' => '11px',
						'side_2' => '18px',
						'side_3' => '11px',
						'side_4' => '18px',
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
			// Border
			'zenvy_header_social_icon_item_border'     => [
				'type'              => 'border',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_border' ],
				'label'             => esc_html__( 'Border', 'zenvy' ),
				'section'           => 'social_icons',
				'priority'          => 85,
				'fields'            => [
					'width'  => true,
					'colors' => true,
				],
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-border)',
				],
			],
		];
	}
}
new Zenvy_Customize_Header_Social_Icons_Fields();
