<?php
/**
 * Zenvy Theme Customizer Front Page Blog Posts Sections settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_News_Blog_Fields extends Zenvy_Customize_Base_Field {

	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_news_blog_group_settings'  => [
				'type'     => 'group',
				'section'  => 'zenvy_front_page_news_blog_section',
				'priority' => 1,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_news_blog_section_heading',
							'zenvy_front_page_news_blog_posts_by_cat',
							'zenvy_front_page_news_blog_posts_limit',
							'zenvy_front_page_news_blog_post_elements',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_news_blog_heading_one',
							'zenvy_front_page_news_blog_section_background',
							'zenvy_front_page_news_blog_section_background_overlay',
						],
					],
				],
			],
			// Heading
			'zenvy_front_page_news_blog_section_heading' => [
				'type'              => 'text',
				'default'           => esc_html__( 'latest news and blog', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Section Heading', 'zenvy' ),
				'section'           => 'zenvy_front_page_news_blog_section',
				'priority'          => 5,
			],
			// Post By Category
			'zenvy_front_page_news_blog_posts_by_cat'    => [
				'type'              => 'select',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Posts by Category', 'zenvy' ),
				'description'       => esc_html__( 'Set post query to load with specific category. It will load the latest post by default.', 'zenvy' ),
				'section'           => 'zenvy_front_page_news_blog_section',
				'priority'          => 10,
				'choices'           => Zenvy_Helper::get_terms( 'category' ),
			],
			// Number of Slides
			'zenvy_front_page_news_blog_posts_limit'     => [
				'type'              => 'range',
				'default'           => [ 'desktop' => 3 ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Posts Limit', 'zenvy' ),
				'section'           => 'zenvy_front_page_news_blog_section',
				'priority'          => 10,
				'units'             => [],
				'input_attrs'       => [
					'min'  => 1,
					'step' => 1,
					'max'  => 20,
				],
			],
			// Posts Elements
			'zenvy_front_page_news_blog_post_elements'   => [
				'type'              => 'sortable',
				'default'           => [ 'post-meta', 'post-title', 'post-excerpt' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable blog post content elements and rearrange the list by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_front_page_news_blog_section',
				'priority'          => 10,
				'choices'           => [
					'post-title'   => esc_html__( 'Post Title', 'zenvy' ),
					'post-meta'    => esc_html__( 'Categories/Author', 'zenvy' ),
					'post-excerpt' => esc_html__( 'Post Excerpt', 'zenvy' ),
				],
			],
			// Heading One
			'zenvy_front_page_news_blog_heading_one'     => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SECTION STYLE', 'zenvy' ),
				'section'  => 'zenvy_front_page_news_blog_section',
				'priority' => 5,
			],
			// Background Image
			'zenvy_front_page_news_blog_section_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set background image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_news_blog_section',
				'priority'          => 5,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_news_blog_section_background_overlay' => [
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
				'section'           => 'zenvy_front_page_news_blog_section',
				'priority'          => 5,
				'inherits'          => [
					'color_1' => 'var(--color-bg)',
				],
				'fields'            => [ 'colors' => true ],
			],
		];
	}
}
new Zenvy_Customize_Front_Page_News_Blog_Fields();
