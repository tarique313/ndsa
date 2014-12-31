<?php
/**
 * @version    1.1
 * @package    Corsa
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2014 WooRockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

/**
 * Customizer Control Class
 *
 * @package Corsa
 * @since   1.0
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class WR_Corsa_Textarea_Control extends WP_Customize_Control {
		/**
		 * @access public
		 * @var string
		 */
		public $type = 'textarea';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" class="large-text" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

	class WR_Corsa_Button_Control extends WP_Customize_Control {
		/**
		 * @access public
		 * @var string
		 */
		public $type = 'button';

		/**
		 * HTML tag to render button object.
		 *
		 * @var  string
		 */
		protected $tag = 'button';

		/**
		 * Link for <a> based button.
		 *
		 * @var  string
		 */
		protected $href = 'javascript:void(0)';

		/**
		 * Target for <a> based button.
		 *
		 * @var  string
		 */
		protected $target = '';

		/**
		 * Click event handler.
		 *
		 * @var  string
		 */
		protected $onclick = '';

		/**
		 * ID attribute for HTML tab.
		 *
		 * @var  string
		 */
		protected $tag_id = '';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
		?>
			<span class="center">
				<?php
				// Print open tag
				echo '<' . esc_html( $this->tag ) . ' class="button-secondary"';

				if ( 'button' == $this->tag )
					echo ' type="button"';
				else
					echo ' href="' . esc_url( $this->href ) . '"' . ( empty( $this->tag ) ? '' : ' target="' . esc_attr( $this->target ) . '"' );

				if ( ! empty( $this->onclick ) )
					echo ' onclick="' . esc_js( $this->onclick ) . '"';

				if ( ! empty( $this->tag_id ) )
					echo ' id="' . esc_attr( $this->tag_id ) . '"';

				echo '>';

				// Print text inside tag
				echo esc_html( $this->label );

				// Print close tag
				echo '</' . esc_html( $this->tag ) . '>';
				?>
			</span>
		<?php
		}
	}

	class WR_Corsa_Checkbox_Image_Control extends WP_Customize_Control {
		/**
		 * Render the control's content.
		 */
		public function render_content() {

			if ( empty( $this->choices ) ) return;

			$name = $this->id;

			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<ul class="control-select-group">
				<?php
					foreach ( $this->choices as $value => $label ) :
						$checked = '';
						if ( $value == 0 ) $checked = 'checked';
				?>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/<?php echo esc_attr( $value ); ?>.png" alt="<?php echo esc_attr( $value ); ?>" /><br />
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
				</li>
				<?php endforeach; ?>
			</ul>
		<?php
		}
	}
}

