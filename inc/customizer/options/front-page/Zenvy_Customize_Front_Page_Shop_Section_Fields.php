<?php 
/**
 * Zenvy Theme Customizer Front Page Shop Section settings
 *
 * @package Zenvy 
 */

class Zenvy_Customize_Front_Page_Shop_Section_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_front_page_shop_section_group_settings' => [
				'type'     => 'group',
				'section'  => 'zenvy_front_page_shop_section',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_shop_title',
							'zenvy_front_page_shop_desc',
							'zenvy_front_page_shop_image',
							'zenvy_front_page_shop_button_text',
							'zenvy_front_page_shop_button_link',
						],
					],
					'style' => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_front_page_shop_section_background',
							'zenvy_front_page_shop_section_background_overlay'
						],
					],
				],
			],

			// Section Title
			'zenvy_front_page_shop_title' => [
				'type'              => 'text',
				'section'           => 'zenvy_front_page_shop_section',
				'default'           => esc_html__( 'Shop my favouritess from my Awesome collection', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'priority'          => 15,
				'label'             => esc_html__( 'Section Title', 'zenvy' ),
			],

			// Section Description
			'zenvy_front_page_shop_desc' => [
				'type'              => 'textarea',
				'section'           => 'zenvy_front_page_shop_section',
				'default'           => esc_html__( 'Don\'t laugh, guys, but I\'ve turned into the person who maps out a detailed plan for how her makeup collection will look in the next year!', 'zenvy' ),
				'sanitize_callback' => 'sanitize_textarea_field',
				'priority'          => 20,
				'label'             => esc_html__( 'Section Description', 'zenvy' ),
			],

			// Section Image
			'zenvy_front_page_shop_image' => [
				'type'              => 'image',
				'section'           => 'zenvy_front_page_shop_section',
				'default'           => get_template_directory_uri() . '/assets/build/images/shop-title-image.png',
				'sanitize_callback' => 'esc_url_raw',
				'priority'          => 25,
				'label'             => esc_html__( 'Section Image', 'zenvy' ),
				'description'       => esc_html__( 'Upload an image for the shop section.', 'zenvy' ),
			],

			// Note One
            'zenvy_front_page_trending_posts_note_one' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'READ MORE BUTTON', 'zenvy' ),
                'section'           => 'zenvy_front_page_trending_posts_section',
                'priority'          => 19,
            ],

			// Button Text
			'zenvy_front_page_shop_button_text' => [
				'type'              => 'text',
				'section'           => 'zenvy_front_page_shop_section',
				'default'           => esc_html__( 'Shop more', 'zenvy' ),
				'sanitize_callback' => 'sanitize_text_field',
				'priority'          => 30,
				'label'             => esc_html__( 'Button Text', 'zenvy' ),
			],

			// Button Link
			'zenvy_front_page_shop_button_link' => [
				'type'              => 'text',
				'section'           => 'zenvy_front_page_shop_section',
				'default'           => '#',
				'sanitize_callback' => 'esc_url_raw',
				'priority'          => 35,
				'label'             => esc_html__( 'Button Link', 'zenvy' ),
			],

			//// Type
			'zenvy_trending_posts_read_btn_type'       => [
				'type'              => 'buttonset',
				'default'           => [ 'desktop' => 'button' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Display as', 'zenvy' ),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 20,
				'choices'           => [
					'text'   => esc_html__( 'Text', 'zenvy' ),
					'button' => esc_html__( 'Button', 'zenvy' ),
				],
			],
			// Button Arrow
			'zenvy_trending_posts_read_more_btn_arrow' => [
				'type'              => 'toggle',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Read More Arrow', 'zenvy' ),
				'description'       => esc_html__( 'Enable Arrow Icon after Text.', 'zenvy' ),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 25,
			],

			// Background Image
			'zenvy_front_page_shop_section_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_shop_section',
				'priority'          => 40,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],

			// Background Overlay
			'zenvy_front_page_shop_section_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background' => 'color',
					'colors'     => [
						'color_1' => 'var(--color-bg)',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_shop_section',
				'priority'          => 45,
				'inherits'          => [
					'color_1' => 'var(--color-bg)',
				],
				'fields'            => [ 'colors' => true ],
			],
		];
	}
}
new Zenvy_Customize_Front_Page_Shop_Section_Fields();