<?php
/**
 * Template part for displaying trending posts section on the front page
 *
 * @package Zenvy
 */

$zenvy_show_trending_posts_sidebar = get_theme_mod( 'zenvy_front_page_trending_posts_enable_sidebar', '' );
$zenvy_trending_posts_count        = get_theme_mod( 'zenvy_front_page_trending_posts_limit', [ 'desktop' => 3 ] );

// Exclude featured posts from trending posts.
if ( isset( $featured_posts ) && $featured_posts->have_posts() ) {
	$zenvy_featured_ids = wp_list_pluck( $featured_posts->posts, 'ID' );
} else {
	$zenvy_featured_ids = [];
}

$zenvy_trending = new WP_Query(
	[
		'post_type'           => 'post',
		'orderby'             => 'comment_count',
		'order'               => 'DESC',
		'posts_per_page'      => $zenvy_trending_posts_count['desktop'],
		'post__not_in'        => $zenvy_featured_ids,
		'ignore_sticky_posts' => true,
	]
);

$zenvy_sidebar_class = ( $zenvy_show_trending_posts_sidebar && array_key_exists( 'desktop', $zenvy_show_trending_posts_sidebar ) && is_active_sidebar( 'sidebar-trending-posts' ) ) ? 'section-left' : '';

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
<section class="section-wrap">
	<div class="container">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Trending Posts', 'zenvy' ); ?></h2>
		<div class="section-wrap-inner">
			<div class="<?php echo esc_attr( $zenvy_sidebar_class ); ?>">
				<section class="blog-section">
					<div class="post-wrapper overlap-post">
						<?php
						if ( $zenvy_trending->have_posts() ) :
							while ( $zenvy_trending->have_posts() ) :
								$zenvy_trending->the_post();
								$zenvy_post_class = [ 'post' ];
								if ( ! has_post_thumbnail() ) {
									$zenvy_post_class[] = 'no-featured-image';
								}
								?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( $zenvy_post_class ); ?>>
									<div class="featured-image-wrapper">
										<?php
										zenvy_post_thumbnail( 'medium_large', '16x9' );
										$zenvy_enable_tags = get_theme_mod( 'zenvy_front_page_trending_posts_featured_image_tags', [ 'desktop' => 'true' ] );

										if ( $zenvy_enable_tags && array_key_exists( 'desktop', $zenvy_enable_tags ) ) {
											zenvy_posted_first_tag();
										}

										?>
									</div>
									<?php
									$zenvy_posts_elements = get_theme_mod(
										'zenvy_front_page_trending_posts_elements',
										[ 'post-meta', 'post-title', 'post-excerpt', 'read-more' ]
									);
									$zenvy_meta_elements  = get_theme_mod(
										'zenvy_meta_elements',
										[ 'date', 'categories' ]
									);

									if ( ! empty( $zenvy_posts_elements ) ) :
										echo '<div class="post-content d-flex flex-column text-left">';

										foreach ( $zenvy_posts_elements as $zenvy_post_element ) :

											switch ( $zenvy_post_element ) :

												case 'post-title':
													Zenvy_Helper::post_title();
													break;

												case 'post-excerpt':
													Zenvy_Helper::post_content();
													break;

												case 'read-more':
													Zenvy_Helper::read_more( 'trending_posts' );
													break;

												case 'post-meta':
													echo '<div class="entry-meta">';

													if ( $zenvy_meta_elements ) {
														foreach ( $zenvy_meta_elements as $zenvy_val ) {
															if ( 'author' === $zenvy_val ) {
																zenvy_posted_by();
															} elseif ( 'categories' === $zenvy_val ) {
																zenvy_posted_cats();
															} elseif ( 'tags' === $zenvy_val ) {
																zenvy_posted_tags();
															} elseif ( 'date' === $zenvy_val ) {
																zenvy_posted_on();
															} elseif ( 'comment' === $zenvy_val ) {
																zenvy_comment_count();
															}
														}
													}
													echo '</div><!-- .entry-meta -->';
													break;
											endswitch;
										endforeach;

										echo '</div><!-- .post-details-wrap -->';
									endif;

									?>
								</article><!--#post-<?php the_ID(); ?> -->
								<?php
							endwhile;
							?>
							<div class="btn-wrapper">
								<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"
									class="<?php echo esc_attr( implode( ' ', $zenvy_read_more_class ) ); ?>"><?php esc_html_e( 'View all', 'zenvy' ); ?></a>
							</div>
							<?php
						endif;
						wp_reset_postdata();
						?>
					</div>
				</section>
			</div>
			<?php if ( $zenvy_show_trending_posts_sidebar && array_key_exists( 'desktop', $zenvy_show_trending_posts_sidebar ) && is_active_sidebar( 'sidebar-trending-posts' ) ) : ?>
				<div class="section-wrap-sidebar widget-area">
					<?php dynamic_sidebar( 'sidebar-trending-posts' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>