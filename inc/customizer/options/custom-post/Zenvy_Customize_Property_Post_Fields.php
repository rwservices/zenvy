<?php
/**
 * Zenvy Theme Customizer Property Post Fields
 *
 * @package Zenvy
 */

class Zenvy_Customize_Property_Post_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		// Page Header
		$this->args = [
			// Post Header
			'zenvy_property_single_post_header_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-title','breadcrumb'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable Social Share elements and sort list by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_property_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title'        => esc_html__( 'Post Title', 'zenvy' ),
					'post-meta'         => esc_html__( 'Post Meta', 'zenvy' ),
					'breadcrumb'        => esc_html__( 'Breadcrumb', 'zenvy' )
				],
			],
			// Meta Elements
			'zenvy_property_single_post_meta_elements' => [
				'type'              => 'sortable',
				'default'           => ['author','post-date'],
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable Post Meta Elements and sort their order by drag and drop.', 'zenvy' ),
				'section'           => 'zenvy_property_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'author'            => esc_html__( 'Author', 'zenvy' ),
					'comments'          => esc_html__( 'Comments', 'zenvy' ),
					'post-date'         => esc_html__( 'Post Date', 'zenvy' ),
					'location'        	=> esc_html__( 'Property Location', 'zenvy' ),
					'status'            => esc_html__( 'Property Status', 'zenvy' ),
					'types'             => esc_html__( 'Property Type', 'zenvy' )

				],
			]
		];
		// Post Content
		$this->args = array_merge($this->args,
			[
				'zenvy_property_post_elements' => [
					'type'              => 'sortable',
					'default'           => ['address','main','other','gallery','features','floor','video','author'],
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
					'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
					'description'       => esc_html__( 'To reorder elements drag and drop them.', 'zenvy' ),
					'section'           => 'zenvy_property_single_post_content_section',
					'priority'          => 5,
					'choices'           => [
						'address'           => esc_html__( 'Address', 'zenvy' ),
						'main'              => esc_html__( 'Main Detail', 'zenvy' ),
						'other'             => esc_html__( 'Other Detail', 'zenvy' ),
						'gallery'           => esc_html__( 'Gallery', 'zenvy' ),
						'features'          => esc_html__( 'Features', 'zenvy' ),
						'floor'             => esc_html__( 'Floor Plan', 'zenvy' ),
						'video'             => esc_html__( 'Video', 'zenvy' ),
						'author'            => esc_html__( 'Author Box', 'zenvy' )
					],
				],
			]
		);
		// Related Posts
		$this->args = array_merge($this->args,
			[
				// Enable/Disable
				'zenvy_property_related_posts_enable' => [
					'type'              => 'toggle',
					'default'           => ['desktop'=>'true'],
					'section'           => 'zenvy_property_single_related_posts_section',
					'priority'          => 20,
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
					'label'             => esc_html__( 'Related Posts', 'zenvy' ),
				],

				// Number of posts
				'zenvy_property_related_posts_limit' => [
					'type'              => 'range',
					'default'           => ['desktop' => 3],
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
					'label'             => esc_html__( 'No. of Posts', 'zenvy' ),
					'section'           => 'zenvy_property_single_related_posts_section',
					'priority'          => 25,
					'units'             => [],
					'input_attrs'       => [
						'min'               => 0,
						'max'               => 20
					]
				],
				// Thumbnail Size
				'zenvy_property_related_posts_featured_img_size' => [
					'type'              => 'buttonset',
					'default'           => ['desktop' => 'medium'],
					'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
					'label'             => esc_html__( 'Image Size', 'zenvy' ),
					'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'zenvy' ),
					'section'           => 'zenvy_property_single_related_posts_section',
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
new Zenvy_Customize_Property_Post_Fields();
