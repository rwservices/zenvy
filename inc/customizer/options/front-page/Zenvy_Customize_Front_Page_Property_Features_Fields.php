<?php
/**
 * Zenvy Theme Customizer Front Page Property Featured Sections settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Property_Features_Fields extends Zenvy_Customize_Base_Field {

    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_front_page_featured_properties_group_settings' => [
                'type'              => 'group',
                'section'           => 'zenvy_front_page_property_features_section',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_front_page_featured_properties_section_heading',
                            'zenvy_front_page_featured_properties_limit'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'zenvy' ),
                        'controls'      => array(
                            'zenvy_front_page_featured_properties_sep_one',
                            'zenvy_front_page_featured_properties_background',
                            'zenvy_front_page_featured_properties_background_overlay'
                        )
                    )
                ]
            ],
            // Heading
            'zenvy_front_page_featured_properties_section_heading' => [
                'type'              => 'text',
                'default'           => esc_html__( 'Feature Listings', 'zenvy' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Section Heading', 'zenvy' ),
                'section'           => 'zenvy_front_page_property_features_section',
                'priority'          => 15,
            ],
            // Number of Slides
            'zenvy_front_page_featured_properties_limit' => [
                'type'              => 'range',
                'default'           => ['desktop' => 3 ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Posts Limit', 'zenvy' ),
                'section'           => 'zenvy_front_page_property_features_section',
                'priority'          => 25,
                'units'             => [],
                'input_attrs'       => [
                    'min'               => 1,
                    'step'              => 1,
                    'max'               => 20
                ]
            ],
            // Section Separator
            'zenvy_front_page_featured_properties_sep_one' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'SECTION STYLING', 'zenvy' ),
                'section'           => 'zenvy_front_page_property_features_section',
                'priority'          => 30,
            ],
            // Background Image
            'zenvy_front_page_featured_properties_background' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Image', 'zenvy' ),
                'description'       => esc_html__( 'Set background image for container.', 'zenvy' ),
                'section'           => 'zenvy_front_page_property_features_section',
                'priority'          => 35,
                'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
            ],
            // Background Overlay
            'zenvy_front_page_featured_properties_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg)'
                    ]
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
                'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
                'section'           => 'zenvy_front_page_property_features_section',
                'priority'          => 36,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)'
                ],
                'fields'            => ['colors' => true],
            ]
        ];
    }

}
new Zenvy_Customize_Front_Page_Property_Features_Fields();
