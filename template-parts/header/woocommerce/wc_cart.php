<?php
/**
 * Template part for displaying WooCommerce Cart
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$zenvy_wc_cart_icon = get_theme_mod(
	'zenvy_header_woocommerce_cart_icon',
	'fas fa-shopping-basket'
);
$zenvy_widget_class = is_cart() ? 'wc-cart-widget-wrapper d-none' : 'wc-cart-widget-wrapper';
?>
<div class="header-wc-cart-wrap d-flex">
	<div class="wc-cart-wrapper">
		<a class="wc-icon cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'zenvy' ); ?>">
			<?php Zenvy_Font_Awesome_Icons::get_icon( 'ui', $zenvy_wc_cart_icon ); ?>
			<span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
		</a>
		<div class="<?php echo esc_attr( $zenvy_widget_class ); ?>">
			<?php
			$zenvy_instance = [
				'title' => esc_html__( 'Your Cart', 'zenvy' ),
			];
			the_widget( 'WC_Widget_Cart', $zenvy_instance );
			?>
		</div>
	</div>
</div><!-- .header-wc-cart-wrap -->