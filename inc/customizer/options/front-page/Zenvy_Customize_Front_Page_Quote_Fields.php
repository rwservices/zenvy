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

            // Background Image
			'zenvy_front_page_quote_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_quote_section',
				'priority'          => 30,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_quote_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background' => 'color',
					'colors'     => [
						'color_1' => 'var(--color-bg-light)',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_quote_section',
				'priority'          => 35,
				'inherits'          => [
					'color_1' => 'var(--color-bg-light)',
				],
				'fields'            => [ 'colors' => true ],
			],
        ];
    }
}

new Zenvy_Customize_Front_Page_Quote_Fields();