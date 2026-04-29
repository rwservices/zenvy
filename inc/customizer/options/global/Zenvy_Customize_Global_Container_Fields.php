<?php
/**
 * Zenvy Theme Customizer Container Settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Container_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {

		$this->args = [
			// Max Width
			'zenvy_container_max_width' => [
				'type'              => 'range',
				'default'           => [ 'desktop' => '1170px' ],
				'section'           => 'zenvy_container_section',
				'priority'          => 15,
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Max Width', 'zenvy' ),
				'description'       => esc_html__( 'Set Max width for container. Default value is 1170px.', 'zenvy' ),
				'input_attrs'       => [
					'min' => 0,
					'max' => 2000,
				],
			],
		];
	}
}
new Zenvy_Customize_Global_Container_Fields();
