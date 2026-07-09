<?php
/**
 * Template part for displaying featured content on the front page.
 *
 * @package Zenvy
 */

$zenvy_featured_tag            = get_theme_mod( 'zenvy_front_page_featured_section_tag' );
$zenvy_featured_tag_post_count = get_theme_mod( 'zenvy_front_page_featured_section_posts_limit', [ 'desktop' => 3 ] );
$zenvy_args                    = [
	'posts_per_page'      => absint( $zenvy_featured_tag_post_count['desktop'] ),
	'orderby'             => 'date',
	'ignore_sticky_posts' => true,
];
if ( $zenvy_featured_tag ) {
	$zenvy_args['tag'] = sanitize_text_field( $zenvy_featured_tag );
}
$zenvy_featured_posts = new WP_Query( $zenvy_args );
$zenvy_meta_elements  = get_theme_mod(
	'zenvy_meta_elements',
	[ 'date', 'categories' ]
);

if ( $zenvy_featured_posts->have_posts() ) :

	$zenvy_posts_elements = get_theme_mod( 'zenvy_front_page_featured_section_post_elements', [ 'post-meta', 'title', 'excerpt', 'read_more' ] );
	?>
	<!-- featured posts slider -->
	<section class="featured-slider post">
		<div class="container">
			<div class="owl-carousel owl-theme owl-slider-demo">
				<?php
				while ( $zenvy_featured_posts->have_posts() ) :
					$zenvy_featured_posts->the_post();
					?>
					<div class="slider-content">
						<div class="slider-image-wrapper">
							<figure class="slider-image">
								<?php zenvy_post_thumbnail( 'featured_image', '3x4' ); ?>
								<?php
									$zenvy_enable_tags = get_theme_mod( 'zenvy_front_page_featured_section_image_tags', [ 'desktop' => 'true' ] );
								if ( $zenvy_enable_tags && array_key_exists( 'desktop', $zenvy_enable_tags ) ) {
									zenvy_posted_first_tag();
								}
								?>
								</span>
							</figure>
						</div>
						<?php if ( ! empty( $zenvy_posts_elements ) ) : ?>
							<div class="slider-text">
								<?php
								foreach ( $zenvy_posts_elements as $zenvy_post_elements ) :
									switch ( $zenvy_post_elements ) {
										case 'post-meta':
											?>
											<div class="entry-meta">
												<?php
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
												?>
											</div>
											<?php
											break;

										case 'title':
											?>
											<h2 class="slider-title">
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h2>
											<?php
											break;
										case 'excerpt':
											Zenvy_Helper::post_excerpt();
											break;
										case 'read_more':
											Zenvy_Helper::read_more( 'featured_section' );
											break;
									}
								endforeach;
								?>
							</div>
						<?php endif; ?>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- featured-slider ends here -->