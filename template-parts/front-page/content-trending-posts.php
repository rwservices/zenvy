<?php
/**
 * Template part for displaying trending posts section on the front page
 * 
 * @package Zenvy
 */

$show_trending_posts_sidebar = get_theme_mod('zenvy_front_page_trending_posts_enable_sidebar', '');
$trending_posts_count = get_theme_mod('zenvy_front_page_trending_posts_limit', ['desktop' => 3]);

// Exclude featured posts from trending posts
if (isset($featured_posts) && $featured_posts->have_posts()) {
    $featured_ids = wp_list_pluck($featured_posts->posts, 'ID');
} else {
    $featured_ids = array();
}

$trending = new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'comment_count',
    'order' => 'DESC',
    'posts_per_page' => $trending_posts_count['desktop'],
    'post__not_in' => $featured_ids,
    'ignore_sticky_posts' => true,
));
?>
<section class="section-wrap trending-posts-section">
    <div class="container">
        <h2 class="screen-reader-text"><?php esc_html_e('Trending Posts', 'zenvy'); ?></h2>
        <div class="section-wrap-inner">
            <div class="<?php echo $show_trending_posts_sidebar ? 'section-left' : ''; ?>">
                <section class="blog-section">
                    <div class="post-wrapper overlap-post">
                        <?php
                        if ($trending->have_posts()):
                            while ($trending->have_posts()):
                                $trending->the_post();
                                $post_class = ['post'];
                                if (!has_post_thumbnail()) {
                                    $post_class[] = 'no-featured-image';
                                }
                                ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
                                    <div class="featured-image-wrapper">
                                        <?php
                                        zenvy_post_thumbnail("medium_large", "16x9");
                                        $enable_tags = get_theme_mod('zenvy_front_page_trending_posts_featured_image_tags', ['desktop' => 'true']);

                                        if ($enable_tags && array_key_exists('desktop', $enable_tags)) {
                                            zenvy_posted_first_tag();
                                        }

                                        ?>
                                    </div>
                                    <?php
                                    $posts_elements = get_theme_mod(
                                        'zenvy_front_page_trending_posts_elements',
                                        ['post-meta', 'post-title', 'post-excerpt', 'read-more']
                                    );
                                    $meta_elements = get_theme_mod(
                                        'zenvy_meta_elements',
                                        ['date', 'categories']
                                    );

                                    if (!empty($posts_elements)):
                                        echo '<div class="post-content d-flex flex-column text-left">';

                                        foreach ($posts_elements as $post_element):

                                            switch ($post_element):

                                                case 'post-title':
                                                    Zenvy_Helper::post_title();
                                                    break;

                                                case 'post-excerpt':
                                                    Zenvy_Helper::post_content();
                                                    break;

                                                case 'read-more':
                                                    Zenvy_Helper::read_more('trending_posts');
                                                    break;

                                                case 'post-meta':
                                                    echo '<div class="entry-meta">';

                                                    if ($meta_elements) {
                                                        foreach ($meta_elements as $val) {
                                                            if ($val === 'author') {
                                                                zenvy_posted_by();
                                                            } elseif ($val === 'categories') {
                                                                zenvy_posted_cats();
                                                            } elseif ($val === 'tags') {
                                                                zenvy_posted_tags();
                                                            } elseif ($val === 'date') {
                                                                zenvy_posted_on();
                                                            } elseif ($val === 'comment') {
                                                                zenvy_comment_count();
                                                            }
                                                        }
                                                    }
                                                    echo '</div><!-- .entry-meta -->';
                                                    break;
                                            endswitch;
                                        endforeach;

                                        echo '</div><!-- .post-details-wrap -->';
                                    endif;

                                    ?>
                                </article><!--#post-<?php the_ID(); ?> -->
                                <?php
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
            <?php if ($show_trending_posts_sidebar && array_key_exists('desktop', $show_trending_posts_sidebar) && is_active_sidebar('sidebar-trending-posts')): ?>
                <?php get_sidebar('sidebar-trending-posts'); ?>
            <?php endif; ?>
        </div>
    </div>
</section>