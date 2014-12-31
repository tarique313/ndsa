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
 * Count the number of bottom sidebars to enable dynamic classes for the bottom
 *
 * @package Corsa
 */
function wr_corsa_bottom_sidebar_class() {
	// Count sidebar is enabled
	$count = 0;

	if ( is_active_sidebar( 'bottom-1' ) )
		$count++;

	if ( is_active_sidebar( 'bottom-2' ) )
		$count++;

	if ( is_active_sidebar( 'bottom-3' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'columns twelve';
			break;
		case '2':
			$class = 'columns six';
			break;
		case '3':
			$class = 'columns four';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function wr_corsa_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'corsa' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'wr_corsa_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function wr_corsa_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'wr_corsa_setup_author' );

/**
 * Output the new logo to header
 *
 * @package Corsa
 */
function wr_corsa_logo() {
	if ( 'logo_image' == wr_corsa_theme_option( 'wr_logo_type' ) ) : ?>

		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( wr_corsa_theme_option( 'wr_logo_image' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>

	<?php else : ?>

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

	<?php endif;
}

/**
 * Jetpack social channels renderer.
 *
 * @package Corsa
 */
function wr_corsa_social_channel() {

	$channels = array( 'facebook', 'twitter', 'linkedin', 'google_plus', 'tumblr' );

	$list = array();
	foreach ( $channels as $value ) {
		$mod_val = wr_corsa_theme_option( 'jetpack-' . $value );

		if ( $mod_val ) {
			$list[] = sprintf( '<li><a href="%s" title="%s" target="_blank"><i class="icon-%s"></i></a></li>', esc_url ( $mod_val ), ucfirst( $value ), $value );
		}
	}
	$html = '';
	if ( $list ) :
		$html .= '<ul class="social">';
		$html .= implode( '', $list );
		$html .= '</ul>';
	endif;
	
	return $html;

}
add_action( 'wp_head', 'wr_corsa_social_channel' );

/**
 * Print custom code at the end of head section.
 *
 * @package Corsa
 */
function wr_corsa_custom_head() {
	if ( wr_corsa_theme_option( 'wr_code_at_end_of_head' ) ) :
		echo '' . wr_corsa_theme_option( 'wr_code_at_end_of_head' ) . "\n";
	endif;
}
add_action( 'wp_head', 'wr_corsa_custom_head', 999 );

/**
 * Print custom code at the end of body section.
 *
 * @package Corsa
 */
function wr_corsa_custom_footer() {
	if ( wr_corsa_theme_option( 'wr_code_at_end_of_body' ) ) :
		echo '' . wr_corsa_theme_option( 'wr_code_at_end_of_body' ) . "\n";
	endif;
}
add_action( 'wp_footer', 'wr_corsa_custom_footer' );

/**
 * Print custom style of header image.
 *
 * @package Corsa
 */
function wr_corsa_custom_header_image() {
	if ( get_header_image() ) : ?>
		
		<style>
			.header-bot {
				background: url('<?php header_image(); ?>') no-repeat 0 0;
			}
		</style>

	<?php
	endif;
}
add_action( 'wp_head', 'wr_corsa_custom_header_image' );

/**
 * Redirect to offline page
 *
 * @package Corsa
 */
function wr_corsa_maintenance_mode() {
	// Check if maintenance mode is enabled
	if ( wr_corsa_theme_option( 'wr_maintenance_mode' ) ) {
		if ( ! is_feed() ) {
			// Check if user is not logged in
			if ( ! is_user_logged_in() ) {
				// Load message for maintenance
				include get_template_directory() . '/offline.php';
				exit;
			}
		}

		// Check if user is logged in
		if ( is_user_logged_in() ) {
			global $current_user;

			// Get user role
			get_currentuserinfo();

			$loggedInUserID = $current_user->ID;
			$userData = get_userdata( $loggedInUserID );

			// If user role is not 'administrator' then redirect to coming soon page
			if ( 'administrator' != $userData->roles[0] ) {
				if ( ! is_feed() ) {
					include get_template_directory() . '/offline.php';

					exit;
				}
			}
		}
	}
}
add_action( 'template_redirect', 'wr_corsa_maintenance_mode' );

/**
 * Adds offline classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wr_corsa_maintenance_mode_body_class( $classes ) {
	if ( wr_corsa_theme_option( 'wr_maintenance_mode' ) ) {
		if ( ! is_feed() ) {
			// Check if user is not logged in
			if ( ! is_user_logged_in() ) {
				$classes[] = 'offline';
			}
		}
	}
	return $classes;
}
add_filter( 'body_class', 'wr_corsa_maintenance_mode_body_class' );

/**
 * Register required plugins.
 *
 * @return  void
 */
function wr_corsa_register_theme_dependency() {
	$plugins = array(
		array(
			'name'     => 'WR PageBuilder',
			'slug'     => 'wr-pagebuilder',
			'required' => true,
		),
		array(
			'name'     => 'Advanced Custom Fields',
			'slug'     => 'advanced-custom-fields',
			'required' => true,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		)
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'wr_corsa_register_theme_dependency' );