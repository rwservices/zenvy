<?php
class Zenvy_Google_Fonts {

	/**
	 * Main Instance
	 *
	 * Insures that only one instance of Zenvy_Google_Fonts exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since    1.0.0
	 * @access   public
	 *
	 * @return object
	 */
	public static function instance() {

		// Store the instance locally to avoid private static replication
		static $instance = null;

		// Only run these methods if they haven't been ran previously
		if ( null === $instance ) {
			$instance = new self();
		}

		// Always return the instance
		return $instance;
	}

	/**
	 *  Run functionality with hooks
	 *
	 * @since    1.0.0
	 * @access   public
	 *
	 * @return void
	 */
	public function run() {

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_google_fonts' ], 1 );
	}

	/**
	 * Standard Web Fonts
	 *
	 * @return array $webfonts
	 */
	protected static function standard_webfonts() {

		// Declare default font lists
		$lists = [
			[
				'family'   => 'Serif',
				'variants' => [
					'400',
					'400italic',
					'700',
					'700italic',
				],
				'subsets'  => [],
			],
			[
				'family'   => 'Sans Serif',
				'variants' => [
					'400',
					'400italic',
					'700',
					'700italic',
				],
				'subsets'  => [],
			],
			[
				'family'   => 'Monospace',
				'variants' => [
					'400',
					'400italic',
					'700',
					'700italic',
				],
				'subsets'  => [],
			],
		];

		// Build default webfonts
		$webfonts = [];

		foreach ( $lists as $item ) {

			// font name
			$name = str_replace( ' ', '+', $item['family'] );

			// font url
			$url = "https://fonts.googleapis.com/css?family={$name}:" . implode( ',', $item['variants'] );
			if ( isset( $item['subsets'] ) ) {
				$url .= '&subset=' . join( ',', $item['subsets'] );
			}

			// Create a font array containing it's properties and add it to the $webfonts array
			$attr = [
				'name'          => $item['family'],
				'font_type'     => esc_html__( 'Standard Fonts', 'zenvy' ),
				'font_variants' => $item['variants'],
				'subsets'       => $item['subsets'],
				'url'           => $url,
			];

			// Add this font to the fonts array
			$id              = strtolower( str_replace( ' ', '_', $item['family'] ) );
			$webfonts[ $id ] = $attr;
		}

		return $webfonts;
	}

