<?php
/**
 * Zenvy Theme Customizer Typography settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Typography_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Base Typography
			'zenvy_base_typography' => [
				'type'              => 'typography',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
				'label'             => esc_html__( 'Base', 'zenvy' ),
				'description'       => esc_html__( 'Set Typography for the base of your website.', 'zenvy' ),
				'section'           => 'zenvy_typography_section',
				'priority'          => 10,
				'fields'            => [
					'font_family'  => true,
					'font_variant' => true,
				],
			],
		];
	}
}
new Zenvy_Customize_Global_Typography_Fields();
