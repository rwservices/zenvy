<?php
/**
 * Zenvy Theme Customizer blog page header settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Blog_Page_Header_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Page Header
			'zenvy_blog_page_header_elements' => [
				'type'              => 'sortable',
				'default'           => [ 'post-title', 'breadcrumb' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable lists of page header elements and rearrange the order by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_blog_page_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title' => esc_html__( 'Title', 'zenvy' ),
					'post-desc'  => esc_html__( 'Description', 'zenvy' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Blog_Page_Header_Fields();
