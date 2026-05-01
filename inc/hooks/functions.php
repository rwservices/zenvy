<?php

/**
 * Zenvy functions to be hooked
 *
 * @package Zenvy
 */


/* ------------------------------ HEADER ------------------------------ */

if (! function_exists('zenvy_head_meta')) :

	/**
	 * Meta head
	 */
	function zenvy_head_meta()
	{
?>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	}

endif;

if (! function_exists('zenvy_header_featured_slider')) :

	/**
	 * Header Featured Slider
	 */
	function zenvy_header_featured_slider()
	{

		if (! Zenvy_Helper::front_page_enable()) {
			return;
		}

		get_template_part('template-parts/front-page/content', 'banner');
	}

endif;

/* ------------------------------ BEFORE CONTENT ------------------------------ */
if (! function_exists('zenvy_content_before_page_header')) :

	/**
	 * Featured page content page header
	 */
	function zenvy_content_before_page_header()
	{

		if (is_front_page() && is_home() || Zenvy_Helper::front_page_enable()) {
			return;
		}

		// Blog
		$elements = get_theme_mod(
			'zenvy_blog_page_header_elements',
			['post-title']
		);
		if (is_single()) {
			$elements = get_theme_mod(
				'zenvy_single_post_header_elements',
				['post-meta','post-title']
			);
		}

		// Is Single Page
		elseif (is_page()) {
			$elements = get_theme_mod(
				'zenvy_single_page_header_elements',
				['post-title']
			);
		}
		// Is 404 Page
		elseif (is_404()) {
			$elements = get_theme_mod(
				'zenvy_404_page_header_elements',
				['post-title']
			);
		}

		// Container Class
		$container_class = ['container d-flex flex-column align-items-start text-left'];
	?>
		<?php if (! empty($elements)) : ?>

			<div class="page-title-wrap">
				<div class="<?php echo esc_attr(implode(' ', $container_class)); ?>">
					<?php
					foreach ($elements as $element) :
						switch ($element):
							case 'post-title':
								Zenvy_Helper::page_header();
								break;

							case 'breadcrumb':
								Zenvy_Breadcrumb::get_breadcrumb();
								break;

							case 'post-meta':
								echo '<div class="post-meta-wrapper header-post-meta">';
								Zenvy_Helper::post_meta(get_the_ID());
								echo '</div><!-- .header-post-meta -->';
								break;

							case 'post-desc':
								if (! is_404()) {
									the_archive_description('<div class="archive-description">', '</div>');
								}
								break;
						endswitch;
					endforeach;
					?>
				</div>
			</div>

		<?php
		endif;
	}

