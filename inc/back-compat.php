<?php
/**
 * Zenvy back compat functionality
 *
 * Prevents Zenvy from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.6.
 *
 * @package Zenvy
 */

/**
 * Prevent switching to Zenvy on old versions of WordPress.
 *
 * Switches to the default theme.
 */
function zenvy_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'zenvy_upgrade_notice' );
}

add_action( 'after_switch_theme', 'zenvy_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Zenvy on WordPress versions prior to 5.6.
 *
 * @global string $wp_version WordPress version.
 */
function zenvy_upgrade_notice() {
	$message = sprintf( esc_html__( 'Zenvy requires at least WordPress version 5.6. You are running version %s. Please upgrade and try again.', 'zenvy' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.6.
 *
 * @global string $wp_version WordPress version.
 */
function zenvy_customize() {
	wp_die(
		sprintf( esc_html__( 'Zenvy requires at least WordPress version 5.6. You are running version %s. Please upgrade and try again.', 'zenvy' ), $GLOBALS['wp_version'] ),
		'',
		[
			'back_link' => true,
		]
	);
}

add_action( 'load-customize.php', 'zenvy_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.6.
 *
 * @global string $wp_version WordPress version.
 */
function zenvy_preview() {
	if ( ! isset( $_GET['preview'] ) ) {
		return;
	}

	wp_die( sprintf( esc_html__( 'Zenvy requires at least WordPress version 5.6. You are running version %s. Please upgrade and try again.', 'zenvy' ), $GLOBALS['wp_version'] ) );
}

add_action( 'template_redirect', 'zenvy_preview' );
