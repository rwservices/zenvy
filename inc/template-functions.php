<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Zenvy
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zenvy_body_classes( $classes ) {

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) || ! Zenvy_Helper::get_sidebar_layout() ) {
		$classes[] = 'no-sidebar';
	}

	if ( is_front_page() && is_home() || is_home() || is_search() || is_archive() || is_404() ) {
		$custom_class = 'zenvy-blog';

		if ( ( is_post_type_archive( 'agent' )
				|| is_post_type_archive( 'property' )
				|| is_tax( 'property-location' ) )
			|| 'property' === get_post_type() ) {
			$custom_class = 'zenvy-archive';
		}
		$classes[] = esc_attr( $custom_class );
	}

	// Is Sticky Sidebar
	$is_sticky_sidebar = get_theme_mod(
		'zenvy_sidebar_sticky',
		''
	);
	if ( $is_sticky_sidebar ) {
		$classes[] = 'has-sticky-sidebar';
	}

	// Enable static Front Page
	if ( Zenvy_Helper::front_page_enable() ) {
		$classes[] = 'zenvy-front-page';
	}

	// Placeholder or Thumbnail
	if ( is_singular() ) {
		if ( has_post_thumbnail() ) {
			$classes[] = 'has-thumbnail';
		}
	} else {
		$classes[] = 'has-blog-thumbnail';
	}

	return array_unique( $classes );
}

add_filter( 'body_class', 'zenvy_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function zenvy_pingback_header() {
	if ( ! is_singular() || ! pings_open() ) {
		return;
	}

	printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
}

add_action( 'wp_head', 'zenvy_pingback_header' );

/**
 * Return an array of all icons.
 */
function zenvy_get_fontawesome() {
		// Bail if the nonce doesn't check out
	if ( ! isset( $_POST['zenvy_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['zenvy_customize_nonce'] ), 'zenvy_customize_nonce' ) ) {
		wp_die();
	}

		// Do another nonce check
		check_ajax_referer( 'zenvy_customize_nonce', 'zenvy_customize_nonce' );

		// Bail if user can't edit theme options
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die();
	}

		// Get all of our fonts
		$fonts = Zenvy_Font_Awesome_Icons::$icons;

		ob_start();
	if ( $fonts ) { ?>
			<ul class="font-group">
				<?php
				foreach ( $fonts as $font => $val ) {
					echo '<li data-font="' . esc_attr( $font ) . '"><i class="fa ' . esc_attr( $font ) . '"></i></li>';
				}
				?>
			</ul>
			<?php
	}
		$output = ob_get_clean();
		echo apply_filters( 'zenvy_get_fontawesome', $output ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		// Exit
		wp_die();
}

add_action( 'wp_ajax_zenvy_get_fontawesome', 'zenvy_get_fontawesome' );

if ( ! function_exists( 'zenvy_get_template_part' ) ) {

	/**
	 * zenvy_get_template_part
	 *
	 * @param      $id
	 * @param      $slug
	 * @param null $name
	 */
	function zenvy_get_template_part( $id, $slug, $name = null ) {

		$templates = [];
		$name      = (string) $name;
		if ( '' !== $name ) {
			$templates[] = "{$slug}-{$name}.php";
		}

		$templates[] = "{$slug}.php";
		$template    = locate_template( $templates );

		// Allow 3rd party plugins to filter template file from their plugin.
		$template = apply_filters( 'zenvy_get_template_part', $template, $id, $slug, $name );
		if ( ! $template ) {
			return;
		}

		load_template( $template, false );
	}
}
