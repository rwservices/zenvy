<?php
/**
 * Customizer Control: zenvy_editor
 *
 * @package Zenvy
 */

/**
 * Zenvy_Customize_Editor_Control class
 */
class Zenvy_Customize_Editor_Control extends Zenvy_Customize_Base_Control {

    /**
     * The type of customize control being rendered.
     *
     * @access public
     * @var    string
     */
    public $type = 'zenvy_editor';


    /**
     * Underscore JS template to handle the control's output.
     *
     * @access public
     * @return void
     */
    public function content_template() { ?>

        <# if ( data.label ) { #>
        <div class="d-flex justify-content-between align-items-center">
            <span class="customize-control-title position-relative">
                {{{ data.label }}}
                <span class="reset-value"><i class="dashicons dashicons-image-rotate d-flex justify-content-center align-items-center"></i></span>
            </span>
        </div>
        <# } #>

        <# if ( data.description ) { #>
        <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <textarea id="editor_{{{ data.id }}}" {{{ data.link }}}>{{ data.value }}</textarea>

        <?php
    }
}

// Register JS-rendered control types.
$wp_customize->register_control_type( 'Zenvy_Customize_Editor_Control' );