<?php

/**
 * Zenvy Helper functions
 *
 * @package Zenvy
 */

class Zenvy_Helper
{
    /**
     * Store the post ids.
     *
     * Since blog page takes the first post as its id,
     * here we are storing the id of the post and for the blog page,
     * storing its value via getting the specific page id through:
     * `get_option( 'page_for_posts' )`
     *
     * @return false|int|mixed|string|void
     */
    public static function get_post_id()
    {

        $post_id = '';
        $page_for_posts = get_option('page_for_posts');

        // For single post and pages.
        if (is_singular()) {
            $post_id = get_the_ID();
        } elseif (!is_front_page() && is_home() && $page_for_posts) { // For the static blog page.
            $post_id = $page_for_posts;
        } elseif (self::is_woocommerce() && is_shop()) { // Shop Page
            $post_id = wc_get_page_id('shop');
        }

        // Return the post ID.
        return $post_id;
    }

    /**
     * Get an array of terms from a taxonomy.
     *
     * @static
     * @access public
     * @param string|array $taxonomies See https://developer.wordpress.org/reference/functions/get_terms/ for details.
     * @param bool $choice
     * @return array
     */
    public static function get_terms($taxonomies, $choice = true)
    {
        $items = [];

        // Get the post types.
        $terms = get_terms(
            array(
                'taxonomy' => $taxonomies,
                'hide_empty' => true,
            )
        );

        // Build the array.
        if ($terms) {
            if ($choice == true) {
                $items[0] = esc_html__('--- choose ---', 'zenvy');
            }
            foreach ($terms as $term) {
                $items[$term->slug] = esc_html($term->name);
            }
        } else {
            $items[0] = esc_html__('Item Not Found...', 'zenvy');
        }

        return $items;
    }

    /**
     * Get an array of posts.
     *
     * @static
     * @access public
     * @param array $args Define arguments for the get_posts function.
     * @return array
     */
    public static function get_posts($args)
    {
        if (is_string($args)) {
            $args = add_query_arg(
                array(
                    'suppress_filters' => false,
                )
            );
        } elseif (is_array($args) && !isset($args['suppress_filters'])) {
            $args['suppress_filters'] = false;
        }

        // Get the posts.
        // TODO: WordPress.VIP.RestrictedFunctions.get_posts_get_posts.
        $posts = get_posts($args);

        // format the array.
        $items = array();
        foreach ($posts as $post) {
            $items[$post->ID] = $post->post_title;
        }
        wp_reset_postdata();

        return $items;
    }

