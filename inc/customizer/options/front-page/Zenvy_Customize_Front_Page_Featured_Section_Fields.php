<?php
/**
 * Zenvy Theme Customizer Front Page Featured Section settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Featured_Section_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_featured_section_group_settings' => [
				'type'     => 'group',
				'section'  => 'zenvy_front_page_featured_section',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_featured_section_tag',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_featured_section_background',
							'zenvy_front_page_featured_section_background_overlay',
						],
					],
				],
			],
			// Tag to be featured 
			'zenvy_front_page_featured_section_tag' => [
				'type'              => 'select',
				'default'           => esc_html__( 'Tag to be Featured', 'zenvy' ),
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_choices'],
				'label'             => esc_html__( 'Tag to be Featured', 'zenvy' ),
				'description'       => esc_html__( 'Set post query to load with specific tag. It will load the latest post by default.', 'zenvy' ),
				'section'           => 'zenvy_front_page_featured_section',
				'priority'          => 15,
				'choices'           => Zenvy_Helper::get_terms( 'post_tag' ), 
			],

			// Featured post limit
			'zenvy_front_page_featured_section_posts_limit' => [
				'type'              => 'range',
				'default'           => [ 'desktop' => 3 ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Number of Featured Posts', 'zenvy' ),
				'description'       => esc_html__( 'Set the number of featured posts to display. It will display 1 post by default.', 'zenvy' ),
				'section'           => 'zenvy_front_page_featured_section',
				'priority'          => 20,
				'units' 		   => [],
				'input_attrs'           => [
					'min'  => 1,
					'step' => 1,
					'max'  => 10,
				],
			],

			// Post elements
			'zenvy_front_page_featured_section_post_elements' => [
				'type'			  => 'sortable',
				'default'		  => [ 'post-meta', 'title', 'excerpt', 'read_more' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'			  => esc_html__( 'Post Elements', 'zenvy' ),
				'description'	  => esc_html__( 'Set post elements to display for featured posts.', 'zenvy' ),
				'section'		  => 'zenvy_front_page_featured_section',
				'priority'		  => 25,
				'choices'		  => [
					'post-meta' => esc_html__( 'Post Meta', 'zenvy' ),
					'title'     => esc_html__( 'Title', 'zenvy' ),
					'excerpt'   => esc_html__( 'Excerpt', 'zenvy' ),
					'read_more' => esc_html__( 'Read More', 'zenvy' ),
				],
			],

			// Background Image
			'zenvy_front_page_featured_section_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_featured_section',
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
			'zenvy_front_page_featured_section_background_overlay' => [
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
				'section'           => 'zenvy_front_page_featured_section',
				'priority'          => 26,
				'inherits'          => [
					'color_1' => 'var(--color-bg-4)',
				],
				'fields'            => [ 'colors' => true ],
			],
		];
	}
}
new Zenvy_Customize_Front_Page_Featured_Section_Fields();