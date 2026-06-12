<?php
/**
 * Zenvy Theme Customizer Blog Post Read More settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Blog_Post_Read_More_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Type
			'zenvy_blog_post_read_btn_type' => [
				'type'              => 'buttonset',
				'default'           => [ 'desktop' => 'default' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Display as', 'zenvy' ),
				'section'           => 'zenvy_blog_post_read_more_section',
				'priority'          => 20,
				'choices'           => [
					'default' => esc_html__( 'Default', 'zenvy' ),
					'text'    => esc_html__( 'Text', 'zenvy' ),
					'button'  => esc_html__( 'Button', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Blog_Post_Read_More_Fields();
