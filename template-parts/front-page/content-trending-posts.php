<?php
/**
 * Template part for displaying trending posts section on the front page
 * 
 * @package Zenvy
 */

$show_homepage_sidebar_sec = get_theme_mod('zenvy_front_page_show_homepage_sidebar_sec', false);
$trending_posts_count = get_theme_mod('zenvy_front_page_trending_posts_count', 3);
// Exclude featured posts from recent posts
if (isset($featured_posts) && $featured_posts->have_posts()) {
    $featured_ids = wp_list_pluck($featured_posts->posts, 'ID');
} else {
    $featured_ids = array();
}
$trending = new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'comment_count',
    'order' => 'DESC',
    'posts_per_page' => $trending_posts_count,
    'post__not_in' => $featured_ids,
    'ignore_sticky_posts' => true,
));
?>
<section class="section-wrap">
    <div class="container">
        <h2 class="screen-reader-text"><?php esc_html_e('Trending Posts', 'zenvy'); ?></h2>
        <div class="section-wrap-inner">
            <div class="<?php echo $show_homepage_sidebar_sec ? 'section-left' : ''; ?>">
                <section class="blog-section">
                    <div class="post-wrapper overlap-post">
                        <?php
                        if ($trending->have_posts()):
                            while ($trending->have_posts()):
                                $trending->the_post();
                                get_template_part('template-parts/content');
                            endwhile;
                            ?>
                            <div class="btn-wrapper">
                                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                                    class="box-button"><?php esc_html_e('View all', 'zenvy') ?></a>
                            </div>
                            <?php
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </section>
            </div>
            <?php if ($show_homepage_sidebar_sec && is_active_sidebar('sidebar-homepage-sec')): ?>
                <?php get_sidebar('homepage-sec'); ?>
            <?php endif; ?>
        </div>
    </div>
</section>