	/**
	 * Google Web Fonts
	 *
	 * @return array $webfonts
	 */
	protected static function google_webfonts() {
		// Declare default font lists
		$lists = [
			[
				'family'   => 'Barlow',
				'variants' => [
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
				'subsets'  => [
					'latin',
					'latin-ext',
					'vietnamese',
				],
				'category' => 'sans-serif',
			],
			[
				'family'   => 'Bona Nova',
				'variants' => [
					'regular',
					'italic',
					'700',
				],
				'subsets'  => [
					'cyrillic',
					'cyrillic-ext',
					'greek',
					'hebrew',
					'latin',
					'latin-ext',
					'vietnamese',
				],
				'category' => 'serif',
			],
			[
				'family'   => 'Josefin Sans',
				'variants' => [
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'100italic',
					'200italic',
					'300italic',
					'italic',
					'500italic',
					'600italic',
					'700italic',
				],
				'subsets'  => [
					'latin',
					'latin-ext',
					'vietnamese',
				],
				'category' => 'sans-serif',
			],
			[
				'family'   => 'Kaisei Tokumin',
				'variants' => [
					'regular',
					'500',
					'700',
					'800',
				],
				'subsets'  => [
					'cyrillic',
					'japanese',
					'latin',
					'latin-ext',
				],
				'category' => 'serif',
			],
			[
				'family'   => 'Lato',
				'variants' => [
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
				'subsets'  => [
					'latin',
					'latin-ext',
				],
				'category' => 'sans-serif',
			],
			[
				'family'   => 'Montserrat',
				'variants' => [
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
				'subsets'  => [
					'cyrillic',
					'cyrillic-ext',
					'latin',
					'latin-ext',
					'vietnamese',
				],
				'category' => 'sans-serif',
			],
			[
				'family'   => 'Open Sans',
				'variants' => [
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
				],
				'subsets'  => [
					'cyrillic',
					'cyrillic-ext',
					'greek',
					'greek-ext',
					'latin',
					'latin-ext',
					'vietnamese',
				],
				'category' => 'sans-serif',
			],
			[
				'family'   => 'Prompt',
				'variants' => [
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
				'subsets'  => [
					'latin',
					'latin-ext',
					'thai',
					'vietnamese',
				],
				'category' => 'sans-serif',
			],
			[
				'family'   => 'Roboto',
				'variants' => [
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
				'subsets'  => [
					'cyrillic',
					'cyrillic-ext',
					'greek',
					'greek-ext',
					'latin',
					'latin-ext',
					'vietnamese',
				],
				'category' => 'sans-serif',
			],
		];

		// Google Fonts webfonts
		$webfonts = [];

		foreach ( $lists as $item ) {

			// font name
			$name = str_replace( ' ', '+', $item['family'] );

			// font url
			$url = "https://fonts.googleapis.com/css?family={$name}:" . implode( ',', $item['variants'] );
			if ( isset( $item['subsets'] ) ) {
				$url .= '&subset=' . join( ',', $item['subsets'] );
			}

			// Create a font array containing it's properties and add it to the $webfonts array
			$attr = [
				'name'          => $item['family'],
				'category'      => $item['category'],
				'font_type'     => esc_html__( 'Google Fonts', 'zenvy' ),
				'font_variants' => $item['variants'],
				'subsets'       => $item['subsets'],
				'url'           => $url,
			];

			// Add this font to the fonts array
			$id              = strtolower( str_replace( ' ', '_', $item['family'] ) );
			$webfonts[ $id ] = $attr;
		}

		return $webfonts;
	}

	/**
	 * Get All Fonts
	 *
	 * Merges the default system fonts and the google fonts
	 * into a single array and returns it
	 *
	 * @static
	 * @access public
	 * @return array All fonts with their properties
	 */
	public static function get_fonts() {

		$standard = self::standard_webfonts();
		$google   = self::google_webfonts();

		return array_merge( $standard, $google );
	}

	/**
	 * Returns an array of added google fonts
	 *
	 * @static
	 * @access public
	 * @return array
	 */
	public static function add_google_fonts() {

		$added_fonts      = [];
		$added_fonts_pass = [];
		$all_fonts        = self::get_fonts();

		/*
		--------------------------------------------------------------
		# Global
		--------------------------------------------------------------*/
		// Base
		$base = get_theme_mod(
			'zenvy_base_typography',
			''
		);
		if ( $base && array_key_exists( 'font_family', $base ) ) {
			$added_fonts[] = $base;
		}
		// Header contact info
		$header_contact_info_title = get_theme_mod(
			'zenvy_header_contact_info_title_typo',
			''
		);
		if ( $header_contact_info_title && array_key_exists( 'font_family', $header_contact_info_title ) ) {
			$added_fonts[] = $header_contact_info_title;
		}
		$header_contact_info_subtitle = get_theme_mod(
			'zenvy_header_contact_info_subtitle_typo',
			''
		);
		if ( $header_contact_info_subtitle && array_key_exists( 'font_family', $header_contact_info_subtitle ) ) {
			$added_fonts[] = $header_contact_info_subtitle;
		}
		// Site Identity ->  Site Title
		$site_title = get_theme_mod(
			'zenvy_header_site_title_typo',
			''
		);
		if ( $site_title && array_key_exists( 'font_family', $site_title ) ) {
			$added_fonts[] = $site_title;
		}
		// Site Identify => Tagline
		$site_tagline = get_theme_mod(
			'zenvy_header_site_tagline_typo',
			''
		);
		if ( $site_tagline && array_key_exists( 'font_family', $site_tagline ) ) {
			$added_fonts[] = $site_tagline;
		}
		$added_fonts = apply_filters( 'zenvy_added_fonts', $added_fonts );

		if ( ! empty( $added_fonts ) ) {
			$weights = [];

			foreach ( $added_fonts as $added_font ) {

				// Check if font_family exist in $selected_font
				if ( empty( $added_font['font_family'] ) ) {
					continue;
				}

				$font_key = esc_html( strtolower( str_replace( ' ', '_', $added_font['font_family'] ) ) );
				// Check for the Google Fonts arrays.
				if ( array_key_exists( $font_key, $all_fonts ) ) {
					$added_fonts_pass[ $font_key ]['font'] = esc_html( $added_font['font_family'] );
				}

				// font weight
				if ( array_key_exists( 'weight', $added_font ) ) {
					if ( ! in_array( $added_font['weight'], $weights, true ) ) {
						array_push( $weights, $added_font['weight'] );
					}
					$added_fonts_pass[ $font_key ]['weight'] = $weights;
					asort( $added_fonts_pass[ $font_key ]['weight'] );
				}
				// font style
				if ( ! array_key_exists( 'style', $added_font ) ) {
					continue;
				}

				$added_fonts_pass[ $font_key ]['style'] = esc_html( $added_font['style'] );
			}
		}

		return $added_fonts_pass;
	}

	/**
	 * Enqueue fonts.
	 */
	public function google_font_url() {

		$selected_fonts = self::add_google_fonts();
		$font_families  = [];

		if ( empty( $selected_fonts ) ) {
			return;
		}

		foreach ( $selected_fonts as $selected_font ) {
			$font_str = '';
			// font family, font style and font weight
			if ( empty( $selected_font['font'] ) ) {
				continue;
			}

			if ( ! empty( $selected_font['weight'] ) || ! empty( $selected_font['style'] ) ) {
				$font_str .= ! empty( $selected_font['style'] ) ? ':ital,wght@' : ':wght@';
				if ( ! empty( $selected_font['weight'] ) ) {
					$i = 0;
					foreach ( $selected_font['weight'] as $val ) {
						$font_str .= ! empty( $selected_font['style'] )
									? $i . ',' . esc_html( $val )
									: esc_html( $val );
						if ( $val !== end( $selected_font['weight'] ) ) {
							$font_str .= ';';
						}
						++$i;
					}
				}
			}
			$font_families[] = trim( $selected_font['font'] ) . $font_str;
		}

		$fonts_url = add_query_arg(
			[
				'family'  => implode( '&family=', $font_families ),
				'display' => 'swap',
			],
			'https://fonts.googleapis.com/css2'
		);

		return esc_url_raw( $fonts_url );
	}

	public function enqueue_google_fonts() {
		if ( ! zenvy_google_fonts()->google_font_url() ) {
			return;
		}

		require_once ZENVY_THEME_DIR . 'inc/wptt-webfont-loader.php';

		wp_enqueue_style(
			'zenvy-google-fonts',
			wptt_get_webfont_url( $this->google_font_url() ),
			[],
			ZENVY_THEME_VERSION
		);
	}
}

if ( ! function_exists( 'zenvy_google_fonts' ) ) {

	function zenvy_google_fonts() {

		return Zenvy_Google_Fonts::instance();
	}

	zenvy_google_fonts()->run();
}
