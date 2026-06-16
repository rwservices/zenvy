<?php
/**
 * Template part for displaying explore categories section on the front page
 * 
 * @package Zenvy
 */

?>
<?php

$zenvy_categories = get_theme_mod( 'zenvy_front_page_explore_section_lists', '' );

if ( $zenvy_categories ) :
	$zenvy_title = get_theme_mod( 'zenvy_front_page_explore_section_heading', esc_html__( 'Explore our topics', 'zenvy' ) );
	?>
	<section class="explore-section">
		<div class="container">

			<header class="entry-header heading">
				<h2 class="entry-title">
					<?php echo esc_html( $zenvy_title ); ?>
				</h2>
			</header>
			<div class="owl-carousel owl-theme explore-slider">
				<?php
				foreach ( $zenvy_categories as $zenvy_category ) {
					$zenvy_category_obj = get_category_by_slug( $zenvy_category['category_slug'] );
					?>
					<article class="post">
						<figure>
							<?php
							if ( ! empty( $zenvy_category['category_image'] ) ) :
								$zenvy_img_url = wp_get_attachment_image_src( absint( $zenvy_category['category_image'] ), 'medium_large' );
								if ( $zenvy_img_url ) :
									?>
									<img src="<?php echo esc_url( $zenvy_img_url[0] ); ?>" alt="<?php echo esc_attr( $zenvy_category_obj->name ); ?>">
									<?php
								endif;
							endif;
							?>
						</figure>
						<div class="post-content">
							<div class="post-cat-list">
								<span class="cat-link">
								<a href="<?php echo esc_url( get_category_link( $zenvy_category_obj->term_id ) ); ?>">
									<?php echo esc_html( $zenvy_category_obj->name ); ?>
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