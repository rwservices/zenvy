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
$meta_elements  = get_theme_mod(
    'zenvy_meta_elements',
    ['date', 'categories']
);

if ($featured_posts->have_posts()):

    $posts_elements = get_theme_mod('zenvy_front_page_featured_section_post_elements', ['post-meta', 'title', 'excerpt', 'read_more']);
    ?>
    <!-- featured posts slider -->
    <section class="featured-slider post">
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
                                <?php
                                    $enable_tags = get_theme_mod('zenvy_front_page_featured_section_image_tags', ['desktop' => 'true']);
                                    if ($enable_tags && array_key_exists('desktop', $enable_tags)) {
                                        zenvy_posted_first_tag();
                                    }
                                ?>
                                </span>
                            </figure>
                        </div>
                        <?php if (!empty($posts_elements)): ?>
                            <div class="slider-text">
                                <?php foreach ($posts_elements as $post_elements):
                                    switch ($post_elements) {
                                        case 'post-meta':
                                            ?>
                                            <div class="entry-meta">
                                                <?php
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
                                            Zenvy_Helper::post_excerpt();
                                            break;
                                        case 'read_more':
                                            Zenvy_Helper::read_more('featured_section');
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