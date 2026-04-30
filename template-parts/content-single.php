<?php

/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$elements = get_theme_mod(
	'zenvy_single_post_content_entry_header_elements',
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
	 * Functions hooked into zenvy_post_entry_header action
	 *
	 * @hooked zenvy_featured_image_wrapper_start - 5
	 * @hooked zenvy_get_post_thumbnail    - 10
	 * @hooked zenvy_featured_image_wrapper_end - 15
	 * @hooked zenvy_blog_post_content    - 20
	 */
	do_action( 'zenvy_post_entry_header' );
	?>

	<?php
	/**
	 * Functions hooked into zenvy_post_entry_content action
	 *
	 * @hooked zenvy_post_content - 10
	 */
	do_action( 'zenvy_post_entry_content' );
	?>

	<?php
	/**
	 * Functions hooked into zenvy_post_entry_footer action
	 *
	 * @hooked zenvy_post_footer - 10
	 */
	do_action( 'zenvy_post_entry_footer' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->