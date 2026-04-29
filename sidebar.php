<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zenvy
 */

if ( ! is_active_sidebar( 'sidebar-1' )
    || Zenvy_Helper::get_sidebar_layout() == 'none'
    || Zenvy_Helper::front_page_enable() ) {
    return;
}

/**
 * Functions hooked into zenvy_sidebar_before action
 *
 */
do_action( 'zenvy_sidebar_before' );
?>

    <aside id="secondary" <?php Zenvy_Helper::sidebar_class(); ?>>

        <?php
        /**
         * Functions hooked into zenvy_sidebar_top action
         *
         */
        do_action( 'zenvy_sidebar_top' );
        ?>

        <?php dynamic_sidebar( 'sidebar-1' ); ?>

        <?php
        /**
         * Functions hooked into zenvy_sidebar_bottom action
         *
         */
        do_action( 'zenvy_sidebar_bottom' );
        ?>

    </aside><!-- #secondary -->

<?php
/**
 * Functions hooked into zenvy_sidebar_before action
 *
 */
do_action( 'zenvy_sidebar_after' );
