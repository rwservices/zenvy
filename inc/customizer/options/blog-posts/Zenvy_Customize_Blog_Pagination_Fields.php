<?php
/**
 * Zenvy Theme Customizer Blog Pagination settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Blog_Pagination_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Pagination Type
			'zenvy_blog_pagination_type' => [
				'type'              => 'select',
				'default'           => 'nxt-prv',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Pagination Type', 'zenvy' ),
				'section'           => 'zenvy_blog_pagination_section',
				'priority'          => 15,
				'choices'           => [
					'nxt-prv' => esc_html__( 'Next/Prev', 'zenvy' ),
					'numeric' => esc_html__( 'Numeric', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Blog_Pagination_Fields();
