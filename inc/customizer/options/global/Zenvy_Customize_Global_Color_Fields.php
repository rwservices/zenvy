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
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Accent', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 10,
				'colors'            => [
					'color_1' => esc_html__( 'Primary', 'zenvy' ),
					'color_2' => esc_html__( 'Secondary', 'zenvy' ),
					'color_3' => esc_html__( 'Tertiary', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-primary)',
					'color_2' => 'var(--color-secondary)',
					'color_3' => 'var(--color-tertiary)',
				],
			],
			// H1-H6 Color
			'zenvy_heading_color'    => [
				'type'              => 'color',
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
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Base Text', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 20,
				'colors'            => [
					'color_1' => esc_html__( 'Color 1', 'zenvy' ),
					'color_2' => esc_html__( 'Color 2', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-text)',
					'color_2' => 'var(--color-text-light)',
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
				],
				'inherits'          => [
					'color_1' => 'var(--color-link)',
					'color_2' => 'var(--color-link-hover)',
				],
			],
			// Border & Shadow Color
			'zenvy_border_shadow_color'       => [
				'type'              => 'color',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Border & Shadow', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 30,
				'colors'            => [
					'color_1' => esc_html__( 'Border', 'zenvy' ),
					'color_2' => esc_html__( 'Shadow', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-border)',
					'color_2' => 'var(--color-box-shadow)',
				],
			],
			// Background Color
			'zenvy_background_color' => [
				'type'              => 'color',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_color' ],
				'label'             => esc_html__( 'Background', 'zenvy' ),
				'section'           => 'colors',
				'priority'          => 35,
				'colors'            => [
					'color_1' => esc_html__( 'Color 1', 'zenvy' ),
					'color_2' => esc_html__( 'Color 2', 'zenvy' ),
					'color_3' => esc_html__( 'Color 3', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-bg)',
					'color_2' => 'var(--color-bg-light)',
					'color_3' => 'var(--color-bg-dark)',
				],
			],
		];
	}
}
new Zenvy_Customize_Global_Color_Fields();
