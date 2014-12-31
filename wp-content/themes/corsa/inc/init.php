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
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

if ( ! function_exists( 'wr_corsa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0
 */
function wr_corsa_setup() {

	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on corsa, use a find and replace
	 * to change 'corsa' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'corsa', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 *
	 * @link http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'gallery', 'video', 'quote', 'audio',
	) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'wr_corsa_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Setup the WordPress core custom header image.
	 */
	add_theme_support( 'custom-header', array(
		// Header text display default
		'header-text' => false,
		// Header image flex width
		'flex-width'  => true,
		// Header image width (in pixels)
		'width'       => 1170,
		// Header image flex height
		'flex-height' => true,
		// Header image height (in pixels)
		'height'      => 130,
	) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( array(
		'main_menu'   => __( 'Main Menu', 'corsa' ),
		'top_menu'    => __( 'Top Menu', 'corsa' ),
		'footer_menu' => __( 'Footer Menu', 'corsa' ),
	) );

	/**
	 * Tell the TinyMCE editor to use a custom stylesheet
	 */
	add_editor_style( 'assets/css/editor-style.css' );

	/**
	 * Support woocommerce plugin for theme
	 */
	add_theme_support( 'woocommerce' );

}
endif; // wr_corsa_setup
add_action( 'after_setup_theme', 'wr_corsa_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @since 1.0
 */
function wr_corsa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'corsa' ),
		'id'            => 'primary-sidebar',
		'description'   => 'This is the primary sidebar if you are using a two or three column site layout option.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'corsa' ),
		'id'            => 'secondary-sidebar',
		'description'   => 'This is the secondary sidebar if you are using a two or three column site layout option.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Bottom 1', 'corsa' ),
		'id'            => 'bottom-1',
		'description'   => 'The first column in bottom area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Bottom 2', 'corsa' ),
		'id'            => 'bottom-2',
		'description'   => 'The second column in bottom area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Bottom 3', 'corsa' ),
		'id'            => 'bottom-3',
		'description'   => 'The third column in bottom area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wr_corsa_widgets_init' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since 1.0
 */
function wr_corsa_scripts() {
	// Load owl carousel stylesheet.
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/vendor/owl.carousel.css' );

	// Load our main stylesheet.
	wp_enqueue_style( 'corsa-main', get_template_directory_uri() . '/assets/css/main.css', array( 'dashicons' ) );

	// Load user custom stylesheet.
	wp_enqueue_style( 'corsa-custom', get_template_directory_uri() . '/assets/css/custom.css' );

	// Load responsive stylesheet.
	wp_enqueue_style( 'corsa-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '', 'screen' );

	// Load owl-carousel javascript.
	wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.js', array(), '', true );

	// Load our custom javascript.
	wp_enqueue_script( 'corsa-main-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '', true );

	// Adds the comment-reply JavaScript to the single post pages
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue countdown timer script if maintenance mode is enable
	if ( wr_corsa_theme_option( 'wr_maintenance_mode' ) ) {
		wp_enqueue_script( 'jquery-countdown-script', get_template_directory_uri() . '/assets/js/vendor/jquery.countdown.js', array(), '', true );
	}

	// Enqueue style of WR PageBuilder
	if ( class_exists( 'WR_Pb_Init' ) ) {
		wp_enqueue_style( 'corsa-pagebuilder', get_template_directory_uri() . '/assets/css/pagebuilder.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'wr_corsa_scripts', 10000 );

/**
 * Jetpack Compatibility File.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Filter the content width based on the user selected layout.
 */
require get_template_directory() . '/inc/layout.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * HTML5 Schema Markup initialization.
 */
require get_template_directory() . '/inc/markup.php';

/**
 * Additions color schemes for themes
 */
require get_template_directory() . '/inc/colors.php';

/**
 * Load sample data installer.
 */
require get_template_directory() . '/inc/sample-data-installer.php';

/**
 * Load TGM Plugin Activation library
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Additions field for advanced custom fields
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Additions function for woocommerce plugin.
 */
if ( class_exists( 'Woocommerce' ) ) {
	require get_template_directory() . '/inc/wcm.php';
}

/**
 * Define function to get theme option.
 *
 * @param   string  $option  Name of option to get value for.
 *
 * @return  mixed
 */
function wr_corsa_theme_option( $option ) {
	static $theme_options;

	// Get saved value for the specified option
	$value = get_theme_mod( $option, false );

	if ( false === $value ) {
		// Get all theme options
		if ( ! isset( $theme_options ) ) {
			$theme_options = wr_corsa_theme_options();
		}

		// Loop thru theme options to get default value for the specified option
		foreach ( $theme_options as $section => $define ) {
			if ( isset( $define['settings'][ $option ] ) && isset( $define['settings'][ $option ]['default'] ) ) {
				return $define['settings'][ $option ]['default'];
			}
		}
	}

	return $value;
}
