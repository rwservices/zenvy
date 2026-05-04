<?php
/**
 * Zenvy Theme Customizer Single Post Meta settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Single_Post_Meta_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Meta Elements
			'zenvy_single_post_meta_elements'   => [
				'type'              => 'sortable',
				'default'           => [ 'date', 'categories' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'zenvy' ),
				'description'       => esc_html__( 'To display post meta data and rearrange them with drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_single_post_meta_section',
				'priority'          => 10,
				'choices'           => [
					'author'     => esc_html__( 'Author', 'zenvy' ),
					'comments'   => esc_html__( 'Comments', 'zenvy' ),
					'categories' => esc_html__( 'Categories', 'zenvy' ),
					'tags'       => esc_html__( 'Tags', 'zenvy' ),
					'date'  	 => esc_html__( 'Post Date', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Single_Post_Meta_Fields();
