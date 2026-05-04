<?php

class Zenvy_Sidebar_Tags_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_sidebar_tags_widget',
            __('Zenvy Sidebar Tags', 'zenvy'),
            array('description' => __('Displays a list of tags in the sidebar.', 'zenvy'))
        );
        
            // Register widget only once
        add_action('widgets_init', array($this, 'register_widget'));
    }

    /**
     * Register widget
     */
    public function register_widget()
    {
        register_widget('Zenvy_Sidebar_Tags_Widget');
    }

    public function widget($args, $instance)
    {
        $number = !empty($instance['number']) ? (int)$instance['number'] : 10;
        $tags = get_tags(array(
            'number' => $number,
        ));
        echo $args['before_widget'];
        ?>
<aside class="widget widget_tag_cloud">
	<h4 class="widget-title"><?php esc_html_e('Tags', 'zenvy'); ?></h4>
	<div class="tagcloud">
		<?php foreach ($tags as $tag): ?>
			<a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
		<?php endforeach; ?>
	</div>
</aside>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $number = !empty($instance['number']) ? (int)$instance['number'] : 10;
        ?>
        <p>
            <label><?php esc_html_e('Number of tags to display', 'zenvy'); ?></label>
            <input class="tiny-text" type="number" step="1" min="1" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $number; ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['number'] = absint($new_instance['number']);

        return $instance;
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Sidebar_Tags_Widget');
});