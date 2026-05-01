<?php
/**
 * Template part for displaying explore categories section on the front page
 * 
 * @package Zenvy
 */

?>
<?php

$categories = get_theme_mod('zenvy_front_page_explore_categories');

if (!empty($categories)):
    ?>
    <section class="explore-section">
        <div class="container">

            <header class="entry-header heading">
                <h2 class="entry-title">
                    <?php esc_html_e('EXPLORE OUR TOPICS', 'zenvy'); ?>
                </h2>
            </header>
            <div class="owl-carousel owl-theme explore-slider">
                <?php
                foreach ($categories as $category) {
                    $category_obj = get_category_by_slug($category['category_slug']);
                    ?>
                    <article class="post">
                        <figure>
                            <?php if ($category['category_image']): ?>
                                <img src="<?php echo esc_url($category['category_image']); ?>"
                                    alt="<?php echo esc_attr($category_obj->name); ?>">
                            <?php endif; ?>
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