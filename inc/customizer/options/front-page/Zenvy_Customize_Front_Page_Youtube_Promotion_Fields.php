<?php 
/**
 * Zenvy Theme Customizer Front Page Youtube Promotion settings
 * 
 * @package Zenvy
 */

class Zenvy_Customize_Front_Page_Youtube_Promotion_Fields extends Zenvy_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            //Grouping Settings
            'zenvy_front_page_youtube_promotion_group_settings' => [
                'type'     => 'group',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 10,
                'choices'  => [
                    'normal' => [
                        'tab-title' => esc_html__( 'General', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_youtube_promotion_section_title',
                            'zenvy_video_url_1',
                            'zenvy_video_title_1',
                            'zenvy_video_category_1',
                            'zenvy_video_url_2',
                            'zenvy_video_title_2',
                            'zenvy_video_category_2',
                            'zenvy_video_url_3',
                            'zenvy_video_title_3',
                            'zenvy_video_category_3',
                            'zenvy_video_channel_url',
                        ],
                    ],
                    'style' => [
                        'tab-title' => esc_html__( 'Style', 'zenvy' ),
                        'controls'  => [
                            'zenvy_front_page_youtube_promotion_background',
                            'zenvy_front_page_youtube_promotion_background_overlay'
                        ],
                    ],
                ],
            ],

            // Section Title
            'zenvy_front_page_youtube_promotion_section_title' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'default'  => esc_html__( 'ME @ YOUTUBE', 'zenvy' ),
                'sanitize_callback' => 'sanitize_text_field',
                'priority' => 15,
                'label'    => esc_html__( 'Section Title', 'zenvy' ),
            ],

            // Primary Video URL
            'zenvy_video_url_1' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 20,
                'default'  => '#',
                 'sanitize_callback' => 'esc_url_raw',
                'label'    => esc_html__( 'Primary Video URL', 'zenvy' ),
            ],

            // Primary Video Title
            'zenvy_video_title_1' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 30,
                'default'  => esc_html__( 'Primary Video Title', 'zenvy' ),
                'label'    => esc_html__( 'Primary Video Title', 'zenvy' ),
            ],

            // Primary Video Category
            'zenvy_video_category_1' => [
                'type'     => 'select',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 40,
                'label'    => esc_html__( 'Primary Video Category', 'zenvy' ),
                'choices'  => Zenvy_Helper::get_terms('category'),
            ],

            // Secondary Videos URL
            'zenvy_video_url_2' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 50,
                'default'  => '#',
                'sanitize_callback' => 'esc_url_raw',
                'label'    => esc_html__( 'Second Video URL', 'zenvy' ),
            ],

            // Secondary Video Title
            'zenvy_video_title_2' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 60,
                'label'    => esc_html__( 'Second Video Title', 'zenvy' ),
                'default'  => esc_html__( 'Second Video Title', 'zenvy' ),
            ],

            // Secondary Video Category
            'zenvy_video_category_2' => [
                'type'     => 'select',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 70,
                'label'    => esc_html__( 'Second Video Category', 'zenvy' ),
                'choices'  => Zenvy_Helper::get_terms('category'),
            ],

            'zenvy_video_url_3' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 80,
                'label'    => esc_html__( 'Third Video URL', 'zenvy' ),
                'default'  => '#',
                'sanitize_callback' => 'esc_url_raw',
            ],

            'zenvy_video_title_3' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 90,
                'label'    => esc_html__( 'Third Video Title', 'zenvy' ),
                'default'  => esc_html__( 'Third Video Title', 'zenvy' ),
            ],

            'zenvy_video_category_3' => [
                'type'     => 'select',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 100,
                'label'    => esc_html__( 'Third Video Category', 'zenvy' ),
                'choices'  => Zenvy_Helper::get_terms('category'),
            ],

            // Video Channel URL
            'zenvy_video_channel_url' => [
                'type'     => 'text',
                'section'  => 'zenvy_front_page_youtube_promotion_section',
                'priority' => 110,
                'label'    => esc_html__( 'Video Channel URL', 'zenvy' ),
                'default'  => '#',
                'sanitize_callback' => 'esc_url_raw',
            ],


            // Background Image
			'zenvy_front_page_youtube_promotion_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'zenvy' ),
				'description'       => esc_html__( 'Set Background Image for container.', 'zenvy' ),
				'section'           => 'zenvy_front_page_youtube_promotion_section',
				'priority'          => 125,
				'fields'            => [
					'image'      => true,
					'position'   => true,
					'attachment' => true,
					'repeat'     => true,
					'size'       => true,
				],
			],
			// Background Overlay
			'zenvy_front_page_youtube_promotion_background_overlay' => [
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
				'section'           => 'zenvy_front_page_youtube_promotion_section',
				'priority'          => 130,
				'inherits'          => [
					'color_1' => 'var(--color-bg-4)',
				],
				'fields'            => [ 'colors' => true ],
			],

        ];
    }
}
new Zenvy_Customize_Front_Page_Youtube_Promotion_Fields();
