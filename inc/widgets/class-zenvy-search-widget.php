<?php

class Zenvy_Search_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_search_widget',
            __('Zenvy Search', 'zenvy'),
            array('description' => __('A search form widget to match theme style.', 'zenvy'))
        );
            // Register widget only once
        add_action('widgets_init', array($this, 'register_widget'));
    }

    /**
     * Register widget
     */
    public function register_widget()
    {
        register_widget('Zenvy_Search_Widget');
    }

    public function widget($args, $instance)
    {

        echo $args['before_widget'];
        ?>
        <aside class="widget widget_search">
            <h3 class="widget-title"><?php echo  __('Search for more', 'zenvy'); ?></h3>
            <?php get_search_form(); ?>
        </aside>
        <?php
        echo $args['after_widget'];
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Search_Widget');
});