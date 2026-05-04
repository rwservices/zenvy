<?php
/**
 * Template part for displaying explore categories section on the front page
 * 
 * @package Zenvy
 */

?>
<?php

$categories = get_theme_mod('zenvy_front_page_explore_section_lists', '');

if ($categories):
    $title = get_theme_mod('zenvy_front_page_explore_section_heading', esc_html__('Explore our topics', 'zenvy'));
    ?>
    <section class="explore-section">
        <div class="container">

            <header class="entry-header heading">
                <h2 class="entry-title">
                    <?php echo esc_html($title); ?>
                </h2>
            </header>
            <div class="owl-carousel owl-theme explore-slider">
                <?php
                foreach ($categories as $category) {
                    $category_obj = get_category_by_slug($category['category_slug']);
                    ?>
                    <article class="post">
                        <figure>
                            <?php if (!empty($category['category_image'])):
                                $img_url = wp_get_attachment_image_src(absint($category['category_image']), 'medium_large');
                                if ($img_url):
                                ?>
                                    <img src="<?php echo esc_url($img_url[0]); ?>" alt="<?php echo esc_attr($category_obj->name); ?>">
                                <?php
                                endif;
                            endif; ?>
                        </figure>
                        <div class="post-content">
                            <div class="post-cat-list">
                                <span class="cat-link">
                                    <a href="<?php echo esc_url(get_category_link($category_obj->term_id)); ?>">
                                        <?php echo esc_html($category_obj->name); ?>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
endif;