<?php
/**
 * Zenvy Theme Customizer Sidebar settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Sidebar_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Sticky Sidebar
            'zenvy_sidebar_sticky' => [
                'type'              => 'toggle',
                'default'           => '',
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Sticky Sidebar', 'zenvy' ),
                'description'       => esc_html__( 'Toggle to enable sticky sidebar. See the effect on content scrolling.', 'zenvy' ),
                'section'           => 'zenvy_sidebar_section',
                'priority'          => 15,
            ]
        ];
    }

}
new Zenvy_Customize_Global_Sidebar_Fields();
