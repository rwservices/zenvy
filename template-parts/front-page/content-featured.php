<?php
/**
 * Template part for displaying featured content on the front page.
 * 
 * @package Zenvy
 */

$featured_tag = get_theme_mod('zenvy_front_page_featured_section_tag');
$featured_tag_post_count = get_theme_mod('zenvy_front_page_featured_section_posts_limit', ['desktop' => 3]);
$args = array(
    'posts_per_page' => absint($featured_tag_post_count['desktop']),
    'orderby' => 'date',
    'ignore_sticky_posts' => true,
);
if ($featured_tag) {
    $args['tag'] = sanitize_text_field($featured_tag);
}
$featured_posts = new WP_Query($args);

if ($featured_posts->have_posts()):

    $posts_elements = get_theme_mod('zenvy_front_page_featured_section_post_elements', ['post-meta', 'title', 'excerpt', 'read_more']);
    ?>
    <!-- featured posts slider -->
    <section class="featured-slider">
        <div class="container">
            <div class="owl-carousel owl-theme owl-slider-demo">
                <?php
                while ($featured_posts->have_posts()):
                    $featured_posts->the_post();
                    ?>
                    <div class="slider-content">
                        <div class="slider-image-wrapper">
                            <figure class="slider-image">
                                <?php zenvy_post_thumbnail('featured_image', "3x4") ?>
                            </figure>
                            <span class="tags-links">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" rel="category">';
                                    echo esc_html($categories[0]->name);
                                    echo '</a>';
                                }
                                ?>
                            </span>
                        </div>
                        <?php if (!empty($posts_elements)): ?>
                            <div class="slider-text">
                                <?php foreach ($posts_elements as $post_elements):
                                    switch ($post_elements) {
                                        case 'post-meta':
                                            ?>
                                            <div class="entry-meta">
                                                <?php
                                                zenvy_posted_on();
                                                zenvy_posted_cats();
                                                ?>
                                            </div>
                                            <?php
                                            break;

                                        case 'title':
                                            ?>
                                            <h2 class="slider-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>
                                            <?php
                                            break;
                                        case 'excerpt':
                                            ?>
                                            <p>
                                                <?php the_excerpt(); ?>
                                            </p>
                                            <?php
                                            break;
                                        case 'read_more':
                                            ?>
                                            <a href="<?php the_permalink(); ?>"
                                                class="read-more-btn"><?php esc_html_e('Read More', 'zenvy'); ?>
                                            </a>
                                            <?php
                                            break;
                                    }
                                endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- featured-slider ends here -->