function wr_corsa_theme_options( $wp_customize = null ) {
	/*--------------------------------------------------------------
		Getting Started
	--------------------------------------------------------------*/
	// Check if we have any backup file?
	$theme = wp_get_theme();
	$path  = wp_upload_dir();
	$path  = $path['basedir'] . '/' . strtolower( $theme['Name'] ) . '/backup';

	if ( count( $files = glob( "{$path}/*.sql" ) ) ) {
		// Sort by file name
		sort( $files );

		// Store latest backup file
		$backup = array_pop( $files );
	}

	// Define settings
	$theme_options['getting_started'] = array(
		'title'       => __( 'Getting Started', 'corsa' ),
		'description' => __( 'The best way to understand the template is to setup sample data on your website to make it look the same as template demo website. And when the sample data installed, it\'s about time to take a look at template documentation and start exploration.', 'corsa' ),
		'priority'    => 10,
		'settings'    => array(
			'wr_install_sample_data' => array(
				'sanitize_callback' => 'wr_corsa_sanitize_cb',
			),
			'wr_read_documentation' => array(
				'sanitize_callback' => 'wr_corsa_sanitize_cb',
			),
		),
		'controls' => array(
			'wr_install_sample_data' => array(
				'type' => 'WR_Corsa_Button_Control',
				'args' => array(
					'label'   => ( isset( $backup ) && $backup ) ? __( 'Restore Original Data', 'corsa' ) : __( 'Install Sample Data', 'corsa' ),
					'section' => 'getting_started',
					'type'    => 'button',
					'tag_id'  => ( isset( $backup ) && $backup ) ? 'wr-restore-original-data' : 'wr-install-sample-data',
				)
			),
			'wr_read_documentation' => array(
				'type' => 'WR_Corsa_Button_Control',
				'args' => array(
					'label'   => __( 'Read Documentation', 'corsa' ),
					'section' => 'getting_started',
					'type'    => 'button',
					'tag'     => 'a',
					'href'    => 'http://www.woorockets.com/docs/corsa/',
					'target'  => '_blank',
				)
			),
		),
	);

	/*--------------------------------------------------------------
		Site Title & Logo & Tagline
	--------------------------------------------------------------*/
	$theme_options['title_tagline'] = array(
		'title'       => __( 'Site Title & Logo & Tagline', 'corsa' ),
		'description' => __( 'Enter your website title or insert logo image. And type a short description for your website', 'corsa' ),
		'priority'    => 20,
		'settings'    => array(
			'wr_logo_type' => array(
				'default'           => 'logo_text',
				'sanitize_callback' => 'wr_corsa_sanitize_cb',
			),
			'wr_logo_image' => array(
				'sanitize_callback' => 'wr_corsa_sanitize_cb'
			),
		),
		'controls' => array(
			'wr_logo_type' => array(
				'label'    => __( 'Logo Type', 'corsa' ),
				'section'  => 'title_tagline',
				'type'     => 'select',
				'priority' => 1,
				'choices'  => array(
					'logo_text'  => __( 'Logo Text', 'corsa' ),
					'logo_image' => __( 'Logo Image', 'corsa' ),
				),
			),
			'wr_logo_image' => array(
				'type' => 'WP_Customize_Image_Control',
				'args' => array(
					'label'    => __( 'Upload Logo', 'corsa' ),
					'section'  => 'title_tagline',
					'priority' => 2,
				),
			),
		),
	);

	/*--------------------------------------------------------------
		Colors Scheme
	--------------------------------------------------------------*/
	// Remove default Colors section
	if ( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
	}
	$theme_options['color_schemes'] = array(
		'title'       => __( 'Color Schemes', 'corsa' ),
		'description' => __( 'Corsa provides 6 major color variations for your taste. Each color variation covers not only the main background, but also color of drop-down menu, links, table\'s header and others.', 'corsa' ),
		'priority'    => 30,
		'settings'    => array(
			'wr_color_schemes' => array(
				'default'           => 'cyan',
				'sanitize_callback' => 'wr_corsa_sanitize_color_placement',
			),
		),
		'controls' => array(
			'wr_color_schemes' => array(
				'type' => 'WR_Corsa_Checkbox_Image_Control',
				'args' => array(
					'label'   => __( 'Select Color', 'corsa' ),
					'section' => 'color_schemes',
					'choices' => array(
						'cyan'   => __( 'Cyan', 'corsa' ),
						'green'  => __( 'Green', 'corsa' ),
						'red'    => __( 'Red', 'corsa' ),
						'grey'   => __( 'Grey', 'corsa' ),
						'orange' => __( 'Orange', 'corsa' ),
						'violet' => __( 'Violet', 'corsa' ),
					)
				)
			)
		)
	);

	/*--------------------------------------------------------------
		Page Layout
	--------------------------------------------------------------*/
	$theme_options['page_layout'] = array(
		'title'       => __( 'Page Layout', 'corsa' ),
		'description' => __( 'Select page layout with sidebar display.', 'corsa' ),
		'priority'    => 40,
		'settings'    => array(
			'wr_page_layout' => array(
				'default'           => 'main-right',
				'sanitize_callback' => 'wr_corsa_sanitize_page_layout',
			),
			'wr_page_comments' => array(
				'default'           => '0',
				'sanitize_callback' => 'wr_corsa_sanitize_checkbox',
			),
		),
		'controls' => array(
			'wr_page_layout' => array(
				'type' => 'WR_Corsa_Checkbox_Image_Control',
				'args' => array(
					'label'    => __( 'Select Page Layout', 'corsa' ),
					'section'  => 'page_layout',
					'priority' => 0,
					'choices'  => array(
						'main'            => __( 'Main', 'corsa' ),
						'left-main'       => __( 'Left - Main', 'corsa' ),
						'main-right'      => __( 'Main - Right', 'corsa' ),
						'left-main-right' => __( 'Left - Main - Right', 'corsa' ),
						'left-right-main' => __( 'Left - Right - Main', 'corsa' ),
						'main-left-right' => __( 'Main - Left - Right', 'corsa' )
					)
				)
			),
			'wr_page_comments' => array(
				'label'    => __( 'Show Comments', 'corsa' ),
				'section'  => 'page_layout',
				'type'     => 'radio',
				'priority' => 1,
				'choices'  => array(
					'1' => __( 'Yes', 'corsa' ),
					'0' => __( 'No', 'corsa' ),
				),
			)
		)
	);

	/*--------------------------------------------------------------
		WooCommerce Layout
	--------------------------------------------------------------*/
	$theme_options['wcm_layout'] = array(
		'title'    => __( 'WooCommerce Layout', 'corsa' ),
		'priority' => 50,
		'settings' => array(
			'wr_wcm_layout' => array(
				'default'           => 'left-main',
				'sanitize_callback' => 'wr_corsa_sanitize_checkbox',
			)
		),
		'controls' => array(
			'wr_wcm_layout' => array(
				'type' => 'WR_Corsa_Checkbox_Image_Control',
				'args' => array(
					'label'    => __( 'Product list layout', 'corsa' ),
					'section'  => 'wcm_layout',
					'priority' => 1,
					'choices'  => array(
						'main'       => __( 'Main', 'corsa' ),
						'left-main'  => __( 'Left - Main', 'corsa' ),
						'main-right' => __( 'Main - Right', 'corsa' ),
					)
				)
			)
		)
	);

	/*--------------------------------------------------------------
		Extras
	--------------------------------------------------------------*/
	$theme_options['extras'] = array(
		'title'    => __( 'Extras', 'corsa' ),
		'priority' => 60,
		'settings' => array(
			'wr_maintenance_mode' => array(
				'default'           => '0',
				'sanitize_callback' => 'wr_corsa_sanitize_checkbox'
			),
			'wr_maintenance_mode_message' => array(
				'sanitize_callback' => 'wr_corsa_sanitize_cb'
			),
			'wr_maintenance_mode_timer' => array(
				'default'           => 'January 01, 2020',
				'sanitize_callback' => 'wr_corsa_sanitize_cb',
			),
			'wr_code_at_end_of_head' => array(
				'sanitize_callback' => 'wr_corsa_sanitize_cb'
			),
			'wr_code_at_end_of_body' => array(
				'sanitize_callback' => 'wr_corsa_sanitize_cb'
			)
		),
		'controls' => array(
			'wr_maintenance_mode' => array(
				'label'    => __( 'Offline', 'corsa' ),
				'section'  => 'extras',
				'type'     => 'radio',
				'priority' => 0,
				'choices'  => array(
					'1' => __( 'Yes', 'corsa' ),
					'0' => __( 'No', 'corsa' ),
				)
			),
			'wr_maintenance_mode_message' => array(
				'label'    => __( 'Your Away Message', 'corsa' ),
				'section'  => 'extras',
				'type'     => 'textarea',
				'priority' => 1,
			),
			'wr_maintenance_mode_timer' => array(
				'label'    => __( 'Countdown timer (Format: M D, Y)', 'corsa' ),
				'section'  => 'extras',
				'type'     => 'text',
				'priority' => 2,
			),
			'wr_code_at_end_of_head' => array(
				'label'    => __( 'Code Before &lt;/head&gt;', 'corsa' ),
				'section'  => 'extras',
				'type'     => 'textarea',
				'priority' => 6,
			),
			'wr_code_at_end_of_body' => array(
				'label'    => __( 'Code Before &lt;/body&gt;', 'corsa' ),
				'section'  => 'extras',
				'type'     => 'textarea',
				'priority' => 7,
			)
		)
	);

	/*--------------------------------------------------------------
		Register theme options with WordPress
	--------------------------------------------------------------*/
	if ( $wp_customize ) {
		foreach ( $theme_options as $section => $define ) {
			// Get settings
			$settings = isset( $define['settings'] ) ? $define['settings'] : array();

			// Get controls
			$controls = isset( $define['controls'] ) ? $define['controls'] : array();

			// Unset settings and controls data
			unset( $define['settings'] );
			unset( $define['controls'] );

			// Check if section already exists
			if ( $wp_customize->get_section( $section ) ) {
				foreach ( $define as $k => $v ) {
					$wp_customize->get_section( $section )->$k = $v;
				}
			} else {
				$wp_customize->add_section( $section, $define );
			}

			// Add settings
			foreach ( $settings as $setting => $define ) {
				$wp_customize->add_setting( $setting, array_merge( array( 'sanitize_callback' => null ), $define ) );
			}

			// Add controls
			foreach ( $controls as $control => $define ) {
				if ( isset( $define['type'] ) && class_exists( $define['type'] ) ) {
					$wp_customize->add_control( new $define['type']( $wp_customize, $control, isset( $define['args'] ) ? $define['args'] : array() ) );
				} else {
					$wp_customize->add_control( $control, $define );
				}
			}
		}
	}

	if ( ! $wp_customize ) {
		return $theme_options;
	}
}
add_action( 'customize_register', 'wr_corsa_theme_options' );

