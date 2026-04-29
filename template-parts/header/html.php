<?php
/**
 * Template part for displaying header HTML
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */


$content = get_theme_mod(
    'zenvy_header_html_text',
    ''
);
?>

<div class="header-html-wrap">
    <?php echo wp_kses_post( $content ); ?>
</div><!-- .header-html-wrap -->