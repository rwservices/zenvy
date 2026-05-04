<?php
/**
 * Template part for displaying quote section on the front page
 * 
 * @package Zenvy
 */

$quote = get_theme_mod('zenvy_front_page_quote', "People often say that motivation doesn't come from within.");
$quote_by = get_theme_mod('zenvy_front_page_quote_by', '');
$quote_background = get_theme_mod('zenvy_front_page_quote_background');
?>
<section class="testimonial-quote-section">
    <div class="container">
        <div class="testimonial-quote-content-wrap" style="background: url(<?php echo esc_url($quote_background); ?>">
            <div class="testimonial-quote-content">
                <div class="entry-content">
                    <p><?php echo esc_html($quote); ?></p>
                </div>
                <h2 class="author-name"><?php echo esc_html($quote_by); ?></h2>
            </div>
        </div>
    </div>
</section>
