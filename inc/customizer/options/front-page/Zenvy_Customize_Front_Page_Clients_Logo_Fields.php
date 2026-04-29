<?php
/**
 * Zenvy Theme Customizer Front Page Clients Logo Section settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Clients_Logo_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_front_page_clients_logo_group_settings' => [
                'type'              => 'group',
                'section'           => 'zenvy_front_page_clients_section',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_front_page_clients_logo_section_heading',
                            'zenvy_front_page_clients_logo_lists',
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_front_page_clients_logo_section_note_one',
                            'zenvy_front_page_clients_logo_section_background',
                            'zenvy_front_page_clients_logo_section_background_overlay'

                        )
                    )
                ]
            ],
            // Heading
            'zenvy_front_page_clients_logo_section_heading' => [
                'type'              => 'text',
                'default'           => esc_html__( 'our partners', 'zenvy' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Section Heading', 'zenvy' ),
                'section'           => 'zenvy_front_page_clients_section',
                'priority'          => 14,
            ],
            // Note One
            'zenvy_front_page_clients_logo_section_note_one' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'SECTION STYLING', 'zenvy' ),
                'section'           => 'zenvy_front_page_clients_section',
                'priority'          => 19,
            ],
            // Background Image
            'zenvy_front_page_clients_logo_section_background' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Image', 'zenvy' ),
                'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
                'section'           => 'zenvy_front_page_clients_section',
                'priority'          => 25,
                'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
            ],
            // Background Overlay
            'zenvy_front_page_clients_logo_section_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg-4)'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
                'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
                'section'           => 'zenvy_front_page_clients_section',
                'priority'          => 26,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-4)'
                ],
                'fields'            => ['colors' => true],
            ]
        ];
    }

}
new Zenvy_Customize_Front_Page_Clients_Logo_Fields();
