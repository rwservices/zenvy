<?php
/**
 * Zenvy Theme Customizer Post Meta settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Post_Meta_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Meta Elements
			'zenvy_meta_elements' => [
				'type'              => 'sortable',
				'default'           => [ 'date', 'categories' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable Post Meta elements and rearrange lists using drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_post_meta_section',
				'priority'          => 10,
				'choices'           => [
					'author'     => esc_html__( 'Author', 'zenvy' ),
					'categories' => esc_html__( 'Categories', 'zenvy' ),
					'tags'       => esc_html__( 'Tags', 'zenvy' ),
					'date'       => esc_html__( 'Publish Date', 'zenvy' ),
					'comment'    => esc_html__( 'Comments', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Global_Post_Meta_Fields();
