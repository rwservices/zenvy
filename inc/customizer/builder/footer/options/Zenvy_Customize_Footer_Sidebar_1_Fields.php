<?php
/**
 * Zenvy Theme Customizer Footer Sidebar 1 settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Footer_Sidebar_1_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Heading One
			'zenvy_footer_sidebar_1_widgets_note' => [
				'type'        => 'heading',
				'label'       => esc_html__( 'NOTE', 'zenvy' ),
				'description' => sprintf( __( 'Drag and Drop Widgets to <a data-type="section" data-id="sidebar-widgets-footer-sidebar-1" class="customizer-focus"><strong> Footer Sidebar 1 </strong></a>widget area.', 'zenvy' ) ),
				'section'     => 'footer_sidebar_1',
				'priority'    => 5,
			],
		];
	}
}

new Zenvy_Customize_Footer_Sidebar_1_Fields();
