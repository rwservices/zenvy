<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zenvy
 */

get_header();
?>

<?php
/**
 * Functions hooked into zenvy_content_before action
 *
 * @hooked zenvy_content_before_page_header     - 10
 * @hooked zenvy_content_before_wrapper_start   - 15
 */
do_action( 'zenvy_content_before' );
?>

<section class="error-404 not-found">
	<?php
	$zenvy_content_elements = get_theme_mod(
		'zenvy_404_error_page_content_elements',
		[ 'title', 'subtitle', 'button' ]
	);
	if ( ! empty( $zenvy_content_elements ) ) :
		$zenvy_error_image = get_theme_mod(
			'zenvy_404_error_image',
			''
		);
		?>
		<div class="error-page-content">

			<?php
			foreach ( $zenvy_content_elements as $zenvy_content ) :
				switch ( $zenvy_content ) :
					case 'image':
						?>
						<figure>
							<img src="<?php echo esc_url( $zenvy_error_image ); ?>" alt="<?php esc_attr_e( '404 Error Image', 'zenvy' ); ?>">
						</figure>
						<?php
						break;

					case 'title':
						?>
						<h2><?php esc_html_e( '404', 'zenvy' ); ?></h2>
						<?php
						break;

					case 'subtitle':
						?>
						<h4><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'zenvy' ); ?></h4>
						<?php
						break;

					case 'button':
						$zenvy_btn_type = get_theme_mod(
							'zenvy_button_type',
							[ 'desktop' => 'button' ]
						);

						$zenvy_read_more_class = [ 'read-more' ];
						// Check if btn_type is array and has 'desktop' key.
						if ( is_array( $zenvy_btn_type ) && isset( $zenvy_btn_type['desktop'] ) && 'button' === $zenvy_btn_type['desktop'] ) {
							$zenvy_read_more_class[] = 'box-button';
						}

						// Check if btn_type is array and has 'desktop' key.
						if ( is_array( $zenvy_btn_type ) && isset( $zenvy_btn_type['desktop'] ) && 'text' === $zenvy_btn_type['desktop'] ) {
							$zenvy_read_more_class[] = 'text-button';
						}
						?>
						<a class="<?php echo esc_attr( implode( ' ', $zenvy_read_more_class ) ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Return Home', 'zenvy' ); ?></a>
						<?php
						break;

					case 'search':
						get_search_form();
						break;
				endswitch;
			endforeach;
			?>
		</div><!-- .error-page-content -->
		<?php
	endif;
	?>
</section><!-- .error-404 -->

<?php
/**
 * Functions hooked into zenvy_content_after action
 *
 * @hooked zenvy_content_after_wrapper_end     - 10
 */
do_action( 'zenvy_content_after' );
?>

<?php get_footer(); ?>