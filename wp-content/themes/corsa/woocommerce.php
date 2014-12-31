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

get_header();

$wcm_sidebar = wr_corsa_theme_option( 'wr_wcm_layout' );

switch ( $wcm_sidebar ) {
	case 'main':
		$classes[] = 'wcm-full';
		break;

	case 'left-main':
		$classes[] = 'wcm-sidebar-left';
		break;

	case 'main-right':
		$classes[] = 'wcm-sidebar-right';
		break;
	default: 
		$classes[] = '';
}
?>

	<div id="primary" class="content-area <?php echo $classes[0]; ?>">

		<main class="wcm-main">
			<?php woocommerce_content(); ?>
		</main><!-- #main -->
		
		<?php

		if ( 'left-main' == $wcm_sidebar || 'main-right' == $wcm_sidebar ) { ?>

			<div class="wcm-sidebar">
				<?php dynamic_sidebar( 'wcm' ); ?>
			</div>

		<?php } ?>
		
	</div><!-- #primary -->

<?php get_footer(); ?>
