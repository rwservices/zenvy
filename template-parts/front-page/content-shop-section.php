<?php
/**
 * Template part for displaying woocommerce shop section on the front page
 * 
 * @package Zenvy
 */


$section_title = get_theme_mod('zenvy_front_page_shop_title', 'Shop my favouritess from my Awesome collection');
$section_desc = get_theme_mod('zenvy_front_page_shop_desc', 'Don’t laugh, guys, but I’ve turned into the person who maps out a detailed plan for how her makeup collection will look in the next year!');
$shop_link = get_theme_mod('zenvy_front_page_shop_button_link', '#');
$shop_btn_text = get_theme_mod('zenvy_front_page_shop_button_text', 'Shop more');
$shop_image = get_theme_mod('zenvy_front_page_shop_image', get_template_directory_uri() . '/assets/build/images/shop-title-image.png');
?>

<section class="shop-section">
    <div class="container">
        <div class="row">
            <div class="custom-col-7">
                <header class="entry-header heading">
                    <?php if ($section_title): ?>
                        <h2 class="entry-title">
                            <?php echo esc_html($section_title); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ($section_desc): ?>
                        <p>
                            <?php echo esc_html($section_desc); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($shop_link): ?>
                        <a href="<?php echo esc_url($shop_link); ?>" class="read-more-btn">
                            <?php echo esc_html($shop_btn_text); ?>
                        </a>
                    <?php endif; ?>
                </header>
                <div class="shop-item-wrap">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 3,
                        'post_status' => 'publish'
                    );
                    $products = new WP_Query($args);
                    if ($products->have_posts()):

                        while ($products->have_posts()):
                            $products->the_post();
                            global $product;
                            ?>

                            <div class="element-item">
                                <div class="product-list-wrapper">

                                    <div class="image-icon-wrapper">

                                        <figure class="featured-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo woocommerce_get_product_thumbnail(); ?>
                                            </a>
                                        </figure>

                                        <?php if ($product->is_on_sale()): ?>
                                            <div class="sales-tag">
                                                <span>
                                                    <?php esc_html_e('Sale', 'zenvy'); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        <div class="icons">
                                            <?php woocommerce_template_loop_add_to_cart(); ?>
                                        </div>

                                    </div>

                                    <div class="list-info">

                                        <header class="entry-header">
                                            <a href="<?php the_permalink(); ?>">
                                                <h3 class="entry-title">
                                                    <?php the_title(); ?>
                                                </h3>
                                            </a>
                                        </header>

                                        <span class="price">
                                            <?php echo wp_kses_post($product->get_price_html()); ?>
                                        </span>

                                    </div>

                                </div>
                            </div>

                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

            <div class="custom-col-5">
                <div class="shop-title-wrap">

                    <?php if ($shop_image): ?>
                        <figure class="featured-image">
                            <img src="<?php echo esc_url($shop_image); ?>" alt="">
                        </figure>
                    <?php endif; ?>

                    <h3 class="entry-title">
                        <?php esc_html_e('Shop', 'zenvy'); ?>
                    </h3>

                </div>
            </div>

        </div>
    </div>
</section>