endif;
if (! function_exists('zenvy_content_before_wrapper_start')) :

	/**
	 * Add custom wrapper div before content start
	 */
	function zenvy_content_before_wrapper_start()
	{
		if (is_404() || Zenvy_Helper::front_page_enable()) {
			return;
		}
		$section_class = is_single() && 'agent' !== get_post_type() ? 'page-wrapper single-post-wrapper' : 'page-wrapper';
		?>
		<section class="<?php echo esc_attr($section_class); ?>">
			<div class="container d-flex flex-wrap">
			<?php
		}

	endif;

	/* ------------------------------ AFTER CONTENT ------------------------------ */
	if (! function_exists('zenvy_content_after_wrapper_end')) :

		/**
		 * Close custom wrapper div after content
		 */
		function zenvy_content_after_wrapper_end()
		{
			if (is_404() || Zenvy_Helper::front_page_enable()) {
				return;
			}
			get_sidebar();
			echo '</div><! -- .container -->';
			echo '</section><! -- .page-wrapper -->';
		}

	endif;
	/* ------------------------------ BLOG PAGE CONTENT ------------------------------ */

	if (! function_exists('zenvy_posts_navigation')) :

		/**
		 * Blog Posts navigation
		 */
		function zenvy_posts_navigation()
		{

			Zenvy_Helper::post_pagination();
		}

	endif;

	if (! function_exists('zenvy_blog_post_content')) :

		/**
		 * Blog post content
		 */
		function zenvy_blog_post_content()
		{

			$posts_elements = get_theme_mod(
				'zenvy_blog_posts_elements',
				['post-meta', 'post-title', 'post-excerpt', 'read-more']
			);
			$meta_elements  = get_theme_mod(
				'zenvy_blog_posts_meta_elements',
				['date', 'categories']
			);

			if (! empty($posts_elements)) :
				echo '<div class="post-content d-flex flex-column text-left">';

				foreach ($posts_elements as $post_element) :

					switch ($post_element):

						case 'post-title':
							Zenvy_Helper::post_title();
							break;

						case 'post-excerpt':
							Zenvy_Helper::post_content();
							break;

						case 'read-more':
							Zenvy_Helper::read_more();
							break;

						case 'post-meta':
							echo '<div class="entry-meta">';

							if ($meta_elements) {
								foreach ($meta_elements as $val) {
									if ($val === 'author') {
										zenvy_posted_by();
									} elseif ($val === 'categories') {
										zenvy_posted_cats();
									} elseif ($val === 'tags') {
										zenvy_posted_tags();
									} elseif ($val === 'date') {
										zenvy_posted_on();
									}
								}
							}
							echo '</div><!-- .entry-meta -->';
							break;
					endswitch;
				endforeach;

				echo '</div><!-- .post-details-wrap -->';
			endif;
		}

	endif;

	/* ------------------------------ SEARCH PAGE CONTENT ------------------------------ */

	if (! function_exists('zenvy_search_posts_header')) :

		/**
		 * Posts Header
		 */
		function zenvy_search_posts_header()
		{
			?>
				<header class="entry-header">

					<?php
					/**
					 * Functions hooked in to zenvy_search_posts_header_top action.
					 */
					do_action('zenvy_search_posts_header_top');
					?>

					<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

					<?php
					if ('post' === get_post_type()) :
					?>
						<div class="entry-meta">
							<?php
							zenvy_posted_on();
							zenvy_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>

					<?php zenvy_post_thumbnail(); ?>

					<?php
					/**
					 * Functions hooked in to zenvy_search_posts_header_bottom action.
					 */
					do_action('zenvy_search_posts_header_bottom');
					?>

				</header><!-- .entry-header -->
			<?php
		}

	endif;

	if (! function_exists('zenvy_search_posts_content')) :

		/**
		 * Posts Content
		 */
		function zenvy_search_posts_content()
		{
			?>
				<div class="entry-summary">

					<?php
					/**
					 * Functions hooked in to zenvy_search_posts_content_top action.
					 */
					do_action('zenvy_search_posts_content_top');
					?>

					<?php the_excerpt(); ?>

					<?php
					/**
					 * Functions hooked in to zenvy_search_posts_content_bottom action.
					 */
					do_action('zenvy_search_posts_content_bottom');
					?>
				</div><!-- .entry-summary -->

			<?php
		}

	endif;

	if (! function_exists('zenvy_search_posts_footer')) :

		/**
		 * Posts Footer
		 */
		function zenvy_search_posts_footer()
		{
			?>
				<footer class="entry-footer">

					<?php
					/**
					 * Functions hooked in to zenvy_search_posts_footer_top action.
					 */
					do_action('zenvy_search_posts_footer_top');
					?>

					<?php zenvy_entry_footer(); ?>

					<?php
					/**
					 * Functions hooked in to zenvy_search_posts_footer_bottom action.
					 */
					do_action('zenvy_search_posts_footer_bottom');
					?>

				</footer><!-- .entry-footer -->

			<?php
		}

	endif;

	/* ------------------------------ POST CONTENT ------------------------------ */

	if (! function_exists('zenvy_featured_image_wrapper_start')) {

		/**
		 * Featured Image Wrapper Start
		 */
		function zenvy_featured_image_wrapper_start()
		{
			echo '<div class="featured-image-wrapper">';
		}
	}

	if (! function_exists('zenvy_get_post_thumbnail')) :

		/**
		 * Post Thumbnail
		 */
		function zenvy_get_post_thumbnail()
		{

			// Is Singular
			if (is_singular()) {
				$img_ratio = is_single() ? get_theme_mod('zenvy_single_post_featured_image_ratio', ['desktop' => '16x9']) : get_theme_mod('zenvy_single_page_featured_image_ratio', ['desktop' => '16x9']);

				$img_size = is_single() ? get_theme_mod('zenvy_single_post_featured_image_size', ['desktop' => 'medium_large']) : get_theme_mod('zenvy_single_page_featured_image_size', ['desktop' => 'medium_large']);

				$ratio = in_array('auto', $img_ratio) ? '16x9' : $img_ratio['desktop'];

				zenvy_singular_post_thumbnail($img_size['desktop'], $ratio);

				$enable_tags = get_theme_mod('zenvy_single_post_featured_image_tags', ['desktop' => 'true']);

				if ($enable_tags && array_key_exists('desktop', $enable_tags)) {
					zenvy_posted_first_tag();
				}

			} else {
				$img_ratio = get_theme_mod('zenvy_blog_post_featured_image_ratio', ['desktop' => '1x1']);

				$img_size = get_theme_mod('zenvy_blog_post_featured_image_size', ['desktop' => 'medium_large']);

				$ratio = in_array('auto', $img_ratio) ? '16x9' : $img_ratio['desktop'];

				zenvy_post_thumbnail($img_size['desktop'], $ratio);

				$enable_tags = get_theme_mod('zenvy_blog_post_featured_image_tags', ['desktop' => 'true']);

				if ($enable_tags && array_key_exists('desktop', $enable_tags)) {
					zenvy_posted_first_tag();
				}
			}
		}

	endif;

	if (! function_exists('zenvy_featured_image_wrapper_end')) {

		/**
		 * Featured Image Wrapper End
		 */
		function zenvy_featured_image_wrapper_end()
		{
			echo '</div><!-- .featured-image-wrapper -->';
		}
	}

	if (! function_exists('zenvy_post_header')) :

		/**
		 * Post Header
		 */
		function zenvy_post_header()
		{
			?>
				<header class="entry-header">

					<?php
					/**
					 * Functions hooked in to zenvy_post_header_top action.
					 */
					do_action('zenvy_post_header_top');
					?>

					<?php
					$elements = get_theme_mod(
						'zenvy_single_post_content_entry_header_elements',
						''
					);
					if (! empty($elements)) :
						foreach ($elements as $element) :
							switch ($element):
								case 'post-title':
									$html_tag = get_theme_mod(
										'zenvy_single_post_title_tag',
										['desktop' => 'h1']
									);
									the_title('<' . esc_attr($html_tag['desktop']) . ' class="entry-title">', '</' . esc_attr($html_tag['desktop']) . '>');
									break;

								case 'post-cats':
									echo '<div class="entry-meta">';
									zenvy_posted_cats();
									echo '</div><!-- .entry-meta -->';

									break;
							endswitch;
						endforeach;
					endif;

					?>

					<?php
					/**
					 * Functions hooked in to zenvy_post_header_bottom action.
					 */
					do_action('zenvy_post_header_bottom');
					?>

				</header><!-- .entry-header -->

			<?php
		}

	endif;

	if (! function_exists('zenvy_post_content')) :

		/**
		 * Post Content
		 */
		function zenvy_post_content()
		{
			?>
				<div class="entry-content">

					<?php
					/**
					 * Functions hooked in to zenvy_post_content_top action.
					 */
					do_action('zenvy_post_content_top');
					?>

					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'zenvy'),
								[
									'span' => [
										'class' => [],
									],
								]
							),
							wp_kses_post(get_the_title())
						)
					);
					?>

					<?php

					wp_link_pages(
						[
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'zenvy'),
							'after'  => '</div>',
						]
					);
					?>

					<?php
					/**
					 * Functions hooked in to zenvy_post_content_bottom action.
					 */
					do_action('zenvy_post_content_bottom');
					?>

				</div><!-- .entry-content -->

			<?php
		}

	endif;

	if (! function_exists('zenvy_post_footer')) :

		/**
		 * Post Footer for extra elements
		 */
		function zenvy_post_footer()
		{

			?>
				<footer class="entry-footer">

					<?php
					/**
					 * Functions hooked in to zenvy_post_content_top action.
					 */
					do_action('zenvy_post_footer_top');
					?>
					<?php
					$elements = get_theme_mod(
						'zenvy_single_post_content_entry_footer_elements',
						['post-comments', 'post-navigation']
					);

					if (! empty($elements)) :
						foreach ($elements as $element) :
							switch ($element):
								case 'post-comments':
									Zenvy_Helper::post_comment();
									break;

								case 'post-navigation':
									Zenvy_Helper::post_navigation();
									break;

								case 'tags':
									echo '<div class="post-meta-wrapper content-post-tags">';
									zenvy_posted_tags();
									echo '</div><!-- .content-post-tags -->';

									break;

								case 'author-box':
									Zenvy_Helper::author_box();
									break;

								case 'related-posts':
									Zenvy_Helper::related_posts();
									break;
							endswitch;
						endforeach;
					endif;

					?>
					<?php zenvy_entry_footer(); ?>

					<?php
					/**
					 * Functions hooked in to zenvy_post_content_bottom action.
					 */
					do_action('zenvy_post_footer_bottom');
					?>

				</footer><!-- .entry-footer -->

			<?php
		}

	endif;


	/* ------------------------------ PAGE CONTENT ------------------------------ */

	if (! function_exists('zenvy_page_post_header')) :

		/**
		 * Post Header
		 */
		function zenvy_page_post_header()
		{
			?>
				<header class="entry-header">

					<?php
					/**
					 * Functions hooked in to zenvy_page_header_top action.
					 */
					do_action('zenvy_page_header_top');
					?>

					<?php
					$elements = get_theme_mod(
						'zenvy_single_page_content_entry_header_elements',
						''
					);

					if (! empty($elements)) :
						$html_tag = get_theme_mod(
							'zenvy_single_page_title_tag',
							['desktop' => 'h1']
						);
						the_title('<' . esc_attr($html_tag['desktop']) . ' class="entry-title">', '</' . esc_attr($html_tag['desktop']) . '>');
					endif;

					?>

					<?php
					/**
					 * Functions hooked in to zenvy_page_header_bottom action.
					 */
					do_action('zenvy_page_header_bottom');
					?>

				</header><!-- .entry-header -->

			<?php
		}

	endif;

	if (! function_exists('zenvy_page_content')) :

		/**
		 * Post Content
		 */
		function zenvy_page_content()
		{
			?>
				<div class="entry-content">

					<?php
					/**
					 * Functions hooked in to zenvy_page_content_top action.
					 */
					do_action('zenvy_page_content_top');
					?>

					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'zenvy'),
								[
									'span' => [
										'class' => [],
									],
								]
							),
							wp_kses_post(get_the_title())
						)
					);
					?>

					<?php

					wp_link_pages(
						[
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'zenvy'),
							'after'  => '</div>',
						]
					);
					?>

					<?php
					/**
					 * Functions hooked in to zenvy_page_content_bottom action.
					 */
					do_action('zenvy_page_content_bottom');
					?>

				</div><!-- .entry-content -->

			<?php
		}

	endif;

	if (! function_exists('zenvy_page_footer')) :

		/**
		 * Post Footer for extra elements
		 */
		function zenvy_page_footer()
		{

			?>
				<footer class="entry-footer">

					<?php
					/**
					 * Functions hooked in to zenvy_page_footer_top action.
					 */
					do_action('zenvy_page_footer_top');
					?>
					<?php
					$elements = get_theme_mod(
						'zenvy_single_page_content_entry_footer_elements',
						['post-comments']
					);

					if (! empty($elements)) :
						Zenvy_Helper::post_comment();
					endif;
					?>
					<?php zenvy_entry_footer(); ?>

					<?php
					/**
					 * Functions hooked in to zenvy_page_footer_bottom action.
					 */
					do_action('zenvy_page_footer_bottom');
					?>

				</footer><!-- .entry-footer -->

				<?php
			}

		endif;

		/* ------------------------------ 404 PAGE ------------------------------ */

		/* ------------------------------ FOOTER ------------------------------ */

		if (! function_exists('zenvy_footer_back_to_top')) :

			/**
			 * Footer Back to Top
			 */
			function zenvy_footer_back_to_top()
			{
				$back_to_top = get_theme_mod(
					'zenvy_footer_back_to_top_enable',
					['desktop' => 'true']
				);
				if ($back_to_top && array_key_exists('desktop', $back_to_top)) :
				?>
					<div class="back-to-top">
						<a href="#masthead" title="<?php esc_attr_e('Go to Top', 'zenvy'); ?>"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
					</div><!-- .back-to-top -->
		<?php
				endif;
			}

		endif;

		/* ------------------------------ CONTENT ------------------------------ */
		if ( ! function_exists( 'zenvy_menu_fallback' ) ) :

			/**
			 * Menu fallback for primary menu.
			 *
			 * Contains wp_list_pages to display pages created,
			 *
			 * @param array $args Array of wp_nav_menu arguments.
			 */
			function zenvy_menu_fallback( $args = array() ) {
				// Get the container class from args or use default
				$container_class = ! empty( $args['container_class'] ) ? $args['container_class'] : 'menu-top-menu-container';
				
				// Get the menu class from args or use default
				$menu_class = ! empty( $args['menu_class'] ) ? $args['menu_class'] : 'menu-wrapper';
				
				// Get the menu ID from items_wrap or use default
				$menu_id = 'primary-menu-list';
				if ( ! empty( $args['items_wrap'] ) && preg_match( '/id="([^"]+)"/', $args['items_wrap'], $matches ) ) {
					$menu_id = $matches[1];
				}
				
				$output  = '';
				$output .= '<div class="' . esc_attr( $container_class ) . '">';
				$output .= '<ul id="' . esc_attr( $menu_id ) . '" class="' . esc_attr( $menu_class ) . '">';
				
				$output .= wp_list_pages(
					array(
						'echo'     => false,
						'title_li' => false,
					)
				);
				
				$output .= '</ul>';
				$output .= '</div>';
				
				// @codingStandardsIgnoreStart
				echo $output;
				// @codingStandardsIgnoreEnd
			}
		
		endif;
