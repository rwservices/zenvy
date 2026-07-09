<?php
/**
 * Template part for displaying footer HTML
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$zenvy_content = get_theme_mod(
	'zenvy_footer_html_text',
	''
);
?>

<div class="footer-html-wrap">
	<?php echo wp_kses_post( $zenvy_content ); ?>
</div><!-- .footer-html-wrap -->
