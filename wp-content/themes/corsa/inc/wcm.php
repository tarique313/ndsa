<?php
/**
 * @version    $Id$
 * @package    WR_Theme_Framework
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2014 WooRockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

/**
 * Ajax loading price for header shoping cart
 */
if ( ! function_exists( 'wr_corsa_cart_in_header' ) ) {
	function wr_corsa_cart_in_header() {
		global $woocommerce;

		$cart_total = apply_filters( 'add_to_cart_fragments' , array() );

		echo '<div class="header-cart">';
		echo $cart_total['a.cart-control'];
		echo '<div class="cart-content">';
		echo '<h4>';
		echo sprintf( _n( '<strong>%d Item</strong> In The Shopping Cart', '<strong>%d Items</strong> In The Shopping Cart',
			$woocommerce->cart->cart_contents_count ),
			$woocommerce->cart->cart_contents_count );
		echo '</h4>';
		echo '<div class="widget_shopping_cart_content"></div>';
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Add shopcart menu to header
 *
 * @return  array
 */
function wr_corsa_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
?>
	<a class="cart-control" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'corsa' ); ?>">
		<i class="dashicons dashicons-cart"></i>
		<?php echo $woocommerce->cart->get_cart_total(); ?>
	</a>
<?php
	$fragments['a.cart-control'] = ob_get_clean();
	return $fragments;
}
add_filter( 'add_to_cart_fragments', 'wr_corsa_header_add_to_cart_fragment' );

/**
 * Register sidebars for shop page.
 *
 * @var  array
 */
function wr_corsa_widgets_woocommerce_init() {
	register_sidebar( array(
		'name'          => __( 'WooCommerce Sidebar', 'corsa' ),
		'id'            => 'wcm',
		'description'   => 'This sidebar was display only if WooCommerce activate.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wr_corsa_widgets_woocommerce_init' );

/**
 * Enqueue custom style
 */
function wr_corsa_enqueue_woocommerce_style() {
	// Register and enqueue custom style sheet.
	wp_enqueue_style( 'wr-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css' );
}
add_action( 'wp_enqueue_scripts', 'wr_corsa_enqueue_woocommerce_style' );