    /**
     * Get data columns with values.
     *
     * @access public
     * @param array $values
     * @return void
     */
    public static function get_data_columns($values = [])
    {

        ob_start();

        if (!empty($values)) {

            // Base or Mobile
            echo isset($values['mobile'])
                ? ' data-columns="' . esc_attr($values['mobile']) . '"'
                : (isset($values['tablet'])
                    ? ' data-columns="' . esc_attr($values['tablet']) . '"'
                    : (isset($values['desktop'])
                        ? ' data-columns="' . esc_attr($values['desktop']) . '"'
                        : ''
                    )
                );
            // Tablet
            echo isset($values['tablet']) && isset($values['mobile'])
                ? ' data-columns-md="' . esc_attr($values['tablet']) . '"'
                : (isset($values['desktop']) && isset($values['tablet'])
                    ? ' data-columns-md="' . esc_attr($values['desktop']) . '"'
                    : ''
                );
            // Desktop
            echo isset($values['desktop']) && isset($values['tablet']) && isset($values['mobile'])
                ? ' data-columns-lg="' . esc_attr($values['desktop']) . '"'
                : '';
        }

        $output = ob_get_clean();

        echo apply_filters('zenvy_get_data_columns', $output); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    /**
     * Page Header
     *
     * @access public
     * @return void
     */
    public static function page_header()
    {

        $html_tag = get_theme_mod(
            'zenvy_blog_post_title_tag',
            ['desktop' => 'h1']
        );
        if (is_page()) {
            $html_tag = get_theme_mod(
                'zenvy_single_page_title_tag',
                ['desktop' => 'h1']
            );
            the_title('<' . esc_attr($html_tag['desktop']) . ' class="page-title">', '</' . esc_attr($html_tag['desktop']) . '>');
        } elseif (is_404()) {
            echo '<' . esc_attr($html_tag['desktop']) . ' class="page-title">' . esc_html__('404 Page', 'zenvy') . '</' . esc_attr($html_tag['desktop']) . '>';
        } elseif (is_single()) {
            $html_tag = get_theme_mod(
                'zenvy_single_post_title_tag',
                ['desktop' => 'h1']
            );
            the_title('<' . esc_attr($html_tag['desktop']) . ' class="page-title">', '</' . esc_attr($html_tag['desktop']) . '>');
        } elseif (is_home()) {

            echo '<' . esc_attr($html_tag['desktop']) . ' class="page-title">' . esc_html__('Blog', 'zenvy') . '</' . esc_attr($html_tag['desktop']) . '>';
        } elseif (is_search()) {

            printf('<' . esc_attr($html_tag['desktop']) . ' class="page-title">%s</' . esc_attr($html_tag['desktop']) . '>', get_search_query());
        } else {
            // Get archive title without prefix
            add_filter('get_the_archive_title_prefix', '__return_false');
            the_archive_title('<' . esc_attr($html_tag['desktop']) . ' class="page-title">', '</' . esc_attr($html_tag['desktop']) . '>');
            remove_filter('get_the_archive_title_prefix', '__return_false');
        }
    }

    /**
     * Social Network Lists
     *
     * @access public
     * @return array
     */
    public static function social_network_list()
    {
        return [
            'facebook' => esc_html__('Facebook', 'zenvy'),
            'twitter' => esc_html__('Twitter', 'zenvy'),
            'linkedin' => esc_html__('LinkedIn', 'zenvy'),
            'pinterest' => esc_html__('Pinterest', 'zenvy'),
            'instagram' => esc_html__('Instagram', 'zenvy'),
            'youtube' => esc_html__('YouTube', 'zenvy'),
        ];
    }
    /**
     * Retrieves the post meta.
     *
     * @param int    $post_id The ID of the post.
     * @param null|array $meta_list custom post meta list
     * @return void
     */
    public static function post_meta($post_id = null, $meta_list = null)
    {

        // Require post ID.
        if (!$post_id) {
            return;
        }

        /**
         * Filters post types array.
         *
         * @param array Array of post types
         */
        $disallowed_post_types = apply_filters('zenvy_disallowed_post_meta', array('page'));

        // Check whether the post type is allowed to output post meta.
        if (in_array(get_post_type($post_id), $disallowed_post_types, true)) {
            return;
        }

        $post_meta = $meta_list ? $meta_list : get_theme_mod(
            'zenvy_single_post_meta_elements',
            ['date', 'categories']
        );

        // If the post meta setting has the value 'empty', it's explicitly empty and the default post meta shouldn't be output.
        if ($post_meta && !in_array('empty', $post_meta, true)) {

            // Make sure we don't output an empty container.
            $has_meta = false;

            global $post;
            $the_post = get_post($post_id);
            setup_postdata($the_post);
            ob_start();
?>
            <ul class="post-meta d-flex flex-wrap">

                <?php
                /**
                 * Fires before post meta HTML display.
                 *
                 * Allow output of additional post meta info to be added by child themes and plugins.
                 *
                 * @param int    $post_id   Post ID.
                 * @param array  $post_meta An array of post meta information.
                 */
                do_action('zenvy_before_post_meta_list', $post_id, $post_meta);
                ?>

                <?php foreach ($post_meta as $meta): ?>

                    <?php if (post_type_supports(get_post_type($post_id), 'author') && in_array('author', $post_meta, true) && $meta == 'author'): $has_meta = true; // author 
                    ?>
                        <li class="post-author meta-wrapper d-flex">
                            <?php
                            $author_url = esc_url(get_author_posts_url(get_the_author_meta('ID')));
                            $author_avatar = get_avatar(get_the_author_meta('user_email'), apply_filters('zenvy_meta_avatar_size', 25));
                            ?>
                            <span class="meta-icon">
                                <span class="screen-reader-text"><?php esc_html_e('Post author', 'zenvy'); ?></span>
                                <figure class="author-avatar">
                                    <a href="<?php echo esc_url($author_url); ?>"
                                        rel="<?php esc_attr_e('Author', 'zenvy'); ?>"><?php echo wp_kses_post($author_avatar); ?></a>
                                </figure><!-- .author-avatar -->
                            </span>
                            <span class="meta-text">
                                <a
                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author_meta('display_name')); ?></a>
                            </span>
                        </li>

                    <?php elseif (in_array('post-date', $post_meta, true) && $meta == 'post-date'): $has_meta = true;
                        $date_format = get_option('date_format');
                        $published_date = esc_html(get_the_date($date_format)); // post date 
                    ?>
                        <li class="post-date meta-wrapper d-flex">
                            <span class="meta-text">
                                <a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a>
                            </span>
                        </li>

                    <?php elseif (in_array('categories', $post_meta, true) && $meta == 'categories' && has_category()): $has_meta = true; // Categories 
                    ?>
                        <li class="post-categories meta-wrapper d-flex">
                            <span class="meta-text">
                                <?php the_category(', '); ?>
                            </span>
                        </li>
                    <?php
                    elseif (in_array('tags', $post_meta, true) && $meta == 'tags' && has_tag()): $has_meta = true; ?>
                        <li class="post-tags meta-wrapper d-flex">
                            <span class="meta-text">
                                <?php the_tags('', ', ', ''); ?>
                            </span>
                        </li>

                    <?php elseif (in_array('comments', $post_meta, true) && !post_password_required() && (comments_open() || get_comments_number()) && $meta == 'comments'):
                        $has_meta = true; // Comments 
                    ?>
                        <li class="post-comment-link meta-wrapper d-flex">
                            <span class="meta-text">
                                <?php comments_popup_link(); ?>
                            </span>
                        </li>

                    <?php endif; ?>

                <?php endforeach; ?>

            </ul><!-- .post-meta -->
        <?php

        }
    }

