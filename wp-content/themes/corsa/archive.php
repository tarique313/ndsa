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
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'corsa' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'corsa' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'corsa' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'corsa' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'corsa' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'corsa' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'corsa' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'corsa' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'corsa' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'corsa' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'corsa' );

						else :
							_e( 'Archives', 'corsa' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

		<?php
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

	</section><!-- #primary -->

<?php get_footer(); ?>
