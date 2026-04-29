<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zenvy
 */

?>

<!doctype html>

<?php
/**
 * Functions hooked into zenvy_html_before action
 */
do_action( 'zenvy_html_before' );
?>

<html <?php language_attributes(); ?>>

<head>

	<?php
	/**
	 * Functions hooked into zenvy_head_top action
	 */
	do_action( 'zenvy_head_top' );
	?>

	<?php
	/**
	 * Functions hooked into zenvy_head action
	 *
	 * @hooked zenvy_head_meta - 10
	 */
	do_action( 'zenvy_head' );
	?>

	<?php
	/**
	 * Functions hooked into zenvy_head_bottom action
	 */
	do_action( 'zenvy_head_bottom' );
	?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
/**
 * Functions hooked into zenvy_body_top action
 */
do_action( 'zenvy_body_top' );
?>

<?php wp_body_open(); ?>

<div id="page" <?php Zenvy_Helper::site_class(); ?>>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'zenvy' ); ?></a>

	<?php
	/**
	 * Functions hooked into zenvy_header_before action
	 */
	do_action( 'zenvy_header_before' );
	?>

	<header id="masthead" class="site-header">

		<?php
		/**
		 * Functions hooked into zenvy_header_top action
		 */
		do_action( 'zenvy_header_top' );
		?>

		<?php
		/**
		 * Functions hooked into zenvy_header action
		 *
		 * @hooked zenvy_header_main - 10
		 */
		do_action( 'zenvy_header' );

		?>

		<?php
		/**
		 * Functions hooked into zenvy_header_bottom action
		 */
		do_action( 'zenvy_header_bottom' );
		?>

	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked into zenvy_header_after action
	 */
	do_action( 'zenvy_header_after' );
	?>
	<div id="content" <?php Zenvy_Helper::site_content_class(); ?>>
