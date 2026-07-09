<?php
/**
 * Zenvy Repeater Customizer Setting.
 *
 * @package Zenvy
 */

/**
 * Class Zenvy_Customize_Repeater_Setting
 * 
 * Handles the repeater customizer setting for the Zenvy theme.
 */
class Zenvy_Customize_Repeater_Setting extends WP_Customize_Setting {

	/**
	 * Set up our control.
	 *
	 * @access public
	 * @param  object $manager Customizer manager instance.
	 * @param  string $id      Control ID.
	 * @param  array  $args    Optional. Control arguments. Default empty array.
	 * @return void
	 */
	public function __construct( $manager, $id, $args = [] ) {
		parent::__construct( $manager, $id, $args );

		// Will onvert the setting from JSON to array. Must be triggered very soon.
		add_filter( "customize_sanitize_{$this->id}", [ $this, 'sanitize_repeater_setting' ], 10, 1 );
	}

	/**
	 * Fetch the value of the setting.
	 *
	 * @access public
	 * @return mixed The value.
	 */
	public function value() {
		$value = parent::value();
		if ( ! is_array( $value ) ) {
			$value = [];
		}
		return $value;
	}

	/**
	 * Convert the JSON encoded setting coming from Customizer to an Array.
	 *
	 * @access public
	 * @param string $value URL Encoded JSON Value.
	 * @return array
	 */
	public static function sanitize_repeater_setting( $value ) {
		if ( ! is_array( $value ) ) {
			$value = json_decode( urldecode( $value ) );
		}
		$sanitized = empty( $value ) || ! is_array( $value ) ? [] : $value;

		// Make sure that every row is an array, not an object.
		foreach ( $sanitized as $key => $_value ) {
			if ( empty( $_value ) ) {
				unset( $sanitized[ $key ] );
			} else {
				$sanitized[ $key ] = (array) $_value;
			}
		}

		// Reindex array.
		$sanitized = array_values( $sanitized );

		return $sanitized;
	}
}
