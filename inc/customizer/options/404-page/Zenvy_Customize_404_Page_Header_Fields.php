<?php
/**
 * Zenvy Theme Customizer 404 Page Header settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_404_Page_Header_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Page Header
            'zenvy_404_page_header_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-title','breadcrumb'],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Sort Elements', 'zenvy' ),
				'description'       => esc_html__( 'Enable page header elements and order their list with drag and drop.', 'zenvy' ),
                'section'           => 'zenvy_404_page_header_section',
                'priority'          => 15,
                'choices'           => [
                    'post-title'        => esc_html__( 'Page Title', 'zenvy' ),
                    'breadcrumb'        => esc_html__( 'Breadcrumb', 'zenvy' )
                ],
            ]
        ];
    }

}
new Zenvy_Customize_404_Page_Header_Fields();
