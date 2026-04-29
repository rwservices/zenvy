<?php
/**
 * Zenvy Theme Customizer Front Page Services Sections settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Services_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_services_group_settings' => [
				'type'              => 'group',
				'section'           => 'zenvy_front_page_services_section',
				'priority'          => 10,
				'choices'           => [
					'normal'            => array(
						'tab-title'     => esc_html__( 'General', 'zenvy' ),
						'controls'      => array(
							'zenvy_front_page_services_section_heading',
							'zenvy_front_page_services_page'

						)
					),
					'hover'         => array(
						'tab-title'     => esc_html__( 'Style', 'zenvy' ),
						'controls'      => array(
							'zenvy_front_page_services_heading_one',
							'zenvy_front_page_services_background',
							'zenvy_front_page_services_background_overlay'
						)
					)
				]
			],
			// Heading
			'zenvy_front_page_services_section_heading' => [
				'type'              => 'text',
				'default'           => esc_html__( 'why people choose us', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Section Heading', 'zenvy' ),
				'section'           => 'zenvy_front_page_services_section',
				'priority'          => 10,
			],
			// Heading One
			'zenvy_front_page_services_heading_one' => [
				'type'              => 'heading',
				'label'             => esc_html__( 'SECTION STYLING', 'zenvy' ),
				'section'           => 'zenvy_front_page_services_section',
				'priority'          => 21,
			],
			// Select Page
			'zenvy_front_page_services_page' => [
				'type'              => 'select',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Select Page', 'zenvy' ),
				'section'           => 'zenvy_front_page_services_section',
				'priority'          => 25,
				'choices'  			=> Zenvy_Helper::get_posts(
					array(
						'posts_per_page' => -1,
						'post_type'      => 'page'
					)
				)
			],
			// Background Image
			'zenvy_front_page_services_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set background image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_services_section',
				'priority'          => 30,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
			// Background Overlay
			'zenvy_front_page_services_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background'        => 'color',
					'colors'            => [
						'color_1'           => 'var(--color-bg)'
					]
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_services_section',
				'priority'          => 31,
				'inherits'          => [
					'color_1'           => 'var(--color-bg)'
				],
				'fields'            => ['colors' => true],
			]
		];
	}

}
new Zenvy_Customize_Front_Page_Services_Fields();
