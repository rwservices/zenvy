<?php

/**
 * Zenvy Theme Customizer Front Page Trending Posts settings
 * 
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Trending_Posts_Fields extends Zenvy_Customize_Base_Field
{
	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init()
	{
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_trending_posts_group_settings' => [
				'type'     => 'group',
				'section'  => 'zenvy_front_page_trending_posts_section',
				'priority' => 1,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__('General', 'zenvy'),
						'controls'  => [
							'zenvy_front_page_trending_posts_limit',
							'zenvy_front_page_trending_posts_featured_image_tags',
							'zenvy_front_page_trending_posts_elements',
							'zenvy_front_page_trending_posts_note_one',
							'zenvy_trending_posts_read_btn_type',
							'zenvy_front_page_trending_posts_note_two',
							'zenvy_front_page_trending_posts_enable_sidebar',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__('Style', 'zenvy'),
						'controls'  => [
							'zenvy_front_page_trending_posts_background',
							'zenvy_front_page_trending_posts_background_overlay',
						],
					],
				],
			],
			// Trending post limit
			'zenvy_front_page_trending_posts_limit' => [
				'type'              => 'range',
				'default'           => ['desktop' => 3],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range'],
				'label'             => esc_html__('Number of Trending Posts', 'zenvy'),
				'description'       => esc_html__('Set the number of trending posts to display. It will display 3 posts by default.', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 5,
				'units' 		   => [],
				'input_attrs'           => [
					'min'   => 1,
					'max'   => 10,
					'step'  => 1,
				],
			],
			// Enable/Disable Tags
			'zenvy_front_page_trending_posts_featured_image_tags' => [
				'type'              => 'toggle',
				'default'           => ['desktop' => 'true'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle'],
				'label'             => esc_html__('Tags', 'zenvy'),
				'description'       => esc_html__('Enable / Disable tags on featured image.', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 10,
			],
			// Posts Elements
			'zenvy_front_page_trending_posts_elements'      => [
				'type'              => 'sortable',
				'default'           => ['post-meta', 'post-title', 'post-excerpt', 'read-more'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable'],
				'label'             => esc_html__('Content Elements', 'zenvy'),
				'description'       => esc_html__('Enable lists for blog post content elements and rearrange the order by drag and drop.', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 15,
				'choices'           => [
					'post-title'   => esc_html__('Post Title', 'zenvy'),
					'post-meta'    => esc_html__('Post Meta', 'zenvy'),
					'post-excerpt' => esc_html__('Post Excerpt', 'zenvy'),
					'read-more'    => esc_html__('Read More', 'zenvy'),
				],
			],

			// Note One
			'zenvy_front_page_trending_posts_note_one' => [
				'type'              => 'heading',
				'label'             => esc_html__('READ MORE BUTTON', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 19,
			],
			// Type
			'zenvy_trending_posts_read_btn_type'       => [
				'type'              => 'buttonset',
				'default'           => ['desktop' => 'default'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset'],
				'label'             => esc_html__('Display as', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 20,
				'choices'           => [
					'default' => esc_html__('Default', 'zenvy'),
					'text'   => esc_html__('Text', 'zenvy'),
					'button' => esc_html__('Button', 'zenvy'),
				],
			],

			// Note Two
			'zenvy_front_page_trending_posts_note_two' => [
				'type'              => 'heading',
				'label'             => esc_html__('SIDEBAR', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 29,
			],
			// Show Trending Posts Sidebar Section
			'zenvy_front_page_trending_posts_enable_sidebar' => [
				'type'              => 'toggle',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle'],
				'label'             => esc_html__('Show Trending Posts Sidebar Section', 'zenvy'),
				'description'       => esc_html__('Enable this option to show sidebar in trending posts section. Sidebar Name: Trending Posts Sidebar', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 30,
			],

			// Background Image
			'zenvy_front_page_trending_posts_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background'],
				'label'             => esc_html__('Background Image', 'zenvy'),
				'description'       => esc_html__('Set Background Image for container.', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 35,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_trending_posts_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background' => 'color',
					'colors'     => [
						'color_1' => 'var(--color-bg-4)',
					],
				],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background'],
				'label'             => esc_html__('Background Overlay', 'zenvy'),
				'description'       => esc_html__('Set background overlay color for container.', 'zenvy'),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 40,
				'inherits'          => [
					'color_1' => 'var(--color-bg-4)',
				],
				'fields'            => ['colors' => true],
			],
		];
	}
}

new Zenvy_Customize_Front_Page_Trending_Posts_Fields();
