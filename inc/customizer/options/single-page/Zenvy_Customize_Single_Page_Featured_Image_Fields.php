<?php
/**
 * Zenvy Theme Customizer Single Page Featured Image settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Single_Page_Featured_Image_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Image Ratio
			'zenvy_single_page_featured_image_ratio' => [
				'type'              => 'buttonset',
				'default'           => [ 'desktop' => '16x9' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Aspect Ratio', 'zenvy' ),
				'description'       => esc_html__( 'Select custom aspect ratio for featured image. Choose it wisely for better appearance.', 'zenvy' ),
				'section'           => 'zenvy_single_page_featured_image_section',
				'priority'          => 15,
				'choices'           => [
					'auto' => esc_html__( 'Auto', 'zenvy' ),
					'1x1'  => esc_html__( '1:1', 'zenvy' ),
					'4x3'  => esc_html__( '4:3', 'zenvy' ),
					'16x9' => esc_html__( '16:9', 'zenvy' ),
					'3x4'  => esc_html__( '3:4', 'zenvy' ),
				],
			],
			// Image Size
			'zenvy_single_page_featured_image_size'  => [
				'type'              => 'buttonset',
				'default'           => [ 'desktop' => 'medium_large' ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Image Size', 'zenvy' ),
				'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'zenvy' ),
				'section'           => 'zenvy_single_page_featured_image_section',
				'priority'          => 20,
				'choices'           => [
					'thumbnail'    => esc_html__( 'Small', 'zenvy' ),
					'medium'       => esc_html__( 'Medium', 'zenvy' ),
					'medium_large' => esc_html__( 'Medium Large', 'zenvy' ),
					'large'        => esc_html__( 'Large', 'zenvy' ),
				],
			],
		];
	}
}
new Zenvy_Customize_Single_Page_Featured_Image_Fields();
