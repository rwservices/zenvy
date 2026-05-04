<?php
/**
 * Zenvy Theme Customizer Front Page Explore Section settings
 * 
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Explore_Section_Fields extends Zenvy_Customize_Base_Field {
	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_explore_section_group_settings' => [
				'type'     => 'group',
				'section'  => 'zenvy_front_page_explore_section',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_explore_section_heading',
							'zenvy_front_page_explore_section_lists',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_explore_section_background',
							'zenvy_front_page_explore_section_background_overlay',

						],
					],
				],
			],
			// Heading
			'zenvy_front_page_explore_section_heading' => [
				'type'              => 'text',
				'default'           => esc_html__( 'Explore our topics', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Section Heading', 'zenvy' ),
				'section'           => 'zenvy_front_page_explore_section',
				'priority'          => 14,
			],

			// Background Image
			'zenvy_front_page_explore_section_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_explore_section',
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
			'zenvy_front_page_explore_section_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background' => 'color',
					'colors'     => [
						'color_1' => 'var(--color-bg-4)',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_explore_section',
				'priority'          => 26,
				'inherits'          => [
					'color_1' => 'var(--color-bg-4)',
				],
				'fields'            => [ 'colors' => true ],
			],
		];
	}
}
new Zenvy_Customize_Front_Page_Explore_Section_Fields();