    /**
     * Returns sidebar layout value
     *
     * @param string $sidebar default sidebar value is none
     * @return string $sidebar
     */
    public static function get_sidebar_layout($sidebar = 'none')
    {

        // Check meta first to override and return (prevents filters from overriding meta)
        $sidebar = get_post_meta(self::get_post_id(), 'zenvy_sidebar_layout', true);
        if ($sidebar && $sidebar != 'default') {
            return $sidebar;
        }
        if (is_single()) {
            $sidebar = get_theme_mod('zenvy_single_post_sidebar_layout', 'right');
        } elseif (is_page()) {
            $sidebar = get_theme_mod('zenvy_single_page_sidebar_layout', 'right');
        } else {
            $sidebar = get_theme_mod('zenvy_blog_sidebar_layout', 'right');
        }
        return $sidebar;
    }

    /**
     * Post Comment template
     *
     * @return void
     */
    public static function post_comment()
    {
        // If comments are open or we have at least one comment, load up the comment template.
        if (!post_password_required() && (comments_open() || get_comments_number())):
            comments_template();
        endif;
    }

    /**
     * Post Navigation
     *
     * @return void
     */
    public static function post_navigation()
    {

        // Only display for single post navigation
        if (!is_single()) {
            return;
        }

        $next_post = get_next_post();
        $prev_post = get_previous_post();

        if ($next_post || $prev_post) {

            $pagination_classes = '';

            if (!$next_post) {
                $pagination_classes = ' only-one only-prev';
            } elseif (!$prev_post) {
                $pagination_classes = ' only-one only-next';
            }

        ?>

            <nav class="navigation post-navigation section-inner<?php echo esc_attr($pagination_classes); ?>"
                aria-label="<?php esc_attr_e('Post', 'zenvy'); ?>" role="navigation">

                <h2 class="screen-reader-text"><?php esc_html_e('Post navigation', 'zenvy'); ?></h2>

                <div class="nav-links">

                    <?php
                    if ($prev_post) {
                    ?>
                        <div class="nav-previous text-left">
                            <span class="screen-reader-text"><?php esc_html_e('Previous Post', 'zenvy'); ?></span>
                            <a class="previous-post" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                <div class="nav-content-wrap">
                                    <span class="nav-title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
                                </div><!-- .nav-content-wrap -->
                            </a>
                        </div><!-- .nav-previous -->
                    <?php
                    }

                    if ($next_post) {
                    ?>
                        <div class="nav-next text-right">
                            <span class="screen-reader-text"><?php esc_html_e('Next Post', 'zenvy'); ?></span>
                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="prev">
                                <div class="nav-content-wrap">
                                    <span class="nav-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                                </div><!-- .nav-content-wrap -->
                            </a>
                        </div><!-- .nav-next -->
                    <?php
                    }
                    ?>

                </div><!-- .pagination-single-inner -->
            </nav><!-- .pagination-single -->

        <?php
        }
    }

