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
