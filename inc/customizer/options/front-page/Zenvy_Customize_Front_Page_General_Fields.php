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
			'why-us'  => esc_html__( 'Why Us?', 'zenvy' ),
			'blog'    => esc_html__( 'News & Blog', 'zenvy' ),
			'clients' => esc_html__( 'Clients Logo', 'zenvy' ),
		];
		$sortable_default = [ 'why-us', 'blog', 'clients' ];
		if ( Zenvy_Helper::crucial_real_state_plugin() ) {
			$sortable_list    = array_merge(
				$sortable_list,
				[
					'property-types' => esc_html__( 'Property Types', 'zenvy' ),
					'location'       => esc_html__( 'Property Locations', 'zenvy' ),
					'featured'       => esc_html__( 'Property Featured', 'zenvy' ),
				]
			);
			$sortable_default = [ 'featured', 'why-us', 'location', 'property-types', 'blog', 'clients' ];
		}
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
