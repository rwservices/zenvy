<?php

class Zenvy_Sidebar_Categories_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_sidebar_categories_widget',
            __('Zenvy Sidebar Categories', 'zenvy'),
            array('description' => __('Displays a list of categories in the sidebar.', 'zenvy'))
        );
        add_action('widgets_init', array($this, 'register_widget'));
    }

    public function register_widget()
    {
        register_widget('Zenvy_Sidebar_Categories_Widget');
    }

    public function widget($args, $instance)
    {

        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $orderby = !empty($instance['orderby']) ? $instance['orderby'] : 'count';

        echo $args['before_widget'];
        ?>
        <aside class="widget widget_categories">
            <h3 class="widget-title"><?php esc_html_e('Categories List', 'zenvy'); ?></h3>
            <ul>
                <?php
                wp_list_categories(array(
                    'title_li' => '',
                    'show_count' => 1,
                    'hierarchical' => true,
                    'orderby' => $orderby,
                    'order' => $order,
                    'hide_empty' => true,
                    'number' => 10,
                ));
                ?>
            </ul>
        </aside>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $orderby = !empty($instance['orderby']) ? $instance['orderby'] : 'count';
        ?>

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
                <option value="name" <?php selected($orderby, 'name'); ?>><?php esc_html_e('Name', 'zenvy'); ?></option>
                <option value="count" <?php selected($orderby, 'count'); ?>><?php esc_html_e('Count', 'zenvy'); ?></option>
            </select>
        </p>

        <?php

    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['order'] = in_array($new_instance['order'], ['ASC', 'DESC']) ? $new_instance['order'] : 'DESC';
        $instance['orderby'] = in_array($new_instance['orderby'], ['name', 'count']) ? $new_instance['orderby'] : 'count';

        return $instance;
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Sidebar_Categories_Widget');
});