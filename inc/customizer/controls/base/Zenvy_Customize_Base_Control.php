<?php
/**
 * Zenvy Customize Base control for controls
 *
 * @package Zenvy
 */

/**
 * Zenvy_Customize_Base_Control class for controls.
 */
class Zenvy_Customize_Base_Control extends WP_Customize_Control {

	/**
	 * Array of translation strings.
	 *
	 * @access public
	 * @var    array
	 */
	public $l10n = [];

	/**
	 * Add custom class.
	 *
	 * @access public
	 * @var string
	 */
	public $css_class = '';

	/**
	 * Array of units choices.
	 *
	 * @access public
	 * @var array
	 */
	public $units = [ 'px' ];

	/**
	 * Array of responsive devices.
	 *
	 * @access public
	 * @var array
	 */
	public $responsive = [ 'desktop' ];

	/**
	 * Array of disable sides for dimensions.
	 *
	 * @access public
	 * @var array
	 */
	public $off_sides = [];

	/**
	 * Array of settings fields.
	 *
	 * @access public
	 * @var array
	 */
	public $fields = [];

	/**
	 * Array of settings for colors.
	 *
	 * @access public
	 * @var array
	 */
	public $colors = [ 'color_1' => 'Normal' ];

	/**
	 * Array of settings for inherits values.
	 *
	 * @access public
	 * @var array
	 */
	public $inherits = [];

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 * @see WP_Customize_Control::to_json()
	 * @return void
	 */
	public function to_json() {

		// Get the basics from the parent class.
		parent::to_json();

		// Default value.
		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		// Value.
		$this->json['value'] = $this->value();

		// The link.
		$this->json['link'] = $this->get_link();

		// The ID.
		$this->json['id'] = $this->id;

		// Translation strings.
		$this->json['l10n'] = $this->l10n;

		// Input attributes.
		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

		// Choices.
		$this->json['choices'] = $this->choices;

		// Style class.
		$this->json['css_class'] = $this->css_class;

		// Units choices.
		$this->json['units'] = $this->units;

		// Off sides.
		$this->json['off_sides'] = $this->off_sides;

		// Colors.
		$this->json['colors'] = $this->colors;

		// Inherits.
		$this->json['inherits'] = $this->inherits;

		// Responsive devices.
		$this->json['responsive'] = $this->responsive;
	}

	/**
	 * Renders the control wrapper and calls $this->render_content() for the internals.
	 *
	 * @see WP_Customize_Control::render()
	 */
	protected function render() {
		$id      = 'customize-control-' . str_replace( [ '[', ']' ], [ '-', '' ], $this->id );
		$class   = [ 'customize-control customize-control' ];
		$class[] = 'customize-control-' . $this->type;

		if ( count( $this->responsive ) > 1 ) {
			$class[] = 'has-responsive-switcher';
		} ?>

		<li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( implode( ' ', $class ) ); ?>">
			<?php $this->render_content(); ?>
		</li>
		<?php
	}

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overridden without having to rewrite the wrapper in `$this::render()`.
	 * Control content can alternately be rendered in JS. See WP_Customize_Control::print_template().
	 *
	 * @access protected
	 * @return void
	 */
	protected function render_content() {}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @access protected
	 * @see WP_Customize_Control::print_template()
	 * @return void
	 */
	protected function content_template() {}
}