<?php
/**
 * Blogin Aarambha Theme Customizer Footer Social Icons settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Social_Icons_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_footer_social_icon_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_social',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_social_icon_note_one',
                            'zenvy_footer_social_icon_gap',
                            'zenvy_footer_social_icon_link_open'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_footer_social_icon_padding',
                            'zenvy_footer_social_icon_margin',
                            'zenvy_footer_social_icon_note_two',
                            'zenvy_footer_social_icon_item_icon_color',
                            'zenvy_footer_social_icon_item_background',
                            'zenvy_footer_social_icon_item_padding'
                        )
                    )
                ]
            ],
            // Heading One
            'zenvy_footer_social_icon_note_one' => [
                'type'              => 'heading',
				'description'       => sprintf(__( 'Configure social icons in Global &raquo; Social &raquo; <a data-type="control" data-id="zenvy_social_icons" class="customizer-focus"><strong> Social Icons </strong></a>.', 'zenvy' )),
                'section'           => 'footer_social',
                'priority'          => 15,
            ],
            // Item Gap
            'zenvy_footer_social_icon_gap' => [
                'type'              => 'range',
                'default'           => ['desktop' => '2px'],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Item Gap', 'zenvy' ),
                'description'       => esc_html__( 'Set gap between each social icon lists.', 'zenvy' ),
                'section'           => 'footer_social',
                'priority'          => 35,
                'input_attrs'       => [
                    'min'               => 0,
                    'max'               => 50
                ],
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Link Open
            'zenvy_footer_social_icon_link_open' => [
                'type'              => 'toggle',
                'default'           => '',
                'section'           => 'footer_social',
                'priority'          => 40,
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Link Open', 'zenvy' ),
                'description'       => esc_html__( 'Enable to open the link in the new tab.', 'zenvy' ),
            ],
            // Padding
            'zenvy_footer_social_icon_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set social container padding.', 'zenvy' ),
                'section'           => 'footer_social',
                'priority'          => 42,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'zenvy_footer_social_icon_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'zenvy' ),
                'description'       => esc_html__( 'Set social container margin.', 'zenvy' ),
                'section'           => 'footer_social',
                'priority'          => 45,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Heading One
            'zenvy_footer_social_icon_note_two' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'ITEM', 'zenvy' ),
                'section'           => 'footer_social',
                'priority'          => 50,
            ],
            // Icon Color
            'zenvy_footer_social_icon_item_icon_color' => [
                'type'              => 'color',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Icon/Text', 'zenvy' ),
                'description'       => esc_html__( 'Set each items icon and text as same color.', 'zenvy' ),
                'section'           => 'footer_social',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'inherits'          => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)'
                ],
                'priority'          => 55,
            ],
            // Background Color
            'zenvy_footer_social_icon_item_background' => [
                'type'              => 'color',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background', 'zenvy' ),
                'description'       => esc_html__( 'Set each item background color.', 'zenvy' ),
                'section'           => 'footer_social',
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'zenvy' ),
                    'color_2'           => esc_html__( 'Hover', 'zenvy' ),
                ],
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-dark)',
                    'color_2'           => 'var(--color-bg-dark)'
                ],
                'priority'          => 60,
            ],
            // Padding
            'zenvy_footer_social_icon_item_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '10px',
                        'side_2'            => '15px',
                        'side_3'            => '10px',
                        'side_4'            => '15px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set padding to each item.', 'zenvy' ),
                'section'           => 'footer_social',
                'priority'          => 80,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
        ];
    }

}
new Zenvy_Customize_Footer_Social_Icons_Fields();
