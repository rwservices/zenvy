<?php
/**
 * Zenvy Theme Customizer Front Page Property Locations Sections settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Property_Locations_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_featured_categories_group_settings' => [
				'type'     => 'group',
				'section'  => 'zenvy_front_page_property_locations_section',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_property_locations_section_heading',
							'zenvy_front_page_property_locations_limits',
							'zenvy_front_page_property_location_view_all_btn',
							'zenvy_front_page_property_locations_view_all_btn_link',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_property_locations_heading_one',
							'zenvy_front_page_property_locations_background',
							'zenvy_front_page_property_locations_background_overlay',
						],
					],
				],
			],
			// Section Heading
			'zenvy_front_page_property_locations_section_heading' => [
				'type'              => 'text',
				'default'           => esc_html__( 'Reality Property Location', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Section Heading', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_locations_section',
				'priority'          => 14,
			],
			// Number of posts
			'zenvy_front_page_property_locations_limits' => [
				'type'              => 'range',
				'default'           => [ 'desktop' => 6 ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Posts Limit', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_locations_section',
				'priority'          => 16,
				'units'             => [],
				'input_attrs'       => [
					'min' => 0,
					'max' => 20,
				],
			],
			'zenvy_front_page_property_location_view_all_btn' => [
				'type'              => 'toggle',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'View All', 'zenvy' ),
				'description'       => esc_html__( 'Toggle to show/hide view all button.', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_locations_section',
				'priority'          => 18,
			],
			// Button URL
			'zenvy_front_page_property_locations_view_all_btn_link' => [
				'type'              => 'text',
				'default'           => '#',
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Button Link', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_locations_section',
				'priority'          => 19,
			],
			// Heading One
			'zenvy_front_page_property_locations_heading_one' => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SECTION STYLING', 'zenvy' ),
				'section'  => 'zenvy_front_page_property_locations_section',
				'priority' => 20,
			],
			// Background Image
			'zenvy_front_page_property_locations_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set background image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_locations_section',
				'priority'          => 25,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_property_locations_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'colors' => [
						'color_1' => 'var(--color-bg-4)',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_property_locations_section',
				'priority'          => 26,
				'inherits'          => [
					'color_1' => 'var(--color-bg-4)',
				],
				'fields'            => [ 'colors' => true ],
			],
		];
	}
}
new Zenvy_Customize_Front_Page_Property_Locations_Fields();
