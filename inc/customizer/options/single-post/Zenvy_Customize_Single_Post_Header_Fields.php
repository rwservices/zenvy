<?php
/**
 * Zenvy Theme Customizer Single Post Header settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Single_Post_Header_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Post Header
			'zenvy_single_post_header_elements' => [
				'type'              => 'sortable',
				'default'           => [ 'post-meta','post-title' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable lists of page header elements and rearrange the order by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title' => esc_html__( 'Post Title', 'zenvy' ),
					'post-meta'  => esc_html__( 'Post Meta', 'zenvy' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'zenvy' ),
				],
			],
			// Meta Elements
			'zenvy_single_post_meta_elements'   => [
				'type'              => 'sortable',
				'default'           => [ 'post-date', 'tags' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'zenvy' ),
				'description'       => esc_html__( 'To display post meta data and rearrange them with drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'author'     => esc_html__( 'Author', 'zenvy' ),
					'comments'   => esc_html__( 'Comments', 'zenvy' ),
					'categories' => esc_html__( 'Categories', 'zenvy' ),
					'tags'       => esc_html__( 'Tags', 'zenvy' ),
					'post-date'  => esc_html__( 'Post Date', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Single_Post_Header_Fields();
