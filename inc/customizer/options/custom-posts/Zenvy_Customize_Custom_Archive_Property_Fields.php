<?php
/**
 * Zenvy Theme Customizer Property Archive Custom Post Type Fields
 *
 * @package Zenvy
 */

class Zenvy_Customize_Custom_Archive_Property_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		// Page Header
		$this->args = [
			// Page Header
			'zenvy_property_archive_page_header_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-title','breadcrumb'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable Page Header Elements and manage lists using drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_property_archive_page_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title'        => esc_html__( 'Title', 'zenvy' ),
					'post-desc'         => esc_html__( 'Description', 'zenvy' ),
					'breadcrumb'        => esc_html__( 'Breadcrumb', 'zenvy' )
				],
			]
		];
		// Post Content
		$this->args = array_merge( $this->args,
			[
				// Image Size
				'zenvy_property_archive_posts_image_size' => [
					'type'              => 'buttonset',
					'default'           => ['desktop' => 'medium'],
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
					'label'             => esc_html__( 'Image Size', 'zenvy' ),
					'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'zenvy' ),
					'section'           => 'zenvy_property_archive_post_content_section',
					'priority'          => 20,
					'choices' 			=> [
						'thumbnail'         => esc_html__( 'Small', 'zenvy' ),
						'medium'            => esc_html__( 'Medium', 'zenvy' ),
						'medium_large'      => esc_html__( 'Medium Large', 'zenvy' ),
						'large'             => esc_html__( 'Large', 'zenvy' ),
					]
				],
			]
		);
	}

}
new Zenvy_Customize_Custom_Archive_Property_Fields();
