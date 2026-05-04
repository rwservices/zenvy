<?php

class Zenvy_Social_Links_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_social_links_widget',
            __('Zenvy Social Links', 'zenvy'),
            array('description' => __('Displays social links of facebook, twitter, instagram and youtube.', 'zenvy'))
        );
        
            // Register widget only once
        add_action('widgets_init', array($this, 'register_widget'));

    }

    /**
     * Register widget
     */
    public function register_widget()
    {
        register_widget('Zenvy_Social_Links_Widget');
    }

    public function widget($args, $instance)
    {

        $facebook = !empty($instance['facebook']) ? $instance['facebook'] : 'https://www.facebook.com/';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : 'https://x.com/';
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : 'https://www.instagram.com/';
        $youtube = !empty($instance['youtube']) ? $instance['youtube'] : 'https://youtube.com/';

        echo $args['before_widget'];
        ?>
        <aside class="widget widget_follow_me">
            <h3 class="widget-title">Follow Me @</h3>
            <div class="social-links inline-social-icons">
                <ul>
                    <?php
                    if($facebook){
                        ?>
                    <li>
                        <a href=<?php echo esc_url($facebook); ?> target="_blank"></a>
                    </li>
                        <?php
                    }
                    if($twitter){
                        ?>
                    <li>
                        <a href=<?php echo esc_url($twitter); ?> target="_blank"></a>
                    </li>
                        <?php
                    }
                    if($instagram){
                        ?>
                    <li>
                        <a href=<?php echo esc_url($instagram); ?> target="_blank"></a>
                    </li>
                        <?php
                    }
                    if($youtube){
                        ?>
                    <li>
                        <a href=<?php echo esc_url($youtube); ?> target="_blank"></a>
                    </li>
                        <?php
                    }
                ?>
                </ul>
            </div>
        </aside>

        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $facebook = !empty($instance['facebook']) ? $instance['facebook'] : 'https://www.facebook.com/';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : 'https://x.com/';
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : 'https://www.instagram.com/';
        $youtube = !empty($instance['youtube']) ? $instance['youtube'] : 'https://youtube.com/';
        ?>

        <p>
            <label><?php esc_html_e('Facebook Link', 'zenvy'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name('facebook'); ?>" type="text"
                value="<?php echo esc_attr($facebook); ?>">
        </p>

        <p>
            <label><?php esc_html_e('Twitter Link', 'zenvy'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name('twitter'); ?>" type="text"
                value="<?php echo esc_attr($twitter); ?>">
        </p>

        <p>
            <label><?php esc_html_e('Instagram Link', 'zenvy'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name('instagram'); ?>" type="text"
                value="<?php echo esc_attr($instagram); ?>">
        </p>

        <p>
            <label><?php esc_html_e('Youtube Link', 'zenvy'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name('youtube'); ?>" type="text"
                value="<?php echo esc_attr($youtube); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['facebook'] = sanitize_text_field($new_instance['facebook']);
        $instance['twitter'] = sanitize_text_field($new_instance['twitter']);
        $instance['instagram'] = sanitize_text_field($new_instance['instagram']);
        $instance['youtube'] = sanitize_text_field($new_instance['youtube']);

        return $instance;
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Social_Links_Widget');
});