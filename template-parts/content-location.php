<?php
/**
 * Template part for displaying property location listing in page-templates/location.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked into zenvy_page_entry_content action
	 *
	 * @hooked zenvy_page_content - 10
	 */
	do_action( 'zenvy_page_entry_content' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php

get_template_part( 'template-parts/front-page/content-property', 'location' );
