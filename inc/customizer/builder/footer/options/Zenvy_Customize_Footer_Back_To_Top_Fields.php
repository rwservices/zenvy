<?php
/**
 * Zenvy Theme Customizer Footer Back to Top Button settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Back_To_Top_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Enable
            'zenvy_footer_back_to_top_enable' => [
                'type'              => 'toggle',
                'default'           => ['desktop'=>'true'],
                'priority'          => 5,
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Scroll to Top', 'zenvy' ),
                'description'       => esc_html__( 'Enable button to scroll to top.', 'zenvy' ),
                'section'           => 'zenvy_footer_builder_back_to_top_section',
            ]
        ];
    }

}
new Zenvy_Customize_Footer_Back_To_Top_Fields();
