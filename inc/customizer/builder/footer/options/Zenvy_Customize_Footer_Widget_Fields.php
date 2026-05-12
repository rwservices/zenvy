<?php
/**
 * Blogin Aarambha Theme Customizer Footer Widget settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Widget_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Widgets Title
			'zenvy_footer_builder_widget_title_typo' => [
				'type'              => 'typography',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
				'label'             => esc_html__( 'Widget Title', 'zenvy' ),
				'section'           => 'zenvy_footer_builder_widget_section',
				'priority'          => 20,
				'inherits'          => [
					'color_1'           => 'var(--color-white)',
				],
				'fields'			=> ['colors' => true]
			],
			// Widgets Content
			'zenvy_footer_builder_widget_content_typo' => [
				'type'              => 'typography',
				'default'           => '',
				'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
				'label'             => esc_html__( 'Widget Content', 'zenvy' ),
				'section'           => 'zenvy_footer_builder_widget_section',
				'priority'          => 25,
				'colors'            => [
					'color_1'           => esc_html__( 'Normal', 'zenvy' ),
					'color_2'           => esc_html__( 'Hover', 'zenvy' ),
				],
				'inherits'          => [
					'color_1'           => 'var(--color-white)',
					'color_2'           => 'var(--color-gray-500)',
				],
				'fields'			=> ['colors' => true]
			],
            // Padding
            'zenvy_footer_builder_widget_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'zenvy' ),
                'description'       => esc_html__( 'Set each footer widgets wrapper padding.', 'zenvy' ),
                'section'           => 'zenvy_footer_builder_widget_section',
                'priority'          => 30,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
        ];
    }

}
new Zenvy_Customize_Footer_Widget_Fields();
