<?php
/**
 * Template part for displaying woocommerce shop section on the front page
 *
 * @package Zenvy
 */

$zenvy_section_title = get_theme_mod( 'zenvy_front_page_shop_title', 'Shop my favouritess from my Awesome collection' );
$zenvy_section_desc  = get_theme_mod( 'zenvy_front_page_shop_desc', "Don't laugh, guys, but I've turned into the person who maps out a detailed plan for how her makeup collection will look in the next year!" );
$zenvy_shop_link     = get_theme_mod( 'zenvy_front_page_shop_button_link', '#' );
$zenvy_shop_btn_text = get_theme_mod( 'zenvy_front_page_shop_button_text', 'Shop more' );
$zenvy_shop_image    = get_theme_mod( 'zenvy_front_page_shop_image', get_template_directory_uri() . '/assets/build/images/shop-title-image.jpg' );
?>

<section class="shop-section">
	<div class="container">
		<div class="row">
			<div class="custom-col-7">
				<header class="entry-header heading">
					<?php if ( $zenvy_section_title ) : ?>
						<h2 class="entry-title">
							<?php echo esc_html( $zenvy_section_title ); ?>
						</h2>
					<?php endif; ?>
					<?php if ( $zenvy_section_desc ) : ?>
						<p>
							<?php echo esc_html( $zenvy_section_desc ); ?>
						</p>
					<?php endif; ?>
					<?php
					if ( $zenvy_shop_link ) :
						$zenvy_btn_type = get_theme_mod(
							'zenvy_button_type',
							[ 'desktop' => 'button' ]
						);

						$zenvy_read_more_class = [ 'read-more' ];
						// Fixed: Check if btn_type is array and has 'desktop' key.
						if ( is_array( $zenvy_btn_type ) && isset( $zenvy_btn_type['desktop'] ) && 'button' === $zenvy_btn_type['desktop'] ) {
							$zenvy_read_more_class[] = 'box-button';
						}

						// Fixed: Check if btn_type is array and has 'desktop' key.
						if ( is_array( $zenvy_btn_type ) && isset( $zenvy_btn_type['desktop'] ) && 'text' === $zenvy_btn_type['desktop'] ) {
							$zenvy_read_more_class[] = 'text-button';
						}

						?>
						<a href="<?php echo esc_url( $zenvy_shop_link ); ?>" class="<?php echo esc_attr( implode( ' ', $zenvy_read_more_class ) ); ?>">
							<?php echo esc_html( $zenvy_shop_btn_text ); ?>
						</a>
					<?php endif; ?>
				</header>
				<div class="shop-item-wrap">
					<?php
					$zenvy_products = wc_get_products(
						[
							'limit'   => 3,
							'status'  => 'publish',
							'orderby' => 'date',
							'order'   => 'DESC',
						]
					);

					foreach ( $zenvy_products as $zenvy_product ) :
						setup_postdata( $zenvy_product->get_id() );
						?>
						<div class="element-item">
							<div class="product-list-wrapper">
								<div class="image-icon-wrapper">
									<figure class="featured-image" data-ratio="auto">
										<a href="<?php echo esc_url( get_permalink( $zenvy_product->get_id() ) ); ?>">
											<?php echo $zenvy_product->get_image( 'woocommerce_thumbnail' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</a>
									</figure>

									<?php if ( $zenvy_product->is_on_sale() ) : ?>
										<div class="sales-tag">
											<span>
												<?php esc_html_e( 'Sale', 'zenvy' ); ?>
											</span>
										</div>
									<?php endif; ?>

									<div class="icons">
										<?php woocommerce_template_loop_add_to_cart(); ?>
									</div>
								</div>

								<div class="list-info">
									<header class="entry-header">
										<a href="<?php echo esc_url( get_permalink( $zenvy_product->get_id() ) ); ?>">
											<h3 class="entry-title">
												<?php echo esc_html( $zenvy_product->get_name() ); ?>
											</h3>
										</a>
									</header>
									<span class="price">
										<?php echo wp_kses_post( $zenvy_product->get_price_html() ); ?>
									</span>
								</div>
							</div>
						</div>
						<?php
					endforeach;
					wp_reset_postdata();
					?>
				</div>
			</div>

			<div class="custom-col-5">
				<div class="shop-title-wrap">

					<?php if ( $zenvy_shop_image ) : ?>
						<figure class="featured-image" data-ratio="auto">
							<img src="<?php echo esc_url( $zenvy_shop_image ); ?>" alt="">
						</figure>
					<?php endif; ?>

					<h3 class="entry-title">
						<?php esc_html_e( 'Shop', 'zenvy' ); ?>
					</h3>

				</div>
			</div>

		</div>
	</div>
</section>