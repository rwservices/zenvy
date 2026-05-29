<?php
/**
 * Meta Boxes Settings
 *
 * @package Zenvy
 */

/**
 * class for Meta Boxes Settings
 *
 * @access public
 */
class Zenvy_Meta_Boxes {

    /**
     * Post Types
     *
     * @access private
     * @var array
     */
    private static $post_types;
    
    /**
     * Instance
     *
     * @access private
     * @var object
     */
    private static $instance;

    /**
     * Returns the instance.
     *
     * @access public
     * @return object
     */
    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor method.
     *
     * @access private
     * @return void
     */
    private function __construct() {

        // Post types to add the meta-box to
        self::$post_types = array( 'post', 'page' );

        // Loop through post types and add meta-box to corresponding post types
        if ( self::$post_types ) {
            foreach( self::$post_types as $key => $val ) {
                add_action( 'add_meta_boxes_'. $val, array( $this, 'post_meta' ), 11 );
            }
        }

        // Save meta Box
        add_action( 'save_post', array( $this, 'save_meta_data' ) );

        // Load scripts for the meta-box
        add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );

    }

    /**
     * Loads the required media files for the media manager and scripts for media widgets.
     */
    public function load_scripts( $hook ) {

        // Only needed on these admin screens
        if ( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
            return;
        }

        // Get global post
        global $post;

        // Return if post is not object
        if ( ! is_object( $post ) ) {
            return;
        }
       
        // Enqueue Style
        wp_enqueue_style( 'zenvy-meta-box-style', ZENVY_THEME_URI .'assets/build/css/meta-box' . ZENY_RTL_SUFFIX . '.css', false, ZENVY_THEME_VERSION, 'all' );

        // Enqueue Script
        wp_enqueue_script( 'zenvy-meta-box-script', ZENVY_THEME_URI . 'assets/build/js/meta-box.js', array( 'jquery' ), ZENVY_THEME_VERSION, true );

    }

    /**
     * Add Meta-Box
     *
     * @param $post
     */
    public function post_meta( $post ) {

        // Add meta-box
        $obj = get_post_type_object( $post->post_type );
        add_meta_box(
            'post_meta_fields',
            $obj->labels->singular_name . ' '. esc_html__( 'Settings', 'zenvy' ),
            array( $this, 'display_meta_box' ),
            $post->post_type,
            'normal',
            'high'
        );
    }

    /**
     * Display Meta-Box Fields
     *
     * @param $post
     */
    public function display_meta_box( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( basename( __FILE__ ), 'zenvy_meta_nonce' );

        // Get current post data
        $post_id   = $post->ID;
        $post_type = get_post_type();

        // Get tabs
        $tabs = $this->meta_array( $post );

        // Empty notice
        $empty_notice = '<p>'. esc_html__( 'No meta settings available for this post type or user.', 'zenvy' ) .'</p>';

        // Make sure tabs aren't empty
        if ( empty( $tabs ) ) {
            echo $empty_notice; return;
        }

        // Store tabs that should display on this specific page in an array for use later
        $active_tabs = array();
        foreach ( $tabs as $tab ) {
            $tab_post_type = isset( $tab['post_type'] ) ? $tab['post_type'] : '';
            if ( ! $tab_post_type ) {
                $display_tab = true;
            } elseif ( in_array( $post_type, $tab_post_type ) ) {
                $display_tab = true;
            } else {
                $display_tab = false;
            }
            if ( $display_tab ) {
                $active_tabs[] = $tab;
            }
        }

        // No active tabs
        if ( empty( $active_tabs ) ) {
            echo $empty_notice; return;
        } ?>

        <div class="metabox-container">
            <div class="metabox-settings-tabs">
                <ul class="metabox-tab-nav">

                    <?php
                    // Output tab
                    $tab_count = '';
                    foreach ( $active_tabs as $tab ) {
                        $tab_count++;
                        // Define tab title
                        $tab_title = $tab['title'] ? $tab['title'] : esc_html__( 'Other', 'zenvy' ); ?>
                        <li class="tab-link" data-tab="setting-tab-<?php echo esc_js( $tab_count ); ?>"><?php echo esc_html( $tab_title ); ?></li>
                    <?php } ?>

                </ul>

                <div class="meta-box-wrap">
                    <?php
                    // Output tab sections
                    $section_count = '';

                    foreach ( $active_tabs as $tab ) {

                        $section_count++; ?>

                        <div id="setting-tab-<?php echo esc_attr( $section_count ); ?>" class="setting-tab">
                            <?php // Redirect Link Tab
                            // Loop through sections and store meta output
                            foreach ( $tab['settings'] as $setting ) {
                                // Vars
                                $meta_id        = $setting['id'];
                                $title          = isset( $setting['title'] ) ? $setting['title'] : '';
                                $description    = isset( $setting['description'] ) ? $setting['description'] : '';
                                $type           = isset( $setting['type'] ) ? $setting['type'] : 'text';
                                $default        = isset( $setting['default'] ) ? $setting['default'] : '';
                                $meta_value     = get_post_meta( $post_id, $meta_id, true );
                                $meta_value     = $meta_value ? $meta_value : $default; ?>

                                <?php if( 'radio' == $type ) : $options = isset ( $setting['options'] ) ? $setting['options'] : ''; ?>

                                    <section>
                                        <div class="input-holder">
                                            <?php if( $title ) : ?>
                                                <div class="input-label">
                                                    <label for="<?php echo esc_attr( $meta_id ); ?>"><?php echo esc_html( $title ); ?></label>
                                                    <?php if ( $description ) : ?>
                                                        <p class="description"><?php echo esc_html( $description ); ?></p>
                                                    <?php endif; ?>
                                                </div><!-- .input-field -->
                                            <?php endif; ?>

                                            <div class="input-field image-radio-layout">
                                                <fieldset>
                                                    <?php foreach ( $options as $option_value => $option_name ) : ?>
                                                        <input type="radio" name="<?php echo esc_attr( $meta_id ); ?>" id="has-<?php echo esc_attr( $option_value ); ?>" value="<?php echo esc_attr( $option_value ); ?>" <?php echo checked( $meta_value, $option_value, false ); ?>>
                                                        <label for="has-<?php echo esc_attr( $option_value ); ?>" class="has-<?php echo esc_attr( $option_value ); ?>"><?php echo esc_html( $option_name ); ?></label>
                                                    <?php endforeach; ?>
                                                </fieldset>
                                            </div><!-- .input-field -->
                                        </div><!-- .input-holder -->
                                    </section>

                                <?php elseif( 'select' == $type ) : $options = isset ( $setting['options'] ) ? $setting['options'] : ''; ?>

                                    <section>
                                        <div class="input-holder">
                                            <?php if( $title ) : ?>
                                                <div class="input-label">
                                                    <label for="<?php echo esc_attr( $meta_id ); ?>"><?php echo esc_html( $title ); ?></label>
                                                    <?php if ( $description ) : ?>
                                                        <p class="description"><?php echo esc_html( $description ); ?></p>
                                                    <?php endif; ?>
                                                </div><!-- .input-field -->
                                            <?php endif; ?>

                                            <div class="input-field">
                                                <select id="<?php echo esc_attr( $meta_id ); ?>" name="<?php echo esc_attr( $meta_id ); ?>">
                                                    <?php foreach ( $options as $option_value => $option_name ) { ?>
                                                        <option value="<?php echo esc_attr( $option_value ); ?>" <?php selected( $meta_value, $option_value, true ); ?>><?php echo esc_html( $option_name ); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div><!-- .input-field -->
                                        </div><!-- .input-holder -->
                                    </section>

                                <?php endif; ?>

                            <?php } ?>

                        </div>

                    <?php } ?>

                </div>
            </div>

        </div>

    <?php }

    /**
     * Save Meta-Box Values
     *
     * @param $post_id
     */
    public function save_meta_data( $post_id ) {

        // Verify that the nonce is valid.
        if ( ! isset( $_POST['zenvy_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['zenvy_meta_nonce'] ), basename( __FILE__ ) ) ) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check the user's permissions.
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }

        } else {

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        /* OK, it's safe for us to save the data now. Now we can loop through fields */

        // Get array of settings to save
        $tabs = $this->meta_array();
        $settings = array();
        foreach( $tabs as $tab ) {
            foreach ( $tab['settings'] as $setting ) {
                $settings[] = $setting;
            }
        }

        // Loop through settings and validate
        foreach ( $settings as $setting ) {

            // Vars
            $value = '';
            $id    = $setting['id'];
            $type  = isset ( $setting['type'] ) ? $setting['type'] : 'text';

            // Make sure field exists and if so validate the data
            if ( isset( $_POST[$id] ) ) {

                // Validate select
                if ( 'select' == $type ) {
                    if ( '' !== $_POST[$id] ) {
                        $value = sanitize_text_field( $_POST[$id] );
                    }
                }
                // Validate radio
                elseif ( 'radio' == $type ) {
                    if ( 'default' == $_POST[$id] ) {
                        $value = '';
                    } else {
                        $value = sanitize_text_field( $_POST[$id] );
                    }
                }
                // All else
                else {
                    $value = sanitize_text_field( $_POST[$id] );
                }

                // Update meta if value exists
                if ( $value ) {
                    update_post_meta( $post_id, $id, $value );
                }

                // Otherwise cleanup stuff
                else {
                    delete_post_meta( $post_id, $id );
                }
            }

        }

    }

    /**
     * Settings Array
     *
     * @param null $post
     * @return array
     */
    private function meta_array( $post = null ) {

        // Prefix
        $prefix = 'zenvy_';

        // Define array
        $array = array();

        // Page Header Tab
        $array['page_header'] = array(
            'title'             => esc_html__( 'Page Header', 'zenvy' ),
            'settings'          => array(
                'page_header_enable' => array(
                    'title'         => esc_html__( 'Activate', 'zenvy' ),
                    'description'   => esc_html__( 'Default value is inherit from customizer saved value.', 'zenvy' ),
                    'id'            => $prefix . 'page_header_enable',
                    'type'          => 'select',
                    'options'       => array(
                        'default'       => esc_html__( 'Default From Customizer', 'zenvy' ),
                        'disable'       => esc_html__( 'Disable', 'zenvy' )
                    ),
                    'default'       => 'default'
                ),
            ),
        );

        // Content Layout
        // $array['layout']    = array(
        //     'title'         => esc_html__( 'Content Layout', 'zenvy' ),
        //     'post_type'     => ['post'],
        //     'settings'      => [
        //         'content_layout'    => [
        //             'title'         => esc_html__( 'Content Layout', 'zenvy' ),
        //             'description'   => esc_html__( 'Set content layout as portrait and Landscape.', 'zenvy' ),
        //             'id'            => $prefix . 'content_layout',
        //             'type'          => 'radio',
        //             'options'       => array(
        //                 'portrait'      => esc_html__( 'Portrait', 'zenvy' ),
        //                 'landscape'     => esc_html__( 'Landscape', 'zenvy' ),
        //             ),
        //             'default'       => 'portrait'
        //         ]
        //     ],
        // );

        // Sidebar Layout
        $array['sidebar']   = array(
            'title'         => esc_html__( 'Sidebar', 'zenvy' ),
            'settings'      => [
                'sidebar_layout'    => [
                    'title'         => esc_html__( 'Sidebar Layout', 'zenvy' ),
                    'description'   => esc_html__( 'Default value is inherit from customizer saved value.', 'zenvy' ),
                    'id'            => $prefix . 'sidebar_layout',
                    'type'          => 'radio',
                    'options'       => [
                        'default'       => esc_html__( 'From Customizer', 'zenvy' ),
                        'left'          => esc_html__( 'Left Sidebar', 'zenvy' ),
                        'right'         => esc_html__( 'Right Sidebar', 'zenvy' ),
                        'none'          => esc_html__( 'Full Width', 'zenvy' ),
                    ],
                    'default'       => 'default'
                ]
            ],
        );


        // Apply filter & return settings array
        return apply_filters( 'zenvy_meta_box_settings', $array, $post );
    }

}

// Class needed only in the admin
if ( is_admin() ) {

    Zenvy_Meta_Boxes::get_instance();
}


