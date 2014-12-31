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

global $post;
$post_format = get_post_format();

if ( post_password_required() ) { ?>

	<div class="entry-thumb">
		<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ); ?>" method="post">
			<input name="post_password" type="password" size="20" maxlength="20" />
		</form>
	</div><!-- .entry-thumb -->

<?php } else { ?>

	<div class="entry-thumb">
		<?php
		switch ( $post_format ):
			case 'gallery' :
				if ( get_post_gallery() ) :
					echo get_post_gallery();
				endif;
			break;
			
			default:
		?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>	
		<?php 
		break;
		endswitch;
		?>
	</div><!-- .entry-thumb -->

<?php }