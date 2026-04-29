<?php
/**
 * Zenvy Theme Customizer Body settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Body_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        // Background
        $this->args = [
            'zenvy_body_background' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background', 'zenvy' ),
                'description'       => esc_html__( 'Color or Image as the background of your site.', 'zenvy' ),
                'section'           => 'zenvy_body_section',
                'priority'          => 10,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)',
                ],
				'fields'            => ['background' => true, 'colors' => true,'image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true],
            ]
        ];
    }

}
new Zenvy_Customize_Global_Body_Fields();
