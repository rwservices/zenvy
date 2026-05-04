<?php 
/**
 * Zenvy Theme Customizer Front Page Quote settings
 * 
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Quote_Fields extends Zenvy_Customize_Base_Field {
    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            'zenvy_front_page_quote_group_settings' => [
                'type'     => 'group',
                'section'  => 'zenvy_front_page_quote_section',
                'priority' => 10,
                'choices'  => [
                    'normal' => [
                        'tab-title' => esc_html__( 'General', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_quote',
                            'zenvy_front_page_quote_by',
                        ],
                    ],
                    'style'  => [
                        'tab-title' => esc_html__( 'Style', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_quote_background',
                            'zenvy_front_page_quote_background_overlay',
                        ],
                    ],
                ],
            ],
            // Quote Section Title
            'zenvy_front_page_quote' => [
                'type'              => 'text',
                'default'           => esc_html__('People often say that motivation doesn\'t come from within.', 'zenvy'),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__('Testimonial Quote', 'zenvy'),
                'description'       => esc_html__('Add testimonial quote to be displayed in quote section.', 'zenvy'),
                'section'           => 'zenvy_front_page_quote_section',
                'priority'          => 10,
            ],

            'zenvy_front_page_quote_by' => [
                'type'              => 'text',
                'default'           => esc_html__('', 'zenvy'),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__('Quote By', 'zenvy'),
                'section'           => 'zenvy_front_page_quote_section',
                'priority'          => 15,
            ],

            // Quote Section Background
            'zenvy_front_page_quote_background' => [
                'type'              => 'image',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'Quote Section Background', 'zenvy' ),
                'description'       => esc_html__( 'Upload background image for quote section.', 'zenvy' ),
                'section'           => 'zenvy_front_page_quote_section',
                'priority'          => 20,
            ],

            // Quote Section Background Overlay
            'zenvy_front_page_quote_background_overlay' => [
                'type'              => 'color',
                'default'           => 'rgba(0, 0, 0, 0.5)',
                'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Quote Section Background Overlay', 'zenvy' ),
                'description'       => esc_html__( 'Set background overlay color for quote section.', 'zenvy' ),
                'section'           => 'zenvy_front_page_quote_section',
                'priority'          => 30,
            ],
        ];
    }
}

new Zenvy_Customize_Front_Page_Quote_Fields();