<?php
/**
 * Zenvy Theme Customizer Footer HTML settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Html_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_footer_html_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_html',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'custom_logo',
                            'zenvy_footer_html_text'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_html_padding',
                            'zenvy_footer_html_margin'
                        )
                    )
                ]
            ],
            // Textarea
            'zenvy_footer_html_text' => [
                'type'              => 'textarea',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'HTML', 'zenvy' ),
                'description'       => esc_html__( 'Enter Text/Simple HTML Code', 'zenvy' ),
                'section'           => 'footer_html',
                'priority'          => 15,
            ],
            // Padding
            'zenvy_footer_html_padding' => [
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
                'section'           => 'footer_html',
                'priority'          => 55,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'zenvy_footer_html_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'zenvy' ),
                'description'       => esc_html__( 'Set HTML container margin.', 'zenvy' ),
                'section'           => 'footer_html',
                'priority'          => 60,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Zenvy_Customize_Footer_Html_Fields();
