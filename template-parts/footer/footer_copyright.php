<?php
/**
 * Template part for displaying footer copyright text
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$zenvy_content = get_theme_mod(
	'zenvy_footer_copyright_text',
	__( 'Copyright {copyright} {current_year} {site_title}', 'zenvy' )
);

$zenvy_link_open = get_theme_mod(
	'zenvy_footer_copyright_link_target',
	[ 'desktop' => 'true' ]
);

$zenvy_link_target = ( $zenvy_link_open && array_key_exists( 'desktop', $zenvy_link_open ) ) ? '_blank' : '_self';

$zenvy_content  = str_replace( '{copyright}', '&copy;', $zenvy_content );
$zenvy_content  = str_replace( '{current_year}', date_i18n( _x( 'Y', 'copyright date format; check date() on php.net', 'zenvy' ) ), $zenvy_content );
$zenvy_content  = str_replace( '{site_title}', get_bloginfo( 'name' ), $zenvy_content );
$zenvy_content .= sprintf(
/* translators: 1: title. */
	esc_html__( ' -  Powered by %1$s', 'zenvy' ),
	'<a href="' . esc_url( 'https://www.aarambhathemes.com/' ) . '" rel="designer" target="' . esc_attr( $zenvy_link_target ) . '">' . esc_html__( 'Aarambha Themes', 'zenvy' ) . '</a>'
);
?>

<span class="site-info footer-copyright-wrap">
	<?php echo wp_kses_post( do_shortcode( $zenvy_content ) ); ?>
</span><!-- .site-info -->
