<?php
/**
 * Template part for displaying explore categories section on the front page
 * 
 * @package Zenvy
 */

?>
<?php
$latest_posts_count = get_theme_mod('zenvy_front_page_latest_posts_number', ['desktop' => 3]);
$show_homepage_sidebar = get_theme_mod('zenvy_front_page_latest_posts_enable_sidebar', '');
// Exclude featured posts from recent posts
if (isset($featured_posts) && $featured_posts->have_posts()) {
    $featured_ids = wp_list_pluck($featured_posts->posts, 'ID');
} else {
    $featured_ids = array();
}
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $latest_posts_count['desktop'],
    'post__not_in' => $featured_ids,
    'ignore_sticky_posts' => true,
);

$recent_posts = new WP_Query($args);
if ($recent_posts->have_posts()):
    ?>
    <!-- recent posts sections -->
    <section class="section-wrap">
        <div class="container">
            <h2 class="screen-reader-text"><?php esc_html_e('Recent Posts', 'zenvy'); ?></h2>
            <div class="section-wrap-inner">
                <div class="<?php echo $show_homepage_sidebar ? 'section-left' : ''; ?>">
                    <section class="blog-section">
                        <div class="post-wrapper alternative-post">
                            <?php
                            while ($recent_posts->have_posts()):
                                $recent_posts->the_post();

                                get_template_part('template-parts/content', 'posts');

                            endwhile;
                            ?>
                        </div>
                    </section>
                </div>
                <?php if ($show_homepage_sidebar && array_key_exists('desktop', $show_homepage_sidebar) && is_active_sidebar('sidebar-homepage')): ?>
                    <?php get_sidebar('homepage'); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
endif;
wp_reset_postdata();