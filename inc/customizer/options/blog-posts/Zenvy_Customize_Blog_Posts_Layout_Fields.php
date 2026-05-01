<?php
/**
 * Zenvy Theme Customizer Blog Posts Layout settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Blog_Posts_Layout_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			'zenvy_blog_posts_layout' => [
				'type'              => 'radio_image',
				'default'           => 'alt',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Blog Posts Layout', 'zenvy' ),
				'description'       => esc_html__( 'Select the layout for blog posts.', 'zenvy' ),
				'section'           => 'zenvy_blog_posts_layout_section',
				'priority'          => 5,
				'choices'           => [
					'alt'  => ZENVY_THEME_URI . 'assets/build/images/alt-layout.png',
					'right' => ZENVY_THEME_URI . 'assets/build/images/right-layout.png',
					'left'  => ZENVY_THEME_URI . 'assets/build/images/left-layout.png',
					'grid' => ZENVY_THEME_URI . 'assets/build/images/grid-layout.png',
					'list' => ZENVY_THEME_URI . 'assets/build/images/list-layout.png',
				],
				'l10n'              => [
					'alt'  => esc_html__( 'Alternative', 'zenvy' ),
					'right' => esc_html__( 'Right', 'zenvy' ),
					'left'  => esc_html__( 'Left', 'zenvy' ),
					'grid' => esc_html__( 'Grid', 'zenvy' ),
					'list' => esc_html__( 'List', 'zenvy' ),
				],
			],
			// Posts Elements
			'zenvy_blog_posts_elements'      => [
				'type'              => 'sortable',
				'default'           => [ 'post-meta', 'post-title', 'post-excerpt', 'read-more' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Content Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable lists for blog post content elements and rearrange the order by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_blog_posts_layout_section',
				'priority'          => 10,
				'choices'           => [
					'post-title'   => esc_html__( 'Post Title', 'zenvy' ),
					'post-meta'    => esc_html__( 'Post Meta', 'zenvy' ),
					'post-excerpt' => esc_html__( 'Post Excerpt', 'zenvy' ),
					'read-more'    => esc_html__( 'Read More', 'zenvy' ),
				],
			],
			// Meta Elements
			'zenvy_blog_posts_meta_elements' => [
				'type'              => 'sortable',
				'default'           => [ 'date', 'categories' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable Post Meta elements and rearrange lists using drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_blog_posts_layout_section',
				'priority'          => 15,
				'choices'           => [
					'author'     => esc_html__( 'Author', 'zenvy' ),
					'categories' => esc_html__( 'Categories', 'zenvy' ),
					'tags'       => esc_html__( 'Tags', 'zenvy' ),
					'date'       => esc_html__( 'Publish Date', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Blog_Posts_Layout_Fields();
