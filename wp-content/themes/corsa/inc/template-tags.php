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

/**
 * Display navigation to next/previous set of posts when applicable.
 */
if ( ! function_exists( 'wr_corsa_pagination' ) ) :
	function wr_corsa_pagination( $nav_query = false ) {

		global $wp_query, $wp_rewrite;

		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		// Prepare variables
		$query        = $nav_query ? $nav_query : $wp_query;
		$max          = $query->max_num_pages;
		$current_page = max( 1, get_query_var( 'paged' ) );
		$big          = 999999;
		?>
		<nav class="page-nav cl" role="navigation">
			<?php
			echo '' . paginate_links(
				array(
					'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format'    => '?paged=%#%',
					'current'   => $current_page,
					'total'     => $max,
					'type'      => 'list',
					'prev_text' => __( '&laquo;', 'corsa' ),
					'next_text' => __( '&raquo;', 'corsa' )
				)
			) . ' ';
			?>
		</nav><!-- .page-nav -->
		<?php
	}
endif;

/**
 * Prints HTML with meta information for the current post-date/time, author, categories and comments.
 */
if ( ! function_exists( 'wr_corsa_post_meta' ) ) :
	function wr_corsa_post_meta() {
		
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$byline = sprintf(
			_x( '<i class="icon-user"></i>%s', 'post author', 'corsa' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		$posted_on = sprintf(
			_x( '<i class="icon-calendar"></i>%s', 'post date', 'corsa' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';

		// Used between list items, there is a space after the comma
		$categories_list = get_the_category_list( __( ', ', 'corsa' ) );
		if ( $categories_list ) :
			echo '<span class="cat-links">';
				printf( __( '<i class="icon-category"></i>%1$s', 'corsa' ), $categories_list );
			echo '</span>';
		endif;

		// Get comments
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) :
			echo '<span class="comments-link"><i class="icon-comments"></i>';
				comments_popup_link( __( '0 Comment', 'corsa' ), __( '1 Comment', 'corsa' ), __( '% Comments', 'corsa' ) );
			echo '</span>';
		endif;
	}
endif;

/**
 * custom function to use to open and display each comment
 */
if ( ! function_exists( 'wr_corsa_comments' ) ) :
	function wr_corsa_comments( $comment, $args, $depth ) {
	// Globalize comment object
		$GLOBALS['comment'] = $comment;

		switch ( $comment->comment_type ) :

			case 'pingback'  :
			case 'trackback' :
				?>
				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
					<p>
						<?php
						_e( 'Pingback:', 'corsa' );
						comment_author_link();
						edit_comment_link( __( 'Edit', 'corsa' ), '<span class="edit-link">', '</span>' );
						?>
					</p>
				<?php
			break;

			default :
				global $post;
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<article id="comment-<?php comment_ID(); ?>" class="comment-body" <?php wr_corsa_schema_metadata( array( 'context' => 'comment' ) ); ?>>
						<?php
						echo get_avatar( $comment, 60 );
						
						if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'corsa' ); ?></p>
						<?php endif; ?>

						<header class="comment-meta">
							<?php
							printf(
								'<cite class="comment-author" ' . wr_corsa_schema_metadata( array( 'context' => 'comment_author', 'echo' => false ) ) . '>%1$s</cite>',
								'<span ' . wr_corsa_schema_metadata( array( 'context' => 'author_name', 'echo' => false ) ) . '>' . get_comment_author_link() . '</span>',
								( $comment->user_id == $post->post_author ) ? '<span class="author-post">' . __( 'Post author', 'corsa' ) . '</span>' : ''
							);

							printf(
								'<a href="%1$s"><time ' . wr_corsa_schema_metadata( array( 'context' => 'comment_time', 'echo' => false ) ) . '>%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								sprintf( __( '%1$s at %2$s', 'corsa' ), get_comment_date(), get_comment_time() )
							);

							?>
						</header>

						<section class="comment-content comment" <?php wr_corsa_schema_metadata( array( 'context' => 'comment_text' ) ); ?>>
							<?php
							comment_text();
							?>
						</section><!-- .comment-content -->
							
						<footer>
							<div class="action-link">
								<?php
								edit_comment_link( __( '<span>Edit</span>', 'corsa' ) );
								comment_reply_link(
									array_merge(
										$args,
										array(
											'reply_text' => __( '<span>Reply</span>', 'corsa' ),
											'depth'      => $depth,
											'max_depth'  => $args['max_depth'],
										)
									)
								);
								?>
							</div><!-- .action-link -->
						</footer>
					</article><!-- #comment- -->
				<?php
			break;

		endswitch;
	}
endif;
