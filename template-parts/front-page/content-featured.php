<?php
/**
 * Template part for displaying featured content on the front page.
 * 
 * @package Zenvy
 */

$featured_tag = get_theme_mod('zenvy_front_page_featured_tag');
$featured_tag_post_count = get_theme_mod('zenvy_front_page_featured_post_count', 3);
$featured_tag_sorting = get_theme_mod('zenvy_front_page_featured_tag_sorting');
$fallback = get_theme_mod('zenvy_front_page_featured_fallback_image', get_template_directory_uri() . '/assets/img/default-post.jpg');
$args = array(
    'posts_per_page' => $featured_tag_post_count,
    'orderby' => 'date',
    'order' => $featured_tag_sorting == 'latest' ? 'DESC' : 'ASC',
    'ignore_sticky_posts' => true,
);
if ($featured_tag) {
    $args['tag'] = sanitize_text_field($featured_tag);
}
$featured_posts = new WP_Query($args);
?>
<!-- featured posts slider -->
<section class="featured-slider">
    <div class="container">
        <div class="owl-carousel owl-theme owl-slider-demo">
            <?php
            if ($featured_posts->have_posts()):
                while ($featured_posts->have_posts()):
                    $featured_posts->the_post();
                    ?>
                    <div class="slider-content">
                        <div class="slider-image-wrapper">
                            <figure class="slider-image">
                                <?php
                                if (has_post_thumbnail()) {

                                    the_post_thumbnail('featured_post');

                                } elseif ($fallback) {
                                    echo '<img src="' . esc_url($fallback) . '" alt="">';
                                }
                                ?>
                            </figure>
                            <span class="tags-links">
                                <?php
                                if ($featured_tag) {
                                    echo '<a href="' . esc_url(get_tag_link(get_term_by('slug', $featured_tag, 'post_tag')->term_id)) . '" rel="tag">';
                                    echo esc_html(get_term_by('slug', $featured_tag, 'post_tag')->name);
                                    echo '</a>';
                                } else {
                                    $categories = get_the_category();
                                    if (!empty($categories)) {

                                        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" rel="category">';
                                        echo esc_html($categories[0]->name);
                                        echo '</a>';
                                    }
                                }
                                ?>
                            </span>
                        </div>
                        <div class="slider-text">
                            <?php zenvy_entry_meta(); ?>
                            <h2 class="slider-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <p>
                                <?php the_excerpt(); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>"
                                class="read-more-btn"><?php esc_html_e('Read More', 'zenvy'); ?></a>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<!-- featured-slider ends here -->