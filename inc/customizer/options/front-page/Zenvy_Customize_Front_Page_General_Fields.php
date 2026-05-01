<?php
/**
 * Zenvy Theme Customizer Front Page General settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_General_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {

		$sortable_list    = [
			'featured-section'  => esc_html__( 'Featured Section', 'zenvy' ),
			'explore-categories'    => esc_html__( 'Explore Categories', 'zenvy' ),
			'latest-posts' => esc_html__( 'Latest Posts', 'zenvy' ),
			'quote-section' => esc_html__( 'Quote Section', 'zenvy' ),
			'trending-posts' => esc_html__( 'Trending Posts', 'zenvy' ),
			'youtube-promotion' => esc_html__( 'YouTube Promotion', 'zenvy' ),
			'shop-section' => esc_html__( 'Shop Section', 'zenvy' ),
		];

		$sortable_default = [ 'featured-section', 'explore-categories', 'latest-posts' ];
		
		$this->args = [
			// Active Front Page
			'zenvy_front_page_enable'   => [
				'type'              => 'radio',
				'default'           => 'disable',
				'section'           => 'zenvy_front_page_general_section',
				'priority'          => 10,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Front Page', 'zenvy' ),
				'description'       => sprintf( __( 'To set <strong>Front Page</strong> enable the option. Else WordPress Static Page will be your <a data-type="section" data-id="static_front_page" class="customizer-focus"><strong> Front Page</strong></a>.', 'zenvy' ) ),
				'choices'           => [
					'enable'  => esc_html__( 'Enable', 'zenvy' ),
					'disable' => esc_html__( 'Disable [ use WordPress Static Page ]', 'zenvy' ),
				],
			],
			// Elements
			'zenvy_front_page_elements' => [
				'type'              => 'sortable',
				'default'           => $sortable_default,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable Page Header Elements and sort them by Drag and Drop.', 'zenvy' ),
				'section'           => 'zenvy_front_page_general_section',
				'priority'          => 20,
				'choices'           => $sortable_list,
			],
		];
	}
}
new Zenvy_Customize_Front_Page_General_Fields();
