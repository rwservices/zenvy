<?php
/**
 *
 * Template Name: Page Builder
 *
 * The template for displaying content from page builder.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */
get_header();
?>

<?php
/**
 * Functions hooked into zenvy_content_before action
 *
 * @hooked zenvy_content_before_wrapper_start     - 10
 */
do_action( 'zenvy_content_before' );
?>

<div id="primary" <?php Zenvy_Helper::primary_class();?>>
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) : the_post();
			the_content();
			if ( is_singular() && Zenvy_Helper::front_page_enable() ) :
				get_template_part( 'template-parts/front-page/content' );
			endif;
		endwhile; // End of the loop.
		?>
	</main>
</div><!-- #primary -->

<?php
/**
 * Functions hooked into zenvy_content_after action
 *
 * @hooked zenvy_content_after_wrapper_end     - 10
 */
do_action( 'zenvy_content_after' );
?>

<?php get_footer(); ?>
