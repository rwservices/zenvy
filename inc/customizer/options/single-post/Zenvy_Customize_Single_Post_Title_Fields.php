<?php
/**
 * Zenvy Theme Customizer Single Post Title settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Single_Post_Title_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Title Tag
            'zenvy_single_post_title_tag' => [
                'type'              => 'buttonset',
                'default'           => ['desktop' => 'h1'],
                'sanitize_callback' => ['Zenvy_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
                'label'             => esc_html__( 'Heading Tag', 'zenvy' ),
                'section'           => 'zenvy_single_post_title_section',
                'priority'          => 15,
                'choices' 			=> array(
                    'h1'                => esc_html__( 'H1', 'zenvy' ),
                    'h2'                => esc_html__( 'H2', 'zenvy' ),
                    'h3'                => esc_html__( 'H3', 'zenvy' ),
                    'h4'                => esc_html__( 'H4', 'zenvy' ),
                    'h5'                => esc_html__( 'H5', 'zenvy' ),
                    'h6'                => esc_html__( 'H6', 'zenvy' )
                )
            ]
        ];
    }

}
new Zenvy_Customize_Single_Post_Title_Fields();
