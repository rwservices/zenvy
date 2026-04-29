<?php
/**
 * Zenvy Theme Customizer Placeholder settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Placeholder_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Color
            'zenvy_placeholder_color' => [
                'type'              => 'color',
                'default'           => [
                    'color_1'           => '#dbdcdf'
                ],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Placeholder Color', 'zenvy' ),
                'description'       => esc_html__( 'Set color in placeholder if there isn’t a featured image.', 'zenvy' ),
                'section'           => 'zenvy_placeholder_section',
                'priority'          => 10,
            ],
            // Image
            'zenvy_placeholder_image' => [
                'type'              => 'image',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'Placeholder Image', 'zenvy' ),
                'description'       => esc_html__( 'Set placeholder image for no featured image. It will replace the placeholder color.', 'zenvy' ),
                'section'           => 'zenvy_placeholder_section',
                'priority'          => 15,
            ]
        ];
    }

}
new Zenvy_Customize_Global_Placeholder_Fields();
