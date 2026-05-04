<?php
/**
 * Zenvy Theme Customizer Front Page Trending Posts settings
 * 
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Trending_Posts_Fields extends Zenvy_Customize_Base_Field {
    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'zenvy_front_page_trending_posts_group_settings' => [
                'type'     => 'group',
                'section'  => 'zenvy_front_page_trending_posts_section',
                'priority' => 10,
                'choices'  => [
                    'normal' => [
                        'tab-title' => esc_html__( 'General', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_trending_posts_limit',
                            'zenvy_front_page_trending_posts_enable_sidebar',
                        ],
                    ],
                    'hover'  => [
                        'tab-title' => esc_html__( 'Style', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_trending_posts_background',
                            'zenvy_front_page_trending_posts_background_overlay',
                        ],
                    ],
                ],
            ],

            // Trending post limit
            'zenvy_front_page_trending_posts_limit' => [
                'type'              => 'range',
                'default'           => [ 'desktop' => 3 ],
                'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Number of Trending Posts', 'zenvy' ),
                'description'       => esc_html__( 'Set the number of trending posts to display. It will display 3 posts by default.', 'zenvy' ),
                'section'           => 'zenvy_front_page_trending_posts_section',
                'priority'          => 20,
                'units' 		   => [],
                'input_attrs'           => [
                    'min'   => 1,
                    'max'   => 10,
                    'step'  => 1,
                ],
            ],

            // Show Homepage Sidebar Section
            'zenvy_front_page_trending_posts_enable_sidebar' => [
                'type'              => 'toggle',
                'default'           => '',
                'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Show Homepage Sidebar Section', 'zenvy' ),
                'description'       => esc_html__( 'Enable this option to show sidebar in trending posts section. Sidebar Name: Homepage Sidebar Secondary', 'zenvy' ),
                'section'           => 'zenvy_front_page_trending_posts_section',
                'priority'          => 21,
            ],

            // Background Image
			'zenvy_front_page_trending_posts_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 25,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_trending_posts_background_overlay' => [
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
				'section'           => 'zenvy_front_page_trending_posts_section',
				'priority'          => 26,
				'inherits'          => [
					'color_1' => 'var(--color-bg-4)',
				],
				'fields'            => [ 'colors' => true ],
			],
        ];
    }
}

new Zenvy_Customize_Front_Page_Trending_Posts_Fields();