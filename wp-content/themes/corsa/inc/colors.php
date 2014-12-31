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
 * Customizer Color Schemes CSS Output
 *
 * @package Corsa
 */
function wr_corsa_color_schemes_output() {
	// Get theme options
	$color = wr_corsa_theme_option( 'wr_color_schemes' );

	if ( 'green' == $color ) : ?>

		<style>
			body, button, input[type="button"], input[type="reset"], input[type="submit"], .header-top, .page-nav li .current, .page-nav li a:hover, .comments-area .action-link a:hover, .comment-respond .comment-form .form-submit input[type="submit"]:hover, .widget #wp-calendar caption, .page-offline footer {
				background-color: #78bfa4;
			}
			a, #menu-main li.current-menu-item > a, #menu-main li a:hover, .format-standard .entry-title a, .format-standard .entry-title i, .entry-meta i, .entry-meta a:hover, .widget a:hover, .site-footer a, #menu-top li .sub-menu li a:hover {
				color: #78bfa4;
			}
			.search-box form input[type="text"], .format-standard .entry-title a, .format-standard .entry-title i, .comments-area .comment-body, .comment-respond .comment-form [class*="comment-form"] input:focus, .comment-respond .comment-form .comment-form-comment textarea:focus, .widget input:focus {
				border-color: #78bfa4;
			}
			blockquote, address, q {
				border-left: 3px solid #78bfa4;
			}
			.content-bottom .widget ul li {
				background: url("<?php echo get_template_directory_uri() . '/assets/img/icons/dot-white.png' ?>") no-repeat left 8px;
			}
			.page-offline .countdown li {
				border-color: #78bfa4 #eee #eee;
			}
			.content-bottom {
				background: #18704e;
			}
		</style>

	<?php elseif ( 'red' == $color ) : ?>

		<style>
			body, button, input[type="button"], input[type="reset"], input[type="submit"], .header-top, .page-nav li .current, .page-nav li a:hover, .comments-area .action-link a:hover, .comment-respond .comment-form .form-submit input[type="submit"]:hover, .widget #wp-calendar caption, .page-offline footer {
				background-color: #a65a5a;
			}
			a, #menu-main li.current-menu-item > a, #menu-main li a:hover, .format-standard .entry-title a, .format-standard .entry-title i, .entry-meta i, .entry-meta a:hover, .widget a:hover, .site-footer a, #menu-top li .sub-menu li a:hover {
				color: #bbb;
			}
			.search-box form input[type="text"], .format-standard .entry-title a, .format-standard .entry-title i, .comments-area .comment-body, .comment-respond .comment-form [class*="comment-form"] input:focus, .comment-respond .comment-form .comment-form-comment textarea:focus, .widget input:focus {
				border-color: #a65a5a;
			}
			blockquote, address, q {
				border-left: 3px solid #a65a5a;
			}
			.content-bottom .widget ul li {
				background: url("<?php echo get_template_directory_uri() . '/assets/img/icons/dot-white.png' ?>") no-repeat left 8px;
			}
			.page-offline .countdown li {
				border-color: #a65a5a #eee #eee;
			}
			.content-bottom {
				background: #c45252;
			}
			.content-bottom a:hover {
				color: #efa3a3;
			}
		</style>

	<?php elseif ( 'grey' == $color ) : ?>

		<style>
			body, button, input[type="button"], input[type="reset"], input[type="submit"], .header-top, .page-nav li .current, .page-nav li a:hover, .comments-area .action-link a:hover, .comment-respond .comment-form .form-submit input[type="submit"]:hover, .widget #wp-calendar caption, .page-offline footer {
				background-color: #aaa;
			}
			a, #menu-main li.current-menu-item > a, #menu-main li a:hover, .format-standard .entry-title a, .format-standard .entry-title i, .entry-meta i, .entry-meta a:hover, .widget a:hover, .site-footer a, #menu-top li .sub-menu li a:hover {
				color: #aaa;
			}
			.search-box form input[type="text"], .format-standard .entry-title a, .format-standard .entry-title i, .comments-area .comment-body, .comment-respond .comment-form [class*="comment-form"] input:focus, .comment-respond .comment-form .comment-form-comment textarea:focus, .widget input:focus {
				border-color: #aaa;
			}
			blockquote, address, q {
				border-left: 3px solid #aaa;
			}
			.page-offline .countdown li {
				border-color: #aaa #eee #eee;
			}
			.content-bottom {
				background: #333;
			}
		</style>

	<?php elseif ( 'orange' == $color ) : ?>

		<style>
			body, button, input[type="button"], input[type="reset"], input[type="submit"], .header-top, .page-nav li .current, .page-nav li a:hover, .comments-area .action-link a:hover, .comment-respond .comment-form .form-submit input[type="submit"]:hover, .widget #wp-calendar caption, .page-offline footer {
				background-color: #ffc08b;
			}
			a, #menu-main li.current-menu-item > a, #menu-main li a:hover, .format-standard .entry-title a, .format-standard .entry-title i, .entry-meta i, .entry-meta a:hover, .widget a:hover, .site-footer a, #menu-top li .sub-menu li a:hover {
				color: #ffc08b;
			}
			.search-box form input[type="text"], .format-standard .entry-title a, .format-standard .entry-title i, .comments-area .comment-body, .comment-respond .comment-form [class*="comment-form"] input:focus, .comment-respond .comment-form .comment-form-comment textarea:focus, .widget input:focus {
				border-color: #ffc08b;
			}
			blockquote, address, q {
				border-left: 3px solid #ffc08b;
			}
			.content-bottom .widget ul li {
				background: url("<?php echo get_template_directory_uri() . '/assets/img/icons/dot-white.png' ?>") no-repeat left 8px;
			}
			.page-offline .countdown li {
				border-color: #ffc08b #eee #eee;
			}
			.content-bottom {
				background: #f67d42;
			}
		</style>

	<?php elseif ( 'violet' == $color ) : ?>

		<style>
			body, button, input[type="button"], input[type="reset"], input[type="submit"], .header-top, .page-nav li .current, .page-nav li a:hover, .comments-area .action-link a:hover, .comment-respond .comment-form .form-submit input[type="submit"]:hover, .widget #wp-calendar caption, .page-offline footer {
				background-color: #673a61;
			}
			a, #menu-main li.current-menu-item > a, #menu-main li a:hover, .format-standard .entry-title a, .format-standard .entry-title i, .entry-meta i, .entry-meta a:hover, .widget a:hover, .site-footer a, #menu-top li .sub-menu li a:hover {
				color: #673a61;
			}
			.search-box form input[type="text"], .format-standard .entry-title a, .format-standard .entry-title i, .comments-area .comment-body, .comment-respond .comment-form [class*="comment-form"] input:focus, .comment-respond .comment-form .comment-form-comment textarea:focus, .widget input:focus {
				border-color: #673a61;
			}
			blockquote, address, q {
				border-left: 3px solid #673a61;
			}
			.content-bottom .widget ul li {
				background: url("<?php echo get_template_directory_uri() . '/assets/img/icons/dot-white.png' ?>") no-repeat left 8px;
			}
			.page-offline .countdown li {
				border-color: #673a61 #eee #eee;
			}
			.content-bottom {
				background: #6a143f;
			}
			.content-bottom a:hover {
				color: #9e7198;
			}
		</style>

	<?php endif;
}
add_action( 'wp_head', 'wr_corsa_color_schemes_output', 100001 );