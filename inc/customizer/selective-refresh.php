<?php
/**
 * Zenvy Theme Customizer Selective Refresh
 *
 * @package Zenvy
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		[
			'selector'        => '.site-title a',
			'render_callback' => [ $this, 'zenvy_customize_partial_blogname' ],
		]
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		[
			'selector'        => '.site-description',
			'render_callback' => [ $this, 'zenvy_customize_partial_blogdescription' ],
		]
	);

	// Header Builder
	$wp_customize->selective_refresh->add_partial(
		'zenvy_header',
		[
			'selector'        => '.site-header',
			'settings'        => [
				'zenvy_header_builder_controller_section',
			],
			'render_callback' => static function () {
				Zenvy_Customizer_Header_Builder()->zenvy_header_display();
			},
		]
	);

	// Footer Builder
	$wp_customize->selective_refresh->add_partial(
		'zenvy_footer',
		[
			'selector'        => '.site-footer',
			'settings'        => [
				'zenvy_footer_builder_controller_section',
			],
			'render_callback' => static function () {
				Zenvy_Customizer_Footer_Builder()->zenvy_footer_display();
			},
		]
	);
}
