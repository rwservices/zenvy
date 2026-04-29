<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zenvy
 */

?>

</div><!-- #content -->

<?php
/**
 * Functions hooked into zenvy_footer_before action
 *
 */
do_action( 'zenvy_footer_before' );
?>

<footer id="colophon" class="site-footer">

    <?php
    /**
     * Functions hooked into zenvy_footer_before action
     *
     */
    do_action( 'zenvy_footer_top' );
    ?>

    <?php
    /**
     * Functions hooked into zenvy_footer action
     *
     * @hooked zenvy_footer_site_info - 10
     */
    do_action( 'zenvy_footer' );
    ?>

    <?php
    /**
     * Functions hooked into zenvy_footer_before action
     *
     */
    do_action( 'zenvy_footer_bottom' );
    ?>

</footer><!-- #colophon -->

<?php
/**
 * Functions hooked into zenvy_footer_after action
 *
 * @hooked zenvy_footer_back_to_top - 10
 */
do_action( 'zenvy_footer_after' );
?>

</div><!-- #page -->


<?php
/**
 * Functions hooked into zenvy_body_bottom action
 *
 */
do_action( 'zenvy_body_bottom' );
?>

<?php wp_footer(); ?>

</body>
</html>
