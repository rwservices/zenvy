<?php
/**
 * Zenvy Theme Customizer Social settings
 *
 * @package Zenvy
 */

class Zenvy_Customize_Global_Social_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Heading One
			'zenvy_social_icon_note' => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SOCIAL ICONS', 'zenvy' ),
				'section'  => 'zenvy_social_section',
				'priority' => 5,
			],
		];

		$this->args = array_merge(
			$this->args,
			[
				// Heading One
				'zenvy_social_share_note' => [
					'type'     => 'heading',
					'label'    => esc_html__( 'SOCIAL SHARE', 'zenvy' ),
					'section'  => 'zenvy_social_section',
					'priority' => 15,
				],
				// Social Network
				'zenvy_social_share'      => [
					'type'              => 'sortable',
					'default'           => [ 'facebook','twitter' ],
					'sanitize_callback' => [ 'Zenvy_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
					'description'       => esc_html__( 'Enable Social Share lists and re-arrange them by drag and drop.', 'zenvy' ),
					'section'           => 'zenvy_social_section',
					'priority'          => 20,
					'choices'           => [
						'facebook' => esc_html__( 'Facebook', 'zenvy' ),
						'twitter'  => esc_html__( 'Twitter', 'zenvy' ),
					],
				],
			]
		);
	}
}
new Zenvy_Customize_Global_Social_Fields();
