<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';

$id               = get_the_ID();
$url              = get_the_permalink();
$title            = get_the_title();
$image_title      = esc_attr( get_the_title( get_post_thumbnail_id() ) );
$image_link_front = wp_get_attachment_url( get_post_thumbnail_id() );

$args = array(
    'post_type'      => 'attachment',
    'numberposts'    => -1,
    'post_mime_type' => 'image',
    'post_status'    => 'public',
    'posts_per_page' => 1
);
?>
	<div class="item <?php echo implode( ' ', get_post_class( $classes ) ); ?>">
		<div class="item-wrap">
			<div class="p-preview">
				
				<div class="action">
					<?php
					echo '' . apply_filters(
						'woocommerce_loop_add_to_cart_link',
						sprintf(
							'<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="add-cart button %s product_type_%s">%s</a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( $product->id ),
							esc_attr( $product->get_sku() ),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							esc_attr( $product->product_type ),
							esc_html( $product->add_to_cart_text() )
						),
						$product
					);

					echo '' . $product->get_rating_html();
					?>
				</div><!-- .action -->

				<div class="thumb">
			        <a href="<?php echo $url ?>">
				        <img src="<?php echo $image_link_front ?>" alt="<?php echo $title ?>" />
				        <img src="<?php echo $image_link_front ?>" alt="<?php echo $title ?>" />
			        </a>
		        </div><!-- .thumb -->
			</div><!-- .p-preview -->

			<div class="p-info">
				<div class="product-details">
					<a class="title" href="<?php echo $url ?>"><?php echo $title ?></a>
				</div><!-- .product-details -->
				<?php
					if ( $product->get_price_html() ) { ?>
					<div class="price">
						<span><?php echo $product->get_price_html() ?></span>
					</div>
				<?php } ?>
			</div><!-- .p-info -->
		</div><!-- .item-wrap -->
	</div><!-- .item -->
