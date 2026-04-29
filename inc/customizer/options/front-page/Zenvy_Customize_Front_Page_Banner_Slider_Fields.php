<?php
/**
 * Zenvy Theme Customizer Front Page Header Banner settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Banner_Slider_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Enable Header Banner
			'zenvy_front_page_banner_slider_enable' => [
				'type'              => 'toggle',
				'default'           => [ 'desktop' => true ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'Slider', 'zenvy' ),
				'section'           => 'zenvy_front_page_banner_section',
				'priority'          => 15,
			],
			// Number of Slides
			'zenvy_front_page_banner_slider_limit'  => [
				'type'              => 'range',
				'default'           => [ 'desktop' => 5 ],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Slides Limit', 'zenvy' ),
				'section'           => 'zenvy_front_page_banner_section',
				'priority'          => 25,
				'units'             => [],
				'input_attrs'       => [
					'min'  => 1,
					'step' => 1,
					'max'  => 20,
				],
			],
		];
	}
}
new Zenvy_Customize_Front_Page_Banner_Slider_Fields();
