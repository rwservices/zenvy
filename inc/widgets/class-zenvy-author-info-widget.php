<?php

class Zenvy_Author_Info_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_author_info_widget',
            __('Zenvy Author Info', 'zenvy'),
            array('description' => __('Displays authors profile, name and title.', 'zenvy'))
        );
        
         // Register widget only once
        add_action('widgets_init', array($this, 'register_widget'));
    }

    /**
     * Register widget
     */
    public function register_widget()
    {
        register_widget('Zenvy_Author_Info_Widget');
    }

    public function widget($args, $instance)
    {

        $name = !empty($instance['name']) ? $instance['name'] : '';
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $image = !empty($instance['image']) ? $instance['image'] : '';

        echo $args['before_widget'];
        ?>

                            <aside class="widget widget-post-author">
                                <article class="post">
                                    <figure class="featured-image">
            <?php if ($image): ?>
                <img src="<?php echo esc_url($image); ?>" alt="">
            <?php endif; ?>
                                    </figure>
                                    <div class="about-contain">
                                        <div class="author-details">
                                            <div class="title-position-wrap">
                                                <h4 class="entry-title"><?php echo esc_html($name); ?></h4>
                                                <div class="position">
                                                    <span>
                                                        <?php echo esc_html($title); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </aside>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $name = !empty($instance['name']) ? $instance['name'] : '';
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $image = !empty($instance['image']) ? $instance['image'] : '';
        ?>

        <p>
            <label><?php esc_html_e('Name', 'zenvy'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name('name'); ?>" type="text"
                value="<?php echo esc_attr($name); ?>">
        </p>

        <p>
            <label><?php esc_html_e("Author's Title", 'zenvy'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label><?php esc_html_e("Author's Image", 'zenvy'); ?></label>

            <input class="widefat image-url" name="<?php echo $this->get_field_name('image'); ?>" type="text"
                value="<?php echo esc_attr($image); ?>">

            <button class="upload-image button button-secondary">
                <?php esc_html_e("Upload Image", 'zenvy'); ?>
            </button>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['name'] = sanitize_text_field($new_instance['name']);
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['image'] = esc_url_raw($new_instance['image']);

        return $instance;
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Author_Info_Widget');
});