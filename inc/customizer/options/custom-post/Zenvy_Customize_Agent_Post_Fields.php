<?php
/**
 * Zenvy Theme Customizer Agent Custom Post Type Fields
 *
 * @package Zenvy
 */

class Zenvy_Customize_Agent_Post_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		// Page Header
		$this->args = [
			// Page Header
			'zenvy_agent_single_post_header_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-title','breadcrumb'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable Page Header Elements and manage lists using drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_agent_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title'        => esc_html__( 'Page Title', 'zenvy' ),
					'breadcrumb'        => esc_html__( 'Breadcrumb', 'zenvy' )
				],
			]
		];
		// Post Content
		$this->args = array_merge($this->args,
			[
				// Elements
				'zenvy_agent_post_elements' => [
					'type'              => 'sortable',
					'default'           => ['contact-info','content','social','properties'],
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
					'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
					'description'       => esc_html__( 'To reorder elements drag and drop them.', 'zenvy' ),
					'section'           => 'zenvy_agent_single_post_content_section',
					'priority'          => 10,
					'choices'           => [
						'contact-info'      => esc_html__( 'Contact Info', 'zenvy' ),
						'content'           => esc_html__( 'Content', 'zenvy' ),
						'social'            => esc_html__( 'Social Profile', 'zenvy' ),
						'properties'        => esc_html__( 'Related Properties', 'zenvy' )
					],
				],
			]
		);
		// Related Properties
		$this->args = array_merge($this->args,
			[
				// Number of posts
				'zenvy_agent_property_posts_limit' => [
					'type'              => 'range',
					'default'           => ['desktop' => 6],
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
					'label'             => esc_html__( 'Posts Per Page', 'zenvy' ),
					'section'           => 'zenvy_agent_single_related_posts_section',
					'priority'          => 25,
					'units'             => [],
					'input_attrs'       => [
						'min'               => 0,
						'max'               => 20
					]
				],
				// Thumbnail Size
				'zenvy_agent_property_posts_featured_img_size' => [
					'type'              => 'buttonset',
					'default'           => ['desktop' => 'medium'],
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
					'label'             => esc_html__( 'Image Size', 'zenvy' ),
					'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'zenvy' ),
					'section'           => 'zenvy_agent_single_related_posts_section',
					'priority'          => 35,
					'choices'           => [
						'thumbnail'         => esc_html__( 'Small', 'zenvy' ),
						'medium'            => esc_html__( 'Medium', 'zenvy' ),
						'medium_large'      => esc_html__( 'Medium Large', 'zenvy' ),
						'large'             => esc_html__( 'Large', 'zenvy' )
					],
				],
			]
		);
	}

}
new Zenvy_Customize_Agent_Post_Fields();
