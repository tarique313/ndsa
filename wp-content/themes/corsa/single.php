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
			/**
			 * Start the Loop
			 */
			while ( have_posts() ) : the_post();
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-single.php and that will be used instead.
				 */
				get_template_part( 'content', 'single' );

				?>

				<nav class="single-nav cl" role="navigation">
					<?php
						previous_post_link( '<div class="prev">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'corsa' ) );
						next_post_link(     '<div class="next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'corsa' ) );
					?>
				</nav><!-- .single-nav -->
				
				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			
			endwhile; // end of the loop. ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>