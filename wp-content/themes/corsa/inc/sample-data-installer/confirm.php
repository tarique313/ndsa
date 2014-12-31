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
<div class="form-horizontal">
	<p>
		<?php
		printf(
			__( 'This installer will make your website looks the same as <a href="http://demo.woorockets.com/%1$s" target="_blank">%2$s live demo website</a>.', 'corsa' ),
			str_replace( '-', '_', 'corsa' ),
			'<strong>' . $this->name . '</strong>'
		);
		?>
	</p>
	<div class="alert alert-warning">
		<span class="label label-danger"><?php _e( 'Important information', 'corsa' ); ?></span>
		<ul>
			<li><?php _e( 'Installing sample data will delete all data on this website.', 'corsa' ); ?></li>
			<li><?php _e( 'It is NOT recommended to install sample data on production website.', 'corsa' ); ?></li>
			<?php
			ob_start();

			TGM_Plugin_Activation::$instance->notices();

			if ( null != ob_get_clean() ) :
				printf(
					__( '<li class="message-tgma">WR Page Builder needs to be installed and activated. <b><a target="_blank" href="%1$s">Check now</a>!</b>.</li>', 'corsa' ),
					get_admin_url( '', 'themes.php?page=tgmpa-install-plugins', 'http' )
				);
			endif;
			?>
		</ul>
	</div>

	<div class="checkbox">
		<label>
			<input name="agree" value="1" id="wr-confirm-agreement" type="checkbox" />
			<?php _e( 'I agree that installing sample data will delete all content on this website', 'corsa' ); ?>
		</label>
	</div>
</div>
