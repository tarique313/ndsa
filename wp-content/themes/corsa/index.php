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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" <?php wr_corsa_schema_metadata( array( 'context' => 'content' ) ); ?>>

		<?php
			if ( have_posts() ) :
				/**
				 * Start the Loop
				 */
				while ( have_posts() ) : the_post();
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content.php and that will be used instead.
					 */
					get_template_part( 'content' );

				endwhile;

					wr_corsa_pagination();

			else :

				get_template_part( 'content', 'none' );

			endif;
		?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>
		
	</div><!-- #primary -->

<?php get_footer(); ?>
