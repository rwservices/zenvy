<?php
/**
 * Zenvy Theme Customizer Front Page Featured Properties Sections settings
 *
 * @package Zenvy
 */



class Zenvy_Customize_Front_Page_Property_Type_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_property_type_group_settings' => [
				'type'     => 'group',
				'section'  => 'zenvy_front_page_property_type_section',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_property_types',
							'zenvy_front_page_property_type_limits',
							'zenvy_front_page_property_type_view_all_btn',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_property_section_divider',
							'zenvy_front_page_property_type_background',
							'zenvy_front_page_property_type_background_overlay',
						],
					],
				],
			],
			// Number of posts
			'zenvy_front_page_property_type_limits'       => [
				'type'              => 'range',
				'default'           => [ 'desktop' => 6 ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Posts Limit', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_type_section',
				'priority'          => 18,
				'units'             => [],
				'input_attrs'       => [
					'min' => 0,
					'max' => 20,
				],
			],
			'zenvy_front_page_property_type_view_all_btn' => [
				'type'              => 'toggle',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'View All', 'zenvy' ),
				'description'       => esc_html__( 'Toggle to show/hide view all button.', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_type_section',
				'priority'          => 18,
			],
			// Heading One
			'zenvy_front_page_property_section_divider'   => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SECTION STYLING', 'zenvy' ),
				'section'  => 'zenvy_front_page_property_type_section',
				'priority' => 19,
			],
			// Background Image
			'zenvy_front_page_property_type_background'   => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set background image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_type_section',
				'priority'          => 20,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_property_type_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background' => 'color',
					'colors'     => [
						'color_1' => 'var(--color-bg)',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_type_section',
				'priority'          => 20,
				'inherits'          => [
					'color_1' => 'var(--color-bg)',
				],
				'fields'            => [ 'colors' => true ],
			],
		];
	}
}
new Zenvy_Customize_Front_Page_Property_Type_Fields();