    /**
     * Post Pagination
     *
     * @return void
     */
    public static function post_pagination()
    {

        global $wp_query;

        // Don't print empty markup if there is only one page.
        if ($wp_query->max_num_pages < 2) {
            return;
        }

        $pagination_type = get_theme_mod(
            'zenvy_blog_pagination_type',
            'nxt-prv'
        );

        if ($pagination_type):

            ob_start();

            echo '<div class="pagination-wrap pagination-' . esc_attr($pagination_type) . '">';

            switch ($pagination_type):

                case 'nxt-prv':

                    the_posts_navigation();

                    break;

                case 'numeric':

                    the_posts_pagination();

                    break;

            endswitch;

            echo '</div><!-- .pagination-wrap -->';

            $output = ob_get_clean();

            echo apply_filters('zenvy_pagination_markup', $output); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

        endif;
    }

    /**
     * Author Box
     *
     * @return void
     */
    public static function author_box()
    {

        // Only display for standard posts
        if ('post' != get_post_type()) {
            return;
        }

        // Get author data
        $author = get_the_author();
        $author_description = get_the_author_meta('description');
        $author_url = esc_url(get_author_posts_url(get_the_author_meta('ID')));
        $author_avatar = get_avatar(get_the_author_meta('user_email'), apply_filters('zenvy_avatar_size', 150));
        $author_contents = ['name', 'info'];
        ?>

        <div class="contact-agent-section">
            <div class="contact-agent-info-wrap">
                <div class="contact-agent-info">

                    <figure class="author-image" data-ratio="auto">
                        <a href="<?php echo esc_url($author_url); ?>"
                            rel="<?php esc_attr_e('Author', 'zenvy'); ?>"><?php echo wp_kses_post($author_avatar); ?></a>
                    </figure><!-- .author-avatar -->

                    <?php if ($author_contents): ?>
                        <div class="contact-agent-info-content">

                            <?php foreach ($author_contents as $content):

                                switch ($content):
                                    case 'name':
                            ?>
                                        <h3 class="author-name"><a href="<?php echo esc_url($author_url); ?>" class="author-name"
                                                rel="<?php esc_attr_e('Author', 'zenvy'); ?>"><?php echo esc_html($author); ?></a></h3>
                                    <?php
                                        break;

                                    case 'info':
                                    ?>
                                        <div class="author-desc">
                                            <?php echo wp_kses_post(wpautop($author_description)); ?>
                                        </div>
                            <?php
                                        break;
                                endswitch;
                            endforeach; ?>
                        </div><!-- .contact-agent-info-content -->
                    <?php endif; ?>
                </div><!-- .contact-agent-info -->
            </div><!-- .contact-agent-info-wrap -->
        </div><!-- .contact-agent-section -->
        <?php
    }

