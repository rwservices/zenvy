<?php
/**
 * Zenvy Theme Customizer Color settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Color_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Accent Color
			'zenvy_accent_color'     => [
				'type'              => 'color',
				'default'           => [
					'color_1' => '#FCCE00',
					'color_2' => '#354255',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Accent', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 10,
				'colors'            => [
					'color_1' => esc_html__( 'Primary', 'zenvy' ),
					'color_2' => esc_html__( 'Secondary', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-accent)',
					'color_2' => 'var(--color-accent-secondary)',
				],
			],
			// H1-H6 Color
			'zenvy_heading_color'    => [
				'type'              => 'color',
				'default'           => [
					'color_1' => '#3d4151',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'H1 -H6', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 15,
				'inherits'          => [
					'color_1' => 'var(--color-heading)',
				],
			],
			// Text Color
			'zenvy_text_color'       => [
				'type'              => 'color',
				'default'           => [
					'color_2' => '#6d707d',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Base Text', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 20,
				'colors'            => [
					'color_2' => esc_html__( 'Color 2', 'zenvy' ),
				],
				'inherits'          => [
					'color_2' => 'var(--color-2)',
				],
			],
			// Link Color
			'zenvy_link_color'       => [
				'type'              => 'color',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Link', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 25,
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
					'color_2' => esc_html__( 'Hover', 'zenvy' ),
					'color_3' => esc_html__( 'Visited', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-1)',
					'color_2' => 'var(--color-accent)',
					'color_3' => 'var(--color-3)',
				],
			],
			// Background Color
			'zenvy_background_color' => [
				'type'              => 'color',
				'default'           => [
					'color_1' => '#ffffff',
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Background', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 30,
				'colors'            => [
					'color_1' => esc_html__( 'BG Color', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Global_Color_Fields();
