<?php
/**
 * Zenvy Theme Customizer Footer Copyright settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Copyright_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_footer_copyright_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_copyright',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_copyright_text',
                            'zenvy_footer_copyright_link_target'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_copyright_padding',
                            'zenvy_footer_copyright_margin'
                        )
                    )
                ]
            ],
            // Textarea
            'zenvy_footer_copyright_text' => [
                'type'              => 'textarea',
                'default'           => __( 'Copyright {copyright} {current_year} {site_title}', 'zenvy' ),
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Copyright Text', 'zenvy' ),
                'description'       => esc_html__( 'You can insert some arbitrary HTML code tags: {current_year} and {site_title}', 'zenvy' ),
                'section'           => 'footer_copyright',
                'priority'          => 15,
            ],
            // Link Open
            'zenvy_footer_copyright_link_target' => [
                'type'              => 'toggle',
                'default'           => ['desktop'=>'true'],
                'section'           => 'footer_copyright',
                'priority'          => 20,
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Link Open', 'zenvy' ),
                'description'       => esc_html__( 'Toggle to enable link open in new window tab.', 'zenvy' ),
            ],
            // Padding
            'zenvy_footer_copyright_padding' => [
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
                'section'           => 'footer_copyright',
                'priority'          => 55,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'zenvy_footer_copyright_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'zenvy' ),
                'section'           => 'footer_copyright',
                'priority'          => 60,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Zenvy_Customize_Footer_Copyright_Fields();
