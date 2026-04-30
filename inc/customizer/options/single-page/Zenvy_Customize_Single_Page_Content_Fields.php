<?php
/**
 * Zenvy Theme Customizer Single Page Element settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Single_Page_Content_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Entry Header
			'zenvy_single_page_content_entry_header_elements' => [
				'type'              => 'sortable',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Header Elements', 'zenvy' ),
				'section'           => 'zenvy_single_page_content_section',
				'priority'          => 5,
				'choices'           => [
					'post-title' => esc_html__( 'Post Title', 'zenvy' ),
				],
			],
			// Page Content
			'zenvy_single_page_content_entry_footer_elements' => [
				'type'              => 'sortable',
				'default'           => [ 'post-comments' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Footer Elements', 'zenvy' ),
				'section'           => 'zenvy_single_page_content_section',
				'priority'          => 10,
				'choices'           => [
					'post-comments' => esc_html__( 'Comments', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Single_Page_Content_Fields();
