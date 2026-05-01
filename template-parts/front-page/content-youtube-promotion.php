<?php
/**
 * Template part for displaying YouTube promotion section on the front page
 * 
 * @package Zenvy
 */


$video_url_1 = get_theme_mod('zenvy_video_url_1', '#');
$video_title_1 = get_theme_mod('zenvy_video_title_1', 'Video Title 1');
$video_category_1 = get_theme_mod('zenvy_video_category_1');
$video_category_1 = get_term_by('slug', $video_category_1, 'category');

$video_url_2 = get_theme_mod('zenvy_video_url_2', '#');
$video_title_2 = get_theme_mod('zenvy_video_title_2', 'Video Title 2');
$video_category_2 = get_theme_mod('zenvy_video_category_2');
$video_category_2 = get_term_by('slug', $video_category_2, 'category');

$video_url_3 = get_theme_mod('zenvy_video_url_3', '#');
$video_title_3 = get_theme_mod('zenvy_video_title_3', 'Video Title 3');
$video_category_3 = get_theme_mod('zenvy_video_category_3');
$video_category_3 = get_term_by('slug', $video_category_3, 'category');

$video_channel_url = get_theme_mod('zenvy_video_channel_url', '#');
?>
<section class="video-post-section">
    <div class="container">
        <header class="entry-header heading">
            <h2 class="entry-title">
                <?php esc_html_e('ME @ YOUTUBE', 'zenvy'); ?>
            </h2>
        </header>
        <div class="row">
            <div class="custom-col-7">
                <article class="post">
                    <div class="featured-image-wrapper">
                        <figure class="featured-image">
                            <a href="<?php echo esc_url($video_url_1); ?>">
                                <img src="<?php echo Zenvy_Helper::get_youtube_thumb($video_url_1); ?>" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="post-content">
                        <div class="entry-meta">
                            <div class="post-cat-list">
                                <span class="cat-link">
                                    <?php if ($video_category_1): ?>
                                        <a href="<?php echo esc_url(get_term_link($video_category_1->term_id)); ?>">
                                            <?php echo esc_html($video_category_1->name); ?>
                                        </a>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <header class="entry-header">
                            <h3 class="entry-title">
                                <a href="<?php echo esc_url($video_url_1); ?>">
                                    <?php echo esc_html($video_title_1); ?>
                                </a>
                            </h3>
                        </header>
                    </div>
                </article>
            </div>
            <div class="custom-col-5">
                <article class="post flexible-post">
                    <div class="featured-image-wrapper">
                        <figure class="featured-image">
                            <a href="<?php echo esc_url($video_url_2); ?>">
                                <img src="<?php echo Zenvy_Helper::get_youtube_thumb($video_url_2); ?>" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="post-content">
                        <div class="entry-meta">
                            <div class="post-cat-list">
                                <span class="cat-link">
                                    <?php if ($video_category_2): ?>
                                        <a href="<?php echo esc_url(get_term_link($video_category_2->term_id)); ?>">
                                            <?php echo esc_html($video_category_2->name); ?>
                                        </a>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <header class="entry-header">
                            <h3 class="entry-title">
                                <a href="<?php echo esc_url($video_url_2); ?>">
                                    <?php echo esc_html($video_title_2); ?>
                                </a>
                            </h3>
                        </header>
                    </div>
                </article>
                <article class="post flexible-post">
                    <div class="featured-image-wrapper">
                        <figure class="featured-image">
                            <a href="<?php echo esc_url($video_url_3); ?>">
                                <img src="<?php echo Zenvy_Helper::get_youtube_thumb($video_url_3); ?>" alt="">
                            </a>
                            </a>
                        </figure>
                    </div>
                    <div class="post-content">
                        <div class="entry-meta">
                            <div class="post-cat-list">
                                <span class="cat-link">
                                    <?php if ($video_category_3): ?>
                                        <a href="<?php echo esc_url(get_term_link($video_category_3->term_id)); ?>">
                                            <?php echo esc_html($video_category_3->name); ?>
                                        </a>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <header class="entry-header">
                            <h3 class="entry-title">
                                <a href="<?php echo esc_url($video_url_3); ?>">
                                    <?php echo esc_html($video_title_3); ?>
                                </a>
                            </h3>
                        </header>
                    </div>
                </article>
                <div class="btn-wrapper">
                    <a href="<?php echo esc_url($video_channel_url); ?>" class="read-more-btn">
                        <?php esc_html_e('All Videos', 'zenvy'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>