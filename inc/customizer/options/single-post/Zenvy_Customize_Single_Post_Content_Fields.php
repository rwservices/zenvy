<?php
/**
 * Zenvy Theme Customizer Single Post Element settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Single_Post_Content_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [

			// Entry Header
			'zenvy_single_post_content_entry_header_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-meta', 'post-title'],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Header Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable to show Header elements in posts and rearrange them by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_single_post_content_section',
				'priority'          => 5,
				'choices'           => [
					'post-cats'  => esc_html__( 'Categories', 'zenvy' ),
					'post-title' => esc_html__( 'Post Title', 'zenvy' ),
					'post-meta'  => esc_html__( 'Post Meta', 'zenvy' ),
				],
			],

			// Entry Footer
			'zenvy_single_post_content_entry_footer_elements' => [
				'type'              => 'sortable',
				'default'           => [ 'post-comments', 'post-navigation' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Footer Elements', 'zenvy' ),
				'description'       => esc_html__( 'To display lists of Footer Elements, enable them. And sort them by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_single_post_content_section',
				'priority'          => 10,
				'choices'           => [
					'tags'            => esc_html__( 'Tags', 'zenvy' ),
					'post-comments'   => esc_html__( 'Comments', 'zenvy' ),
					'post-navigation' => esc_html__( 'Post Navigation', 'zenvy' ),
					'author-box'      => esc_html__( 'Author Box', 'zenvy' ),
					'related-posts'   => esc_html__( 'Related Posts', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Single_Post_Content_Fields();
