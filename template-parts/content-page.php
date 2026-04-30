<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$elements = get_theme_mod(
	'zenvy_single_page_content_entry_header_elements',
	''
);
$classes = array();
if ( empty( $elements ) ) {
	$classes[] = 'has-empty-header';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<?php
	/**
	 * Functions hooked into zenvy_page_entry_header action
	 *
	 * @hooked zenvy_singular_post_thumbnail - 10
	 * @hooked zenvy_post_header    - 15
	 */
	do_action( 'zenvy_page_entry_header' );
	?>

	<?php
	/**
	 * Functions hooked into zenvy_page_entry_content action
	 *
	 * @hooked zenvy_page_content - 10
	 */
	do_action( 'zenvy_page_entry_content' );
	?>

	<?php
	/**
	 * Functions hooked into zenvy_page_entry_footer action
	 *
	 * @hooked zenvy_page_footer - 10
	 */
	do_action( 'zenvy_page_entry_footer' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->