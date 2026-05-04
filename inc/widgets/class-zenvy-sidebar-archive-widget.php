<?php

class Zenvy_Sidebar_Archive_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_sidebar_archive_widget',
            __('Zenvy Sidebar Archive', 'zenvy'),
            array('description' => __('Displays a list of archive links in the sidebar.', 'zenvy'))
        );
        
            // Register widget only once
        add_action('widgets_init', array($this, 'register_widget'));
    }

    /**
     * Register widget
     */
    public function register_widget()
    {
        register_widget('Zenvy_Sidebar_Archive_Widget');
    }

    public function widget($args, $instance)
    {
        $count = !empty($instance['count']) ? (int)$instance['count'] : 5;
        echo $args['before_widget'];
        ?>
        <aside class="widget widget_archive">
            <h3 class="widget-title"><?php esc_html_e('Archives List', 'zenvy'); ?></h3>
            <ul>
                <?php
                wp_get_archives(array(
                    'type' => 'monthly',
                    'show_post_count' => true,
                    'limit' => $count,
                ));
                ?>
            </ul>
        </aside>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $count = !empty($instance['count']) ? (int)$instance['count'] : 5;
        ?>
        <p>
            <label><?php esc_html_e('Number of Archives', 'zenvy'); ?></label>
            <input class="tiny-text" type="number" step="1" min="1" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo esc_attr($count); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['count'] = absint($new_instance['count']);

        return $instance;
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Sidebar_Archive_Widget');
});