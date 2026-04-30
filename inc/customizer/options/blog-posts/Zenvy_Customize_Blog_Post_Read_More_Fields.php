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
			'zenvy_blog_post_read_btn_type'       => [
				'type'              => 'buttonset',
				'default'           => [ 'desktop' => 'button' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Display as', 'zenvy' ),
				'section'           => 'zenvy_blog_post_read_more_section',
				'priority'          => 20,
				'choices'           => [
					'text'   => esc_html__( 'Text', 'zenvy' ),
					'button' => esc_html__( 'Button', 'zenvy' ),
				],
			],
			// Button Arrow
			'zenvy_blog_post_read_more_btn_arrow' => [
				'type'              => 'toggle',
				'default'           => [ 'desktop' => 'true' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Button Arrow', 'zenvy' ),
				'description'       => esc_html__( 'Enable Arrow Icon after Button/Text.', 'zenvy' ),
				'section'           => 'zenvy_blog_post_read_more_section',
				'priority'          => 25,
			],
		];
	}
}
new Zenvy_Customize_Blog_Post_Read_More_Fields();
