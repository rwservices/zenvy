<?php
/**
 * Meta Boxes Settings
 *
 * @package Zenvy
 */

/**
 * Class for Meta Boxes Settings
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
     * Meta prefix
     */
    private const PREFIX = 'zenvy_';

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

        // Register meta fields
        add_action( 'init', array( $this, 'register_meta' ), 20 );

        // Add meta-boxes
        if ( self::$post_types ) {
            foreach ( self::$post_types as $post_type ) {
                add_action( "add_meta_boxes_{$post_type}", array( $this, 'post_meta' ), 11 );
            }
        }

        // Save meta
        add_action( 'save_post', array( $this, 'save_meta_data' ), 10, 2 );

        // Load scripts
        add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );
    }

    /**
     * Register post meta for REST API, Gutenberg, etc.
     */
    public function register_meta() {

        $tabs = $this->meta_array();

        foreach ( $tabs as $tab ) {
            foreach ( $tab['settings'] as $setting ) {
                $meta_key = $setting['id'];
                $type     = $setting['type'] ?? 'string';
                $default  = $setting['default'] ?? '';

                $args = [
                    'single'            => true,
                    'show_in_rest'      => true,
                    'type'              => $this->get_meta_type( $type ),
                    'default'           => $default,
                    'sanitize_callback' => $this->get_sanitize_callback( $type ),
                    'auth_callback'     => function() {
                        return current_user_can( 'edit_posts' );
                    },
                ];

                // Register for each post type
                foreach ( self::$post_types as $post_type ) {
                    register_post_meta( $post_type, $meta_key, $args );
                }
            }
        }
    }

    /**
     * Map meta box type to register_post_meta type
     */
    private function get_meta_type( $type ) {
        switch ( $type ) {
            case 'radio':
            case 'select':
                return 'string';
            default:
                return 'string';
        }
    }

    /**
     * Get appropriate sanitize callback
     */
    private function get_sanitize_callback( $type ) {
        switch ( $type ) {
            case 'radio':
            case 'select':
                return 'sanitize_text_field';
            default:
                return 'sanitize_text_field';
        }
    }

    /**
     * Loads scripts and styles.
     *
     * FIX: `edit.php` doesn't have a $post object — removed it from the hook
     *      list so the early-return on !is_object($post) doesn't silently skip
     *      the style/script enqueue on post.php / post-new.php.
     */
    public function load_scripts( $hook ) {
        if ( ! in_array( $hook, [ 'post.php', 'post-new.php' ], true ) ) {
            return;
        }

        global $post;
        if ( ! is_object( $post ) || ! in_array( $post->post_type, self::$post_types, true ) ) {
            return;
        }

        wp_enqueue_style(
            'zenvy-meta-box-style',
            ZENVY_THEME_URI . 'assets/build/css/meta-box' . ZENVY_RTL_SUFFIX . '.css', // FIX: was ZENVY_RTL_SUFFIX (missing V)
            false,
            ZENVY_THEME_VERSION,
            'all'
        );

        wp_enqueue_script(
            'zenvy-meta-box-script',
            ZENVY_THEME_URI . 'assets/build/js/meta-box.js',
            array( 'jquery' ),
            ZENVY_THEME_VERSION,
            true
        );
    }

    /**
     * Add Meta-Box
     */
    public function post_meta( $post ) {
        $obj = get_post_type_object( $post->post_type );

        add_meta_box(
            'post_meta_fields',
            $obj->labels->singular_name . ' ' . esc_html__( 'Settings', 'zenvy' ),
            array( $this, 'display_meta_box' ),
            $post->post_type,
            'normal',
            'high'
        );
    }

    /**
     * Display Meta-Box Fields
     *
     * FIX: array_filter() preserves original keys, so using $i as a sequential
     *      counter caused tab nav IDs (setting-tab-1, setting-tab-2 …) to
     *      mismatch the content panel IDs when any tab was filtered out.
     *      Re-index with array_values() before iterating so $i is always 0-based.
     */
    public function display_meta_box( $post ) {

        wp_nonce_field( basename( __FILE__ ), 'zenvy_meta_nonce' );

        $post_id   = $post->ID;
        $post_type = $post->post_type;

        $tabs = $this->meta_array( $post );

        if ( empty( $tabs ) ) {
            echo '<p>' . esc_html__( 'No meta settings available for this post type or user.', 'zenvy' ) . '</p>';
            return;
        }

        // Filter active tabs for this post type
        $active_tabs = array_filter( $tabs, function( $tab ) use ( $post_type ) {
            $tab_post_types = $tab['post_type'] ?? [];
            return empty( $tab_post_types ) || in_array( $post_type, (array) $tab_post_types, true );
        });

        if ( empty( $active_tabs ) ) {
            echo '<p>' . esc_html__( 'No meta settings available for this post type or user.', 'zenvy' ) . '</p>';
            return;
        }

        // Re-index so tab IDs stay sequential (0, 1, 2 …) even after filtering
        $active_tabs = array_values( $active_tabs );
        ?>

        <div class="metabox-container">
            <div class="metabox-settings-tabs">
                <ul class="metabox-tab-nav">
                    <?php foreach ( $active_tabs as $i => $tab ) :
                        $tab_title = $tab['title'] ?? esc_html__( 'Other', 'zenvy' ); ?>
                        <li class="tab-link" data-tab="setting-tab-<?php echo esc_attr( $i + 1 ); ?>">
                            <?php echo esc_html( $tab_title ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="meta-box-wrap">
                    <?php foreach ( $active_tabs as $i => $tab ) : ?>
                        <div id="setting-tab-<?php echo esc_attr( $i + 1 ); ?>" class="setting-tab">
                            <?php foreach ( $tab['settings'] as $setting ) :
                                $meta_id     = $setting['id'];
                                $title       = $setting['title'] ?? '';
                                $description = $setting['description'] ?? '';
                                $type        = $setting['type'] ?? 'text';
                                $default     = $setting['default'] ?? '';
                                $meta_value  = get_post_meta( $post_id, $meta_id, true );
                                $meta_value  = $meta_value !== '' ? $meta_value : $default;
                            ?>

                                <?php if ( 'radio' === $type ) :
                                    $options = $setting['options'] ?? []; ?>
                                    <section>
                                        <div class="input-holder">
                                            <?php if ( $title ) : ?>
                                                <div class="input-label">
                                                    <label for="<?php echo esc_attr( $meta_id ); ?>"><?php echo esc_html( $title ); ?></label>
                                                    <?php if ( $description ) : ?>
                                                        <p class="description"><?php echo esc_html( $description ); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="input-field image-radio-layout">
                                                <fieldset>
                                                    <?php foreach ( $options as $option_value => $option_name ) : ?>
                                                        <input type="radio"
                                                               name="<?php echo esc_attr( $meta_id ); ?>"
                                                               id="has-<?php echo esc_attr( $option_value ); ?>"
                                                               value="<?php echo esc_attr( $option_value ); ?>"
                                                               <?php checked( $meta_value, $option_value ); ?>>
                                                        <label for="has-<?php echo esc_attr( $option_value ); ?>" class="has-<?php echo esc_attr( $option_value ); ?>">
                                                            <?php echo esc_html( $option_name ); ?>
                                                        </label>
                                                    <?php endforeach; ?>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </section>

                                <?php elseif ( 'select' === $type ) :
                                    $options = $setting['options'] ?? []; ?>
                                    <section>
                                        <div class="input-holder">
                                            <?php if ( $title ) : ?>
                                                <div class="input-label">
                                                    <label for="<?php echo esc_attr( $meta_id ); ?>"><?php echo esc_html( $title ); ?></label>
                                                    <?php if ( $description ) : ?>
                                                        <p class="description"><?php echo esc_html( $description ); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="input-field">
                                                <select id="<?php echo esc_attr( $meta_id ); ?>" name="<?php echo esc_attr( $meta_id ); ?>">
                                                    <?php foreach ( $options as $option_value => $option_name ) : ?>
                                                        <option value="<?php echo esc_attr( $option_value ); ?>"
                                                                <?php selected( $meta_value, $option_value ); ?>>
                                                            <?php echo esc_html( $option_name ); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Save Meta Data
     */
    public function save_meta_data( $post_id, $post ) {

        if ( ! isset( $_POST['zenvy_meta_nonce'] ) ||
             ! wp_verify_nonce( sanitize_key( $_POST['zenvy_meta_nonce'] ), basename( __FILE__ ) ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( 'page' === $post->post_type ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }
        } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $tabs = $this->meta_array();
        $settings = [];

        foreach ( $tabs as $tab ) {
            foreach ( $tab['settings'] as $setting ) {
                $settings[] = $setting;
            }
        }

        foreach ( $settings as $setting ) {
            $id   = $setting['id'];
            $type = $setting['type'] ?? 'text';

            if ( ! isset( $_POST[ $id ] ) ) {
                delete_post_meta( $post_id, $id );
                continue;
            }

            $value = sanitize_text_field( wp_unslash( $_POST[ $id ] ) );

            // Special handling for 'default'
            if ( in_array( $value, [ 'default', '' ], true ) ) {
                delete_post_meta( $post_id, $id );
            } else {
                update_post_meta( $post_id, $id, $value );
            }
        }
    }

    /**
     * Settings Array
     */
    private function meta_array( $post = null ) {

        $array = array();

        // Page Header Tab
        $array['page_header'] = array(
            'title'    => esc_html__( 'Page Header', 'zenvy' ),
            'settings' => array(
                'page_header_enable' => array(
                    'title'       => esc_html__( 'Activate', 'zenvy' ),
                    'description' => esc_html__( 'Default value is inherit from customizer saved value.', 'zenvy' ),
                    'id'          => self::PREFIX . 'page_header_enable',
                    'type'        => 'select',
                    'options'     => array(
                        'default' => esc_html__( 'Default From Customizer', 'zenvy' ),
                        'disable' => esc_html__( 'Disable', 'zenvy' ),
                    ),
                    'default'     => 'default'
                ),
            ),
        );

        // Sidebar Layout
        $array['sidebar'] = array(
            'title'    => esc_html__( 'Sidebar', 'zenvy' ),
            'settings' => array(
                'sidebar_layout' => array(
                    'title'       => esc_html__( 'Sidebar Layout', 'zenvy' ),
                    'description' => esc_html__( 'Default value is inherit from customizer saved value.', 'zenvy' ),
                    'id'          => self::PREFIX . 'sidebar_layout',
                    'type'        => 'radio',
                    'options'     => array(
                        'default' => esc_html__( 'From Customizer', 'zenvy' ),
                        'left'    => esc_html__( 'Left Sidebar', 'zenvy' ),
                        'right'   => esc_html__( 'Right Sidebar', 'zenvy' ),
                        'none'    => esc_html__( 'Full Width', 'zenvy' ),
                    ),
                    'default'     => 'default'
                )
            ),
        );

        return apply_filters( 'zenvy_meta_box_settings', $array, $post );
    }
}

// Initialize only in admin
if ( is_admin() ) {
    Zenvy_Meta_Boxes::get_instance();
}