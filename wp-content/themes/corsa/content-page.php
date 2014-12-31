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

<article id="post-<?php the_ID(); ?>" <?php post_class(); wr_corsa_schema_metadata( array( 'context' => 'entry' ) ); ?>>
	<!--<header class="entry-header">
		<?php the_title( '<h2 class="entry-title" ' . wr_corsa_schema_metadata( array( 'context' => 'entry_title', 'echo' => false ) ) . '>', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" <?php wr_corsa_schema_metadata( array( 'context' => 'entry_content' ) ); ?>>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'corsa' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
