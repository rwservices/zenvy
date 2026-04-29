<?php
/**
 * Customizer Control: zenvy_heading
 *
 * @package Zenvy
 */

/**
 * Zenvy_Customize_Heading_Control class
 */
class Zenvy_Customize_Heading_Control extends Zenvy_Customize_Base_Control {

    /**
     * The type of customize control being rendered.
     *
     * @access public
     * @var    string
     */
    public $type = 'zenvy_heading';

    /**
     * Underscore JS template to handle the control's output.
     *
     * @access public
     * @return void
     */
    public function content_template() { ?>

        <div class="control-wrap heading-control">

            <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>

            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

        </div>

        <?php
    }
}

// Register JS-rendered control types.
$wp_customize->register_control_type( 'Zenvy_Customize_Heading_Control' );