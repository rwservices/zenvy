<?php
/**
 * Zenvy Theme Customizer Single Post Sidebar settings
 *
 * @package Zenvy
 */

/**
 * Class Zenvy_Customize_Single_Post_Sidebar_Fields
 *
 * Handles customizer single post sidebar layout fields for the Zenvy theme.
 */
class Zenvy_Customize_Single_Post_Sidebar_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Sidebar layout settings.
			'zenvy_single_post_sidebar_layout' => [
				'type'              => 'radio_image',
				'default'           => 'right',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Sidebar', 'zenvy' ),
				'description'       => esc_html__( 'Choose Sidebar Layout for single post.', 'zenvy' ),
				'section'           => 'zenvy_single_post_sidebar_section',
				'priority'          => 15,
				'choices'           => [
					'left'  => ZENVY_THEME_URI . 'assets/build/images/left.png',
					'right' => ZENVY_THEME_URI . 'assets/build/images/right.png',
					'none'  => ZENVY_THEME_URI . 'assets/build/images/none.png',
				],
				'l10n'              => [
					'left'  => esc_html__( 'Left', 'zenvy' ),
					'right' => esc_html__( 'Right', 'zenvy' ),
					'none'  => esc_html__( 'None', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Single_Post_Sidebar_Fields();