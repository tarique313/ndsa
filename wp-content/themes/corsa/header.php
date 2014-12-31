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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); wr_corsa_schema_metadata( array( 'context' => 'body' ) ); ?>>
<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header cl" <?php wr_corsa_schema_metadata( array( 'context' => 'header' ) ); ?>>

		<div class="header-top cl">
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'top_menu',
						'container'       => 'nav',
						'container_class' => 'top-navigation',
						'menu_id'         => 'menu-top',
						'fallback_cb'     => '',
					)
				);
			
				if ( class_exists( 'Woocommerce' ) ) {
					wr_corsa_cart_in_header();
				}
			?>
			<!--<div class="search-box">
				<i class="icon-search"></i>
				<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input name="s" type="text" size="20" maxlength="20" />
					<button type="submit" value=""><i class="icon-search"></i></button>
				</form>
			</div><!-- .search-box -->
			<div class="site-network">
				<?php echo wr_corsa_social_channel(); ?>
			</div><!-- site-network -->		
		</div><!-- .header-top -->
		
		<div class="header-bot cl">
			<div class="site-branding">
				<?php wr_corsa_logo(); ?>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<nav id="site-navigation" class="main-navigation" <?php wr_corsa_schema_metadata( array( 'context' => 'nav' ) ); ?>>
				<button class="menu-toggle"><i class="dashicons dashicons-menu"></i></button>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main_menu',
							'container'      => false,
							'menu_id'        => 'menu-main',
							'fallback_cb'    => '',
						)
					);
				?>
			</nav><!-- #site-navigation -->
		</div><!-- .header-bot -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
