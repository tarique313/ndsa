<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

$related = $product->get_related(12);

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => 12,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="product-related">
		<?php
		echo '<scr' . 'ipt>';
			echo 'jQuery(document).ready(function (e) {
			    var owl = e(".relate-item");
			    owl.owlCarousel({
			        itemsCustom : [
			            [0, 1],
			            [550, 2],
			            [700, 3],
			            [1200, 4]
			            ],
			        navigation : false
			    });
			});' ?>
		<?php
		echo '</scr' . 'ipt>';
		woocommerce_product_loop_start();
		?>

		<h2><?php _e( 'Products Related', 'corsa' ); ?></h2>
		
			<div class="owl-carousel relate-item">
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>
			</div>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
