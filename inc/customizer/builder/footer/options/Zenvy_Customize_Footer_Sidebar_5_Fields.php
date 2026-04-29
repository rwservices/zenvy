<?php
/**
 * Zenvy Theme Customizer Footer Sidebar 5 settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Sidebar_5_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Heading One
            'zenvy_footer_sidebar_5_widgets_note' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'NOTE', 'zenvy' ),
				'description'       => sprintf(__( 'Drag and Drop Widgets to <a data-type="section" data-id="sidebar-widgets-footer-sidebar-5" class="customizer-focus"><strong> Footer Sidebar 5 </strong></a>widget area.', 'zenvy' )),
                'section'           => 'footer_sidebar_5',
                'priority'          => 5,
            ]
        ];
    }

}

new Zenvy_Customize_Footer_Sidebar_5_Fields();
