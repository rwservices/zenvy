<?php 
/**
 * Zenvy Theme Customizer Front Page Latest Posts settings
 * 
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Latest_Posts_Fields extends Zenvy_Customize_Base_Field {
    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_front_page_latest_posts_group_settings' => [
                'type'     => 'group',
                'section'  => 'zenvy_front_page_latest_posts_section',
                'priority' => 10,
                'choices'  => [
                    'normal' => [
                        'tab-title' => esc_html__( 'General', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_latest_posts_number',
                            'zenvy_front_page_latest_posts_enable_sidebar',
                        ],
                    ],
                    'style'  => [
                        'tab-title' => esc_html__( 'Style', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_latest_posts_background',
                            'zenvy_front_page_latest_posts_background_overlay',
                        ],
                    ],
                ],
            ],

            // Number of posts to be displayed in latest posts section
            'zenvy_front_page_latest_posts_number' => [
                'type'              => 'range',
                'default'           => [ 'desktop' => 3 ],
                'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Number of Posts', 'zenvy' ),
                'description'       => esc_html__( 'Set the number of posts to be displayed in the latest posts section.', 'zenvy' ),
                'section'           => 'zenvy_front_page_latest_posts_section',
                'priority'          => 15,
                'units'            => [],
                'input_attrs'       => [
                    'min'  => 1,
                    'max'  => 10,
                    'step' => 1,
                ],
            ],

            // Show section specific sidebar for this section
            'zenvy_front_page_latest_posts_enable_sidebar' => [
                'type'              => 'toggle',
                'default'           => '',
                'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Enable Sidebar', 'zenvy' ),
                'description'       => esc_html__( 'Show section specific sidebar for this section. Sidebar Name: Homepage Sidebar', 'zenvy' ),
                'section'           => 'zenvy_front_page_latest_posts_section',
                'priority'          => 25,
            ],

			// Background Image
			'zenvy_front_page_latest_posts_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_latest_posts_section',
				'priority'          => 30,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_latest_posts_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background' => 'color',
					'colors'     => [
						'color_1' => 'var(--color-bg-4)',
					],
				],
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'zenvy' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_latest_posts_section',
				'priority'          => 35,
				'inherits'          => [
					'color_1' => 'var(--color-bg-4)',
				],
				'fields'            => [ 'colors' => true ],
			],
        ];
    }
}

new Zenvy_Customize_Front_Page_Latest_Posts_Fields();

