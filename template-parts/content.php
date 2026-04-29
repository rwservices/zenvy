<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$post_class = ['post'];
if ( ! has_post_thumbnail() ) {
    $post_class[] = 'no-featured-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

    <?php
    /**
     * Functions hooked into zenvy_posts_entry_content action
     *
     * @hooked zenvy_get_post_thumbnail - 10
     * @hooked zenvy_blog_post_content   - 15
     */
    do_action( 'zenvy_posts_content' );

    ?>

</article><!-- #post-<?php the_ID(); ?> -->
