<?php
/**
 * Zenvy Theme Customizer Header Site Identify settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Header_Site_Identity_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'zenvy_header_site_identity_group_settings' => [
				'type'     => 'group',
				'section'  => 'title_tagline',
				'priority' => 10,
				'choices'  => [
					'normal' => [
						'tab-title' => esc_html__( 'General', 'zenvy' ),
						'controls'  => [
							'custom_logo',
							'zenvy_header_site_logo_position',
							'zenvy_header_site_title_enable',
							'blogname',
							'zenvy_header_site_tagline_enable',
							'blogdescription',
							'site_icon',
						],
					],
					'hover'  => [
						'tab-title' => esc_html__( 'Style', 'zenvy' ),
						'controls'  => [
							'zenvy_header_site_identify_note_two',
							'zenvy_header_site_title_typo',
							'zenvy_header_site_tagline_typo',
							'zenvy_header_site_identify_note_three',
							'zenvy_header_site_identify_padding',
							'zenvy_header_site_identify_margin',
						],
					],
				],
			],
			// Site title
			'zenvy_header_site_title_enable'            => [
				'type'              => 'toggle',
				'default'           => [ 'desktop' => 'true' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Site Title', 'zenvy' ),
				'section'           => 'title_tagline',
				'priority'          => 30,
			],
			// Site tagline
			'zenvy_header_site_tagline_enable'          => [
				'type'              => 'toggle',
				'default'           => [ 'desktop' => 'true' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Tagline', 'zenvy' ),
				'section'           => 'title_tagline',
				'priority'          => 40,
			],
			// Note Two
			'zenvy_header_site_identify_note_two'       => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SITE TITLE & TAGLINE', 'zenvy' ),
				'section'  => 'title_tagline',
				'priority' => 65,
			],
			// Site Title
			'zenvy_header_site_title_typo'              => [
				'type'              => 'typography',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
				'label'             => esc_html__( 'Site Title', 'zenvy' ),
				'section'           => 'title_tagline',
				'priority'          => 70,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'units'             => [ 'px', 'rem', 'pt', 'em', 'vw' ],
				'colors'            => [
					'color_1' => esc_html__( 'Normal', 'zenvy' ),
					'color_2' => esc_html__( 'Hover', 'zenvy' ),
				],
				'inherits'          => [
					'color_1' => 'var(--color-link)',
					'color_2' => 'var(--color-link-hover)',
				],
				'fields'            => [
					'font_family'    => true,
					'font_variant'   => true,
					'font_size'      => true,
					'letter_spacing' => true,
					'colors'         => true,
				],
			],
			// Site Tagline
			'zenvy_header_site_tagline_typo'            => [
				'type'              => 'typography',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_typography' ],
				'label'             => esc_html__( 'Tagline', 'zenvy' ),
				'section'           => 'title_tagline',
				'priority'          => 75,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'units'             => [ 'px', 'rem', 'pt', 'em', 'vw' ],
				'inherits'          => [
					'color_1' => 'var(--color-link)',
				],
				'fields'            => [
					'font_size' => true,
					'colors'    => true,
				],
			],
			// Note Three
			'zenvy_header_site_identify_note_three'     => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SITE IDENTIFY CONTAINER', 'zenvy' ),
				'section'  => 'title_tagline',
				'priority' => 80,
			],
			// Padding
			'zenvy_header_site_identify_padding'        => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'zenvy' ),
				'description'       => esc_html__( 'Set container padding.', 'zenvy' ),
				'section'           => 'title_tagline',
				'priority'          => 85,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
			// Margin
			'zenvy_header_site_identify_margin'         => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'zenvy' ),
				'description'       => esc_html__( 'Set container margin.', 'zenvy' ),
				'section'           => 'title_tagline',
				'priority'          => 90,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
			],
		];
	}
}
new Zenvy_Customize_Header_Site_Identity_Fields();