    /**
     * Related Posts
     *
     * @return void
     */
    public static function related_posts()
    {
        // Only display for standard posts
        if ('post' != get_post_type()) {
            return;
        }

        global $post;
        $current_post = $post;
        $args = [];

        // Categories arguments
        $cats = wp_get_post_categories($post->ID, ['fields' => 'ids']);
        if (!empty($cats)) {
            $args['posts_per_page'] = 4;
            $args['post__not_in'] = [$current_post->ID];
            $args['category__in'] = $cats;
            $args['no_found_rows'] = true;
            $args['ignore_sticky_posts'] = true;
        }

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()):

            // Columns per row
            $col_per_row = [
                'desktop' => '2',
                'tablet' => '2',
                'mobile' => '1'
            ];
        ?>

            <div class="related-post-section">
                <header class="entry-header heading">
                    <h2 class="entry-title"><?php esc_html_e('Related Posts', 'zenvy'); ?></h2>
                </header>
                <div class="row columns" <?php Zenvy_Helper::get_data_columns($col_per_row); ?>>

                    <?php while ($the_query->have_posts()):
                        $the_query->the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                    ?>
                        <div class="column">
                            <div class="post">
                                <?php zenvy_post_thumbnail('medium', '4x3'); ?>

                                <div class="post-content">

                                    <div class="entry-meta">
                                        <?php zenvy_posted_cats(); ?>
                                        <?php zenvy_posted_by(); ?>
                                    </div><!-- .entry-meta -->

                                    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                                    <div class="entry-content">
                                        <?php self::post_excerpt(); ?>
                                    </div><!-- .entry-content -->

                                    <?php zenvy_posted_on(); ?>

