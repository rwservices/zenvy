<?php
/**
 * Template part for displaying button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$zenvy_content_display = get_theme_mod(
	'zenvy_header_button_type',
	[ 'desktop' => 'text' ]
);
$zenvy_button_text     = get_theme_mod(
	'zenvy_header_button_text',
	esc_html__( 'ENG', 'zenvy' )
);
$zenvy_button_url      = get_theme_mod(
	'zenvy_header_button_url',
	'#'
);
$zenvy_link_open       = get_theme_mod(
	'zenvy_header_button_url_target',
	''
);

$zenvy_link_target = ( $zenvy_link_open && array_key_exists( 'desktop', $zenvy_link_open ) ) ? '_blank' : '_self';

?>

<div class="header-button-wrap d-flex">
	<a href="<?php echo esc_url( $zenvy_button_url ); ?>" class="box-button d-flex align-items-center" target="<?php echo esc_attr( $zenvy_link_target ); ?>">
		<?php if ( $zenvy_content_display && ( 'text' === $zenvy_content_display['desktop'] || 'both' === $zenvy_content_display['desktop'] ) ) : ?>
			<label><?php echo esc_html( $zenvy_button_text ); ?></label>
		<?php endif; ?>
	</a>
</div><!-- .header-button-wrap -->
