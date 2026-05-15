<?php
/**
 * Blogin Aarambha Theme Customizer Header HTML settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Html_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_header_html_group_settings' => [
                'type'              => 'group',
                'section'           => 'html',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_html_text'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_header_html_text_link_color',
                            'zenvy_header_html_text_typo',
                            'zenvy_header_html_padding',
                            'zenvy_header_html_margin'
                        )
                    )
                ]
            ],
            // Textarea
            'zenvy_header_html_text' => [
                'type'              => 'editor',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'HTML', 'zenvy' ),
                'description'       => esc_html__( 'Enter Text/Simple HTML Code', 'zenvy' ),
                'section'           => 'html',
                'priority'          => 15,
            ],
            // Text Typo
            'zenvy_header_html_text_typo' => [
                'type'              => 'typography',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
                'label'             => esc_html__( 'Text Color', 'zenvy' ),
                'section'           => 'html',
                'priority'          => 20,
                'inherits'          => [
                    'color_1'           => 'var(--color-text)'
                ],
                'fields'            => ['colors'=>true]
            ],
            // link color
            'zenvy_header_html_text_link_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Link Color', 'zenvy' ),
                'section'           => 'html',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'priority'          => 25,
                'inherits'          => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)',
                ]
            ],
            // Padding
            'zenvy_header_html_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '10px',
                        'side_3'            => '10px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set HTML container padding.', 'zenvy' ),
                'section'           => 'html',
                'priority'          => 55,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'zenvy_header_html_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'zenvy' ),
                'description'       => esc_html__( 'Set HTML container margin.', 'zenvy' ),
                'section'           => 'html',
                'priority'          => 60,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Zenvy_Customize_Header_Html_Fields();
