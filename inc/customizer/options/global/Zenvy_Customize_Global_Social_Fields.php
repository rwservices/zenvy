<?php
/**
 * Zenvy Theme Customizer Social settings
 *
 * @package Zenvy
 */

/**
 * Class Zenvy_Customize_Global_Social_Fields
 *
 * Handles customizer global social fields for the Zenvy theme.
 */
class Zenvy_Customize_Global_Social_Fields extends Zenvy_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Heading One.
			'zenvy_social_icon_note' => [
				'type'     => 'heading',
				'label'    => esc_html__( 'SOCIAL ICONS', 'zenvy' ),
				'section'  => 'zenvy_social_section',
				'priority' => 5,
			],
		];
	}
}
new Zenvy_Customize_Global_Social_Fields();
