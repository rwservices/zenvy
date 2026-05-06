<?php
/**
 * Template part for displaying WooCommerce Cart
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$wc_cart_icon = get_theme_mod(
    'zenvy_header_woocommerce_cart_icon',
    'fas fa-shopping-cart'
);
$widget_class = is_cart() ? 'wc-cart-widget-wrapper d-none' : 'wc-cart-widget-wrapper';
?>
<div class="header-wc-cart-wrap d-flex">
    <div class="wc-cart-wrapper">
        <a class="wc-icon cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'blogin-aarambha' ); ?>">
            <?php Zenvy_Font_Awesome_Icons::get_icon( 'ui', $wc_cart_icon ); ?>
            <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
        </a>
        <div class="<?php echo esc_attr( $widget_class ); ?>">
            <?php $instance = array(
                'title' => esc_html__( 'Your Cart', 'blogin-aarambha' ),
            );
            the_widget( 'WC_Widget_Cart', $instance ); ?>
        </div>
    </div>
</div><!-- .header-wc-cart-wrap -->