/**
 * Sanitizes the general.
 *
 * @since 1.0
 */
if ( ! function_exists( 'wr_corsa_sanitize_cb' ) ) {
	function wr_corsa_sanitize_cb( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
}

/**
 * Sanitizes the checkbox.
 *
 * @since 1.0
 */
if ( ! function_exists( 'wr_corsa_sanitize_checkbox' ) ) {
	function wr_corsa_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/**
 * Sanitizes the color schemes.
 *
 * @since 1.0
 */
if ( ! function_exists( 'wr_corsa_sanitize_color_placement' ) ) {
	function wr_corsa_sanitize_color_placement( $input ) {
		$valid = array(
			'cyan'   => __( 'Cyan', 'corsa' ),
			'green'  => __( 'Green', 'corsa' ),
			'red'    => __( 'Red', 'corsa' ),
			'grey'   => __( 'Grey', 'corsa' ),
			'orange' => __( 'Orange', 'corsa' ),
			'violet' => __( 'Violet', 'corsa' ),
		);
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
}

/**
 * Sanitizes the page layout.
 *
 * @since 1.0
 */
if ( ! function_exists( 'wr_corsa_sanitize_page_layout' ) ) {
	function wr_corsa_sanitize_page_layout( $input ) {
		$valid = array(
			'main'            => __( 'Main', 'corsa' ),
			'left-main'       => __( 'Left - Main', 'corsa' ),
			'main-right'      => __( 'Main - Right', 'corsa' ),
			'left-main-right' => __( 'Left - Main - Right', 'corsa' ),
			'left-right-main' => __( 'Left - Right - Main', 'corsa' ),
			'main-left-right' => __( 'Main - Left - Right', 'corsa' )
		);
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
}

/**
 * Sanitizes the woocommerce layout.
 *
 * @since 1.0
 */
if ( ! function_exists( 'wr_corsa_sanitize_wcm_layout' ) ) {
	function wr_corsa_sanitize_wcm_layout( $input ) {
		$valid = array(
			'main'            => __( 'Main', 'corsa' ),
			'left-main'       => __( 'Left - Main', 'corsa' ),
			'main-right'      => __( 'Main - Right', 'corsa' ),
		);
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
}

/**
 * Enqueue script for custom customize control.
 */
function wr_corsa_customizer_control_js() {

	// Enqueue customizer script
	wp_enqueue_script( 'cosar-customizer-control', get_template_directory_uri() . '/assets/js/customizer-control.js', array( 'jquery', 'customize-controls' ), '', true );

	// Load customizer stylesheet.
	wp_enqueue_style( 'corsa-customizer', get_template_directory_uri() . '/assets/css/customizer.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'wr_corsa_customizer_control_js' );
