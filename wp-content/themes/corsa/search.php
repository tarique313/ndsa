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

	<section id="primary" class="content-area">
		<main id="main" class="site-main" <?php wr_corsa_schema_metadata( array( 'context' => 'content' ) ); ?>>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'corsa' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/**
			 * Start the Loop
			 */
			while ( have_posts() ) : the_post();
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
			
			endwhile;

			wr_corsa_pagination();

		else :

			get_template_part( 'content', 'none' );

		endif; 
		?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</section><!-- #primary -->

<?php get_footer(); ?>
