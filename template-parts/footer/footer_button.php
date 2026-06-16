<?php
/**
 * Template part for displaying button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$zenvy_button_text = get_theme_mod(
	'zenvy_footer_button_text',
	esc_html__( 'Button', 'zenvy' )
);
$zenvy_button_url  = get_theme_mod(
	'zenvy_footer_button_url',
	'#'
);
$zenvy_link_open   = get_theme_mod(
	'zenvy_footer_button_url_target',
	''
);
$zenvy_link_target = ( $zenvy_link_open && array_key_exists( 'desktop', $zenvy_link_open ) ) ? '_blank' : '_self';
?>

<div class="footer-button-wrap d-flex align-items-center">
	<a href="<?php echo esc_url( $zenvy_button_url ); ?>" target="<?php echo esc_attr( $zenvy_link_target ); ?>" class="box-button d-flex align-items-center">
		<label><?php echo esc_html( $zenvy_button_text ); ?></label>
	</a>
</div><!-- .footer-button-wrap -->