                                </div><!-- .post-content -->
                            </div>
                        </div>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                </div>
            </div><!-- .related-post-wrapper -->
        <?php
        endif;
    }

    /**
     * Post Title
     *
     * @return void
     */
    public static function post_title()
    { ?>
        <header class="entry-header">

            <?php
            if (is_singular()):

                $html_tag = is_single() ? get_theme_mod('zenvy_single_post_title_tag', ['desktop' => 'h1']) : get_theme_mod('zenvy_single_page_title_tag', ['desktop' => 'h1']);

                the_title('<' . esc_attr($html_tag['desktop']) . ' class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></' . esc_attr($html_tag['desktop']) . '>');

            else:
                $html_tag = get_theme_mod(
                    'zenvy_blog_post_title_tag',
                    ['desktop' => 'h1']
                );
                the_title('<' . esc_attr($html_tag['desktop']) . ' class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></' . esc_attr($html_tag['desktop']) . '>');
            endif;
            ?>

        </header><!-- .entry-header -->
    <?php

    }

    /**
     * Post Content
     *
     * @return void
     */
    public static function post_content()
    { ?>
        <div class="entry-content">

            <?php
            if (is_singular() && !Zenvy_Helper::front_page_enable()):

                the_content();
            else:
                self::post_excerpt();
            endif;
            ?>

        </div><!-- .entry-content -->
    <?php

    }

    /**
     * Post Read More Button
     *
     * @param string $setting_section The setting section for the read more button.
     * @return void
     */
    public static function read_more($setting_section = 'blog_post')
    {

        $btn_type = get_theme_mod(
            'zenvy_' . $setting_section . '_read_btn_type',
            ['desktop' => 'button']
        );
        $enable_arrow = get_theme_mod(
            'zenvy_' . $setting_section . '_read_more_btn_arrow',
            ''
        );

        $read_more_class = ['read-more'];

        if ($btn_type && $btn_type['desktop'] == 'button') {
            $read_more_class[] = 'box-button';
        }

        if ($btn_type && $btn_type['desktop'] == 'text') {
            $read_more_class[] = 'read-more-btn';
        }

        ob_start(); ?>

        <div class="d-flex justify-content-left read-more-wrap">
            <a href="<?php the_permalink(get_the_ID()); ?>" class="<?php echo esc_attr(implode(' ', $read_more_class)); ?>">
                <?php
                if ($enable_arrow && array_key_exists('desktop', $enable_arrow)) {
                    echo '<span class="read-more-btn-image"></span>';
                }
                ?>
                <?php esc_html_e('Read More', 'zenvy'); ?>
            </a>
        </div>

<?php
        $output = ob_get_clean();
        echo apply_filters('zenvy_read_more', $output); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    /**
     * Post Excerpt
     *
     * @return void
     */
    public static function post_excerpt()
    {

        $excerpt = wp_trim_words(get_the_excerpt(get_the_ID()), '20', '...');
        echo wp_kses_post(wpautop($excerpt));
    }
    /**
     * Function to return the boolean value if 'static front page' is enabled or not.
     *
     *
     * @return boolean
     */
    public static function front_page_enable()
    {

        $is_static_page = get_theme_mod('zenvy_front_page_enable', 'disable');
        $show_front_page = get_option('show_on_front');
        if (is_front_page() && $show_front_page == 'page' && $is_static_page == 'enable') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Add the classes into site content.
     *
     * @param string|array $class One or more classes to add to the class list.
     * @return void
     */
    public static function site_content_class($class = '')
    {

        $classes = ['site-content'];

        if (
            is_active_sidebar('sidebar-1')
            && Zenvy_Helper::get_sidebar_layout() != 'none'
            && !Zenvy_Helper::front_page_enable()
        ) {
            $classes[] = 'have-sidebar';
        }

        if (!empty($class)) {
            if (!is_array($class)) {
                $class = preg_split('#\s+#', $class);
            }
            $classes = array_merge($classes, $class);
        } else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = array_map('sanitize_html_class', $classes);

        /**
         * Filter site content class names
         */
        $classes = apply_filters('zenvy_site_content_class', $classes, $class);

        $classes = array_unique($classes);

        echo 'class="' . esc_attr(join(' ', $classes)) . '"'; // WPCS: XSS ok.
    }

    /**
     * Add the classes into sidebar widget area
     *
     * @param string|array $class One or more classes to add to the class list.
     * @return void
     */
    public static function sidebar_class($class = '')
    {

        $classes = ['widget-area'];

        if (is_active_sidebar('sidebar-1') && Zenvy_Helper::get_sidebar_layout()) {

            $classes[] = '' . self::get_sidebar_layout() . '-sidebar';
        }

        if (!empty($class)) {
            if (!is_array($class)) {
                $class = preg_split('#\s+#', $class);
            }
            $classes = array_merge($classes, $class);
        } else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = array_map('sanitize_html_class', $classes);

        /**
         * Filter sidebar class names
         */
        $classes = apply_filters('zenvy_sidebar_class', $classes, $class);

        $classes = array_unique($classes);

        echo 'class="' . esc_attr(join(' ', $classes)) . '"'; // WPCS: XSS ok.
    }


    /**
     * Add the classes into page site
     *
     * @param string|array $class One or more classes to add to the class list.
     * @return void
     */
    public static function site_class($class = '')
    {

        $classes = ['site'];

        if (!empty($class)) {
            if (!is_array($class)) {
                $class = preg_split('#\s+#', $class);
            }
            $classes = array_merge($classes, $class);
        } else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = array_map('sanitize_html_class', $classes);

        /**
         * Filter site class names
         */
        $classes = apply_filters('zenvy_site_class', $classes, $class);

        $classes = array_unique($classes);

        echo 'class="' . esc_attr(join(' ', $classes)) . '"'; // WPCS: XSS ok.
    }

    /**
     * Add the classes into primary div
     *
     * @param string|array $class One or more classes to add to the class list.
     * @return void
     */
    public static function primary_class($class = '')
    {

        $classes = ['content-area'];

        if (!empty($class)) {
            if (!is_array($class)) {
                $class = preg_split('#\s+#', $class);
            }
            $classes = array_merge($classes, $class);
        } else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        if (is_singular()) {

            $elements = is_single() ? get_theme_mod('zenvy_single_post_header_elements') : get_theme_mod('zenvy_single_page_header_elements', ['post-title']);

            if (!$elements || empty($elements)) {
                $classes[] = 'no-has-page-header';
            }
        }

        $classes = array_map('sanitize_html_class', $classes);

        /**
         * Filter primary class names
         */
        $classes = apply_filters('zenvy_primary_class', $classes, $class);

        $classes = array_unique($classes);

        echo 'class="' . esc_attr(join(' ', $classes)) . '"'; // WPCS: XSS ok.
    }

    /**
     * Post Layout classes for archives page
     * 
     * @return string Class names for post layout
     */
    public static function get_post_layout_class()
    {
        if (is_archive() || is_search() || is_home()) {
            $post_layout = get_theme_mod('zenvy_blog_posts_layout', 'alt');
            switch ($post_layout) {
                case 'alt':
                    return 'alternative-post';
                case 'right':
                    return 'right-post';
                case 'left':
                    return 'left-post';
                case 'grid':
                    return 'overlap-post post-item-has-2column';
                case 'list':
                    return 'overlap-post';
                default:
                    return 'alternative-post';
            }
        }
        return '';
    }

    /**
     * Get video thumbnail URL from YouTube or Vimeo URL
     * 
     * @param string $url The video URL
     * @param string $quality Quality: 'maxres', 'hq', 'medium', 'sd' (YouTube only)
     * @return string|false Thumbnail URL or false if not found
     */
    public static function get_video_thumbnail_url($url, $quality = 'maxres')
    {
        // YouTube pattern — handles watch, youtu.be, shorts, embed, live
        $youtube_pattern = '/(?:youtube\.com\/(?:watch\?v=|shorts\/|embed\/|live\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($youtube_pattern, $url, $youtube_matches);
        if (!empty($youtube_matches[1])) {
            $video_id = $youtube_matches[1];
            $qualities = [
                'maxres' => 'maxresdefault.jpg',
                'hq'     => 'hqdefault.jpg',
                'medium' => 'mqdefault.jpg',
                'sd'     => 'sddefault.jpg'
            ];
            $thumb = isset($qualities[$quality]) ? $qualities[$quality] : 'hqdefault.jpg';

            if ($quality === 'maxres') {
                $maxres_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
                $response   = wp_remote_head($maxres_url);
                if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
                    return "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg";
                }
                return $maxres_url;
            }

            return "https://img.youtube.com/vi/{$video_id}/{$thumb}";
        }

        // Vimeo pattern
        $vimeo_pattern = '/vimeo\.com\/(?:video\/)?(\d+)/';
        preg_match($vimeo_pattern, $url, $vimeo_matches);
        if (!empty($vimeo_matches[1])) {
            $video_id = $vimeo_matches[1];
            $response = wp_remote_get("https://vimeo.com/api/v2/video/{$video_id}.json");
            if (!is_wp_error($response) && $response['response']['code'] === 200) {
                $data = json_decode(wp_remote_retrieve_body($response), true);
                if (!empty($data[0]['thumbnail_large'])) {
                    return $data[0]['thumbnail_large'];
                }
            }
        }

        return false;
    }

    /**
     * Function to return the boolean value if `WooCommerce` plugin is activated or not.
     *
     * @return boolean
     */
    public static function is_woocommerce()
    {

        if (class_exists('WooCommerce')) {
            return true;
        } else {
            return false;
        }
    }
}
