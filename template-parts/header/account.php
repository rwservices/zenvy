<?php
/**
 * Template part for displaying Account
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

// Login.
$zenvy_login_text = get_theme_mod(
	'zenvy_header_account_login_text',
	esc_html__( 'My Account', 'zenvy' )
);
$zenvy_login_url  = get_theme_mod(
	'zenvy_header_account_login_url',
	'#'
);

// Logout.
$zenvy_logout_text = get_theme_mod(
	'zenvy_header_account_logout_text',
	esc_html__( 'Log In', 'zenvy' )
);
$zenvy_logout_url  = get_theme_mod(
	'zenvy_header_account_logout_url',
	wp_login_url()
);

$zenvy_link_open = get_theme_mod(
	'zenvy_header_account_url_target',
	''
);

$zenvy_link_target = ( $zenvy_link_open && array_key_exists( 'desktop', $zenvy_link_open ) ) ? '_blank' : '_self';

// Set account URL and label based on login state.
if ( is_user_logged_in() || is_customize_preview() ) {
	$zenvy_account_url  = $zenvy_login_url;
	$zenvy_account_text = $zenvy_login_text;
} else {
	$zenvy_account_url  = $zenvy_logout_url;
	$zenvy_account_text = $zenvy_logout_text;
}
?>

<div class="header-account-wrap d-flex">
	<a href="<?php echo esc_url( $zenvy_account_url ); ?>" class="box-button d-flex align-items-center" target="<?php echo esc_attr( $zenvy_link_target ); ?>">
		<?php if ( '' !== $zenvy_account_text ) : ?>
			<label><?php echo esc_html( $zenvy_account_text ); ?></label>
		<?php endif; ?>
	</a>
</div><!-- .header-account-wrap -->