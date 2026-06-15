<?php
/**
 * Product list item template
 *
 * @package Zenvy
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<li <?php wc_product_class( 'element-item', $product ); ?>>

<div class="product-list-wrapper">

	<div class="image-icon-wrapper">

		<div class="featured-image-wrapper">
			<figure class="featured-image" data-ratio="auto">
				<a href="<?php the_permalink(); ?>">
					<?php echo wp_kses_post( woocommerce_get_product_thumbnail() ); ?>
				</a>
			</figure>
		</div>

		<?php if ( $product->is_on_sale() ) : ?>
		<div class="sales-tag">
			<span><?php esc_html_e( 'Sale', 'zenvy' ); ?></span>
		</div>
		<?php endif; ?>

		<div class="icons">
			<?php woocommerce_template_loop_add_to_cart(); ?>
		</div>

	</div>

	<div class="list-info">

		<header class="entry-header">
			<a href="<?php the_permalink(); ?>">
				<h3 class="entry-title"><?php the_title(); ?></h3>
			</a>
		</header>

		<span class="price">
			<?php echo wp_kses_post( $product->get_price_html() ); ?>
		</span>

	</div>

</div>

</li>