<?php
/**
 * Zenvy Theme Customizer 404 Page Content settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_404_Page_Content_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Grouping Settings
			'zenvy_404_error_grouping_settings' => [
				'type'              => 'group',
				'section'           => 'zenvy_404_page_content_section',
				'priority'          => 10,
				'choices'           => [
					'normal'            => array(
						'tab-title'     => esc_html__( 'General', 'zenvy' ),
						'controls'      => array(
							'zenvy_404_error_page_content_elements',
							'zenvy_404_error_image'
						)
					),
					'hover'         => array(
						'tab-title'     => esc_html__( 'Style', 'zenvy' ),
						'controls'      => array(
							'zenvy_404_error_background',
						)
					)
				]
			],
            // Error Page Content
            'zenvy_404_error_page_content_elements' => [
                'type'              => 'sortable',
                'default'           => ['title','subtitle','button'],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
                'description'       => esc_html__( 'Enable page content elements and order their list with drag and drop.', 'zenvy' ),
                'section'           => 'zenvy_404_page_content_section',
                'priority'          => 15,
                'choices'           => [
                    'image'             => esc_html__( 'Image', 'zenvy' ),
                    'title'             => esc_html__( 'Title', 'zenvy' ),
                    'subtitle'          => esc_html__( 'Sub Title', 'zenvy' ),
                    'button'            => esc_html__( 'Button', 'zenvy' ),
                    'search'            => esc_html__( 'Search', 'zenvy' )
                ],
            ],
            // Image
            'zenvy_404_error_image' => [
                'type'              => 'image',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'Image', 'zenvy' ),
                'section'           => 'zenvy_404_page_content_section',
                'priority'          => 20,
            ],
			// Background Image
			'zenvy_404_error_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set background image for 404 page content.', 'zenvy' ),
				'section'           => 'zenvy_404_page_content_section',
				'priority'          => 75,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
        ];
    }

}
new Zenvy_Customize_404_Page_Content_Fields();
