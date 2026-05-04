<?php
/**
 * Advertisement Widget
 *
 */

class Zenvy_Advertisement extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'zenvy_advertisement_widget',
            __('Zenvy Advertisement', 'zenvy'),
            array('description' => __('Displays an advertisement.', 'zenvy'))
        );

        // Register widget only once
        add_action('widgets_init', array($this, 'register_widget'));
    }

    /**
     * Register widget
     */
    public function register_widget()
    {
        register_widget('Zenvy_Advertisement');
    }

    public function widget($args, $instance)
    {

        $image = !empty($instance['image']) ? $instance['image'] : '';

        echo $args['before_widget'];
        ?>

        <aside class="widget widget_media_image">
            <figure class="featured-image">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                <?php endif; ?>
            </figure>
        </aside>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $image = !empty($instance['image']) ? $instance['image'] : '';
        ?>

        <p>
            <label><?php esc_html_e("Advertisement Image", 'zenvy'); ?></label>

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

        $instance['image'] = esc_url_raw($new_instance['image']);

        return $instance;
    }
}

// Initialize the widget
add_action('widgets_init', function() {
    register_widget('Zenvy_Advertisement');
});