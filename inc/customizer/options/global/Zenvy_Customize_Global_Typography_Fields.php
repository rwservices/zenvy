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
			'zenvy_base_typography'    => [
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

			// Heading Typography
			'zenvy_heading_typography' => [
				'type'              => 'typography',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
				'label'             => esc_html__( 'H1 - H6', 'zenvy' ),
				'description'       => esc_html__( 'Set heading H1 - H6 typography for page content.', 'zenvy' ),
				'section'           => 'zenvy_typography_section',
				'priority'          => 10,
				'units'             => [ 'px', 'rem', 'pt', 'em', 'vw' ],
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'fields'            => [
					'font_family'  => true,
					'font_variant' => true,
				],
			],
		];
	}
}
new Zenvy_Customize_Global_Typography_Fields();
