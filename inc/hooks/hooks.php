<?php
/**
 * Zenvy hooks
 *
 * @package Zenvy
 */

/* ------------------------------ HEADER ------------------------------ */
/**
 * Meta head.
 *
 * @see zenvy_head_meta()
 */
add_action( 'zenvy_head', 'zenvy_head_meta', 10 );


/**
 * Header Bottom Content
 *
 * @see zenvy_header_featured_slider()
 * @see zenvy_content_before_page_header()
 */
add_action( 'zenvy_header_bottom', 'zenvy_header_featured_slider', 10 );
add_action( 'zenvy_header_bottom', 'zenvy_content_before_page_header', 15 );



/* ------------------------------ BEFORE CONTENT ------------------------------ */
/**
 * Before Content of page
 *
 * @see zenvy_content_before_wrapper_start()
 */
add_action( 'zenvy_content_before', 'zenvy_content_before_wrapper_start', 10 );

/* ------------------------------ AFTER CONTENT ------------------------------ */
/**
 * After Content of page
 *
 * @see zenvy_content_after_wrapper_end()
 */
add_action( 'zenvy_content_after', 'zenvy_content_after_wrapper_end', 10 );

/* ------------------------------ BLOG/ARCHIVE PAGE ------------------------------ */

/**
 * After content loop
 *
 * @see zenvy_posts_navigation()
 */
add_action( 'zenvy_posts_content_loop_after', 'zenvy_posts_navigation', 10 );

/**
 * Entry Header
 *
 * @see zenvy_featured_image_wrapper_start()
 * @see zenvy_get_post_thumbnail()
 * @see zenvy_featured_image_wrapper_end()
 * @see zenvy_blog_post_content()
 */
add_action( 'zenvy_posts_content', 'zenvy_featured_image_wrapper_start', 5 );
add_action( 'zenvy_posts_content', 'zenvy_get_post_thumbnail', 10 );
add_action( 'zenvy_posts_content', 'zenvy_featured_image_wrapper_end', 15 );
add_action( 'zenvy_posts_content', 'zenvy_blog_post_content', 20 );

/* ------------------------------ SEARCH PAGE ------------------------------ */

/**
 * Entry Header
 *
 * @see zenvy_search_posts_header()
 */
add_action( 'zenvy_search_posts_entry_header', 'zenvy_search_posts_header', 10 );

/**
 * Entry Content
 *
 * @see zenvy_search_posts_content()
 */
add_action( 'zenvy_search_posts_entry_content', 'zenvy_search_posts_content', 10 );

/**
 * Entry Footer
 *
 * @see zenvy_search_posts_footer()
 */
add_action( 'zenvy_search_posts_entry_footer', 'zenvy_search_posts_footer', 10 );

/* ------------------------------ SINGLE POST ------------------------------ */

/**
 * Entry Header Content
 *
 * @see zenvy_get_post_thumbnail()
 * @see zenvy_post_header()
 */
add_action( 'zenvy_post_entry_header', 'zenvy_get_post_thumbnail', 10 );
add_action( 'zenvy_post_entry_header', 'zenvy_post_header', 15 );

/**
 * Entry Content
 *
 * @see zenvy_post_content()
 */
add_action( 'zenvy_post_entry_content', 'zenvy_post_content', 10 );

/**
 * Entry Footer
 *
 * @see zenvy_post_footer()
 */
add_action( 'zenvy_post_entry_footer', 'zenvy_post_footer', 10 );


/* ------------------------------ SINGLE PAGE ------------------------------ */

/**
 * Entry Header Content
 *
 * @see zenvy_get_post_thumbnail()
 * @see zenvy_page_post_header()
 */
add_action( 'zenvy_page_entry_header', 'zenvy_get_post_thumbnail', 10 );
add_action( 'zenvy_page_entry_header', 'zenvy_page_post_header', 15 );

/**
 * Entry Content
 *
 * @see zenvy_page_content()
 */
add_action( 'zenvy_page_entry_content', 'zenvy_page_content', 10 );

/**
 * Entry Footer
 *
 * @see zenvy_page_footer()
 */
add_action( 'zenvy_page_entry_footer', 'zenvy_page_footer', 10 );

/* ------------------------------ FOOTER ------------------------------ */
/**
 * Footer back to top
 *
 * @see zenvy_footer_back_to_top()
 */
add_action( 'zenvy_footer_after', 'zenvy_footer_back_to_top', 10 );
