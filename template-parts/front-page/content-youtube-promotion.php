<?php
/**
 * Template part for displaying YouTube promotion section on the front page
 *
 * @package Zenvy
 */

$zenvy_title = get_theme_mod( 'zenvy_front_page_youtube_promotion_section_title', esc_html__( 'ME @ YOUTUBE', 'zenvy' ) );

$zenvy_video_url_1      = get_theme_mod( 'zenvy_video_url_1', '#' );
$zenvy_video_title_1    = get_theme_mod( 'zenvy_video_title_1', 'Video Title 1' );
$zenvy_video_category_1 = get_theme_mod( 'zenvy_video_category_1' );
$zenvy_video_category_1 = get_term_by( 'slug', $zenvy_video_category_1, 'category' );

$zenvy_video_url_2      = get_theme_mod( 'zenvy_video_url_2', '#' );
$zenvy_video_title_2    = get_theme_mod( 'zenvy_video_title_2', 'Video Title 2' );
$zenvy_video_category_2 = get_theme_mod( 'zenvy_video_category_2' );
$zenvy_video_category_2 = get_term_by( 'slug', $zenvy_video_category_2, 'category' );

$zenvy_video_url_3       = get_theme_mod( 'zenvy_video_url_3', '#' );
$zenvy_video_title_3     = get_theme_mod( 'zenvy_video_title_3', 'Video Title 3' );
$zenvy_video_category_3  = get_theme_mod( 'zenvy_video_category_3' );
$zenvy_video_category_3  = get_term_by( 'slug', $zenvy_video_category_3, 'category' );
$zenvy_video_channel_url = get_theme_mod( 'zenvy_video_channel_url', '#' );

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
<section class="video-post-section">
	<div class="container">
		<header class="entry-header heading">
			<h2 class="entry-title">
				<?php echo esc_html( $zenvy_title ); ?>
			</h2>
		</header>
		<div class="row">
			<div class="custom-col-7">
				<article class="post">
					<div class="featured-image-wrapper">
						<figure class="featured-image" data-ratio="auto">
							<a href="<?php echo esc_url( $zenvy_video_url_1 ); ?>" target="_blank">
								<img src="<?php echo esc_url( Zenvy_Helper::get_video_thumbnail_url( $zenvy_video_url_1 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="">
							</a>
						</figure>
					</div>
					<div class="post-content">
						<div class="entry-meta">
							<div class="post-cat-list">
								<span class="cat-link">
									<?php if ( $zenvy_video_category_1 ) : ?>
										<?php $zenvy_term_link = get_term_link( $zenvy_video_category_1->term_id ); ?>
										<?php if ( ! is_wp_error( $zenvy_term_link ) ) : ?>
											<a href="<?php echo esc_url( $zenvy_term_link ); ?>">
												<?php echo esc_html( $zenvy_video_category_1->name ); ?>
											</a>
										<?php endif; ?>
									<?php endif; ?>
								</span>
							</div>
						</div>
						<header class="entry-header">
							<h3 class="entry-title">
								<a href="<?php echo esc_url( $zenvy_video_url_1 ); ?>" target="_blank">
									<?php echo esc_html( $zenvy_video_title_1 ); ?>
								</a>
							</h3>
						</header>
					</div>
				</article>
			</div>
			<div class="custom-col-5">
				<article class="post flexible-post">
					<div class="featured-image-wrapper">
						<figure class="featured-image" data-ratio="auto">
							<a href="<?php echo esc_url( $zenvy_video_url_2 ); ?>" target="_blank">
								<img src="<?php echo esc_url( Zenvy_Helper::get_video_thumbnail_url( $zenvy_video_url_2 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="">
							</a>
						</figure>
					</div>
					<div class="post-content">
						<div class="entry-meta">
							<div class="post-cat-list">
								<span class="cat-link">
									<?php if ( $zenvy_video_category_2 ) : ?>
										<?php $zenvy_term_link = get_term_link( $zenvy_video_category_2->term_id ); ?>
										<?php if ( ! is_wp_error( $zenvy_term_link ) ) : ?>
											<a href="<?php echo esc_url( $zenvy_term_link ); ?>">
												<?php echo esc_html( $zenvy_video_category_2->name ); ?>
											</a>
										<?php endif; ?>
									<?php endif; ?>
								</span>
							</div>
						</div>
						<header class="entry-header">
							<h3 class="entry-title">
								<a href="<?php echo esc_url( $zenvy_video_url_2 ); ?>" target="_blank">
									<?php echo esc_html( $zenvy_video_title_2 ); ?>
								</a>
							</h3>
						</header>
					</div>
				</article>
				<article class="post flexible-post">
					<div class="featured-image-wrapper">
						<figure class="featured-image" data-ratio="auto">
							<a href="<?php echo esc_url( $zenvy_video_url_3 ); ?>" target="_blank">
								<img src="<?php echo esc_url( Zenvy_Helper::get_video_thumbnail_url( $zenvy_video_url_3 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="">
							</a>
						</figure>
					</div>
					<div class="post-content">
						<div class="entry-meta">
							<div class="post-cat-list">
								<span class="cat-link">
									<?php if ( $zenvy_video_category_3 ) : ?>
										<?php $zenvy_term_link = get_term_link( $zenvy_video_category_3->term_id ); ?>
										<?php if ( ! is_wp_error( $zenvy_term_link ) ) : ?>
											<a href="<?php echo esc_url( $zenvy_term_link ); ?>">
												<?php echo esc_html( $zenvy_video_category_3->name ); ?>
											</a>
										<?php endif; ?>
									<?php endif; ?>
								</span>
							</div>
						</div>
						<header class="entry-header">
							<h3 class="entry-title">
								<a href="<?php echo esc_url( $zenvy_video_url_3 ); ?>" target="_blank">
									<?php echo esc_html( $zenvy_video_title_3 ); ?>
								</a>
							</h3>
						</header>
					</div>
				</article>
				<div class="btn-wrapper">
					<a href="<?php echo esc_url( $zenvy_video_channel_url ); ?>" target="_blank" class="<?php echo esc_attr( implode( ' ', $zenvy_read_more_class ) ); ?>">
						<span class="read-more-btn-image"></span>
						<?php esc_html_e( 'All Videos', 'zenvy' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>