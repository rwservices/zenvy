<?php

class Zenvy_Sidebar_Posts_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_sidebar_posts_widget',
            __('Zenvy Sidebar Posts', 'zenvy'),
            array('description' => __('Displays a list of dynamic posts in the sidebar.', 'zenvy'))
        );
            // Register widget only once
        add_action('widgets_init', array($this, 'register_widget'));
    }

    /**
     * Register widget
     */
    public function register_widget()
    {
        register_widget('Zenvy_Sidebar_Posts_Widget');
    }

    public function widget($args, $instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : __('Don\'t Miss it', 'zenvy');
        $number_of_posts = !empty($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 5;
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $orderby = !empty($instance['orderby']) ? $instance['orderby'] : 'date';

        $fallback = get_theme_mod('zenvy_featured_post_fallback_image', get_template_directory_uri() . '/assets/img/default-post.jpg');

        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => $number_of_posts,
            'order' => $order,
            'orderby' => $orderby,
        );
        $posts_query = new WP_Query($query_args);
        echo $args['before_widget'];
        ?>
        <aside class="widget widget_recent-post">
            <?php if ($title): ?>
                <h3 class="widget-title"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <div class="recent-post-wrap">
                <?php
                if ($posts_query->have_posts()):
                    while ($posts_query->have_posts()):
                        $posts_query->the_post();
                        ?>
                        <article class="post">
                            <div class="featured-image-wrapper">
                                <figure class="featured-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($fallback); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                    </a>
                                </figure>
                            </div>
                            <div class="post-content">
                                <?php zenvy_entry_meta(); ?>
                                <header class="entry-header">
                                    <h3 class="entry-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </header>
                            </div>
                        </article>
                        <?php
                    endwhile;
                else:
                    echo '<p>' . __('No posts found.', 'zenvy') . '</p>';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </aside>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'zenvy');
        $number_of_posts = !empty($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 5;
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $orderby = !empty($instance['orderby']) ? $instance['orderby'] : 'date';
        ?>

        <p>
            <label><?php esc_html_e('Title', 'zenvy'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label><?php esc_html_e('Number of Posts', 'zenvy'); ?></label>
            <input class="tiny-text" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="number"
                step="1" min="1" value="<?php echo esc_attr($number_of_posts); ?>">
        </p>

        <p>
            <label><?php esc_html_e('Order', 'zenvy'); ?></label>
            <select name="<?php echo $this->get_field_name('order'); ?>">
                <option value="DESC" <?php selected($order, 'DESC'); ?>><?php esc_html_e('Descending', 'zenvy'); ?></option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>><?php esc_html_e('Ascending', 'zenvy'); ?></option>
            </select>
        </p>

        <p>
            <label><?php esc_html_e('Order By', 'zenvy'); ?></label>
            <select name="<?php echo $this->get_field_name('orderby'); ?>">
                <option value="date" <?php selected($orderby, 'date'); ?>><?php esc_html_e('Date', 'zenvy'); ?></option>
                <option value="title" <?php selected($orderby, 'title'); ?>><?php esc_html_e('Title', 'zenvy'); ?></option>
                <option value="comment_count" <?php selected($orderby, 'comment_count'); ?>><?php esc_html_e('Comment Count', 'zenvy'); ?></option>
            </select>
        </p>

        <?php

    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number_of_posts'] = absint($new_instance['number_of_posts']);
        $instance['order'] = in_array($new_instance['order'], ['ASC', 'DESC']) ? $new_instance['order'] : 'DESC';
        $instance['orderby'] = in_array($new_instance['orderby'], ['date', 'title', 'comment_count']) ? $new_instance['orderby'] : 'date';

        return $instance;
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Sidebar_Posts_Widget');
});