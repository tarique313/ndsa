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
<p>
	<?php _e( 'There are several stages involved in the process. Please be patient.', 'corsa' ); ?>
</p>
<ul id="wr-install-sample-data-processes">
	<li id="wr-install-sample-data-download-package">
		<span class="wr-title"><?php _e( 'Download sample data package.', 'corsa' ); ?></span>
		<i class="wr-loading"></i>
		<div class="wr-status alert alert-danger hide"></div>
	</li>
	<li id="wr-install-sample-data-upload-package" class="hide">
		<span class="wr-title"><?php _e( 'Upload sample data package.', 'corsa' ); ?></span>
		<i class="wr-loading"></i>
		<div class="wr-status alert alert-danger hide"></div>
	</li>
	<li id="wr-install-sample-data-required-plugins" class="hide"></li>
	<li id="wr-install-sample-data-optional-plugins" class="hide"></li>
	<li id="wr-install-sample-data-import-data" class="hide">
		<span class="wr-title"><?php _e( 'Install sample data.', 'corsa' ); ?></span>
		<i class="wr-loading"></i>
		<div class="wr-status alert alert-danger hide"></div>
	</li>
	<li id="wr-install-sample-data-demo-assets" class="hide">
		<span class="wr-title"><?php _e( 'Download demo assets.', 'corsa' ); ?></span>
		<i class="wr-loading"></i>
		<span class="download-status"></span>
		<div class="progress">
			<div class="progress-bar" role="progressbar">
				<span class="percentage">0</span>%
			</div>
		</div>
	</li>
</ul>

<div id="wr-install-sample-data-manually" class="hide">
	<form action="<?php echo esc_url( admin_url( 'admin-ajax.php?action=wr-sample-data-installer&task=upload' ) ); ?>" enctype="multipart/form-data" method="post" target="wr-upload-sample-data">
		<ol>
			<li>
				<?php _e( 'Please download sample data package manually', 'corsa' ); ?>
				<a href="<?php echo esc_url( $data ); ?>" class="btn-download" target="_blank"><?php _e( 'Download File', 'corsa' ); ?></a>
			</li>
			<li>
				<?php _e( 'Select the downloaded sample data package to install', 'corsa' ); ?>
				<input name="package" type="file" value="" />
				<br />
				<span class="wr-status alert alert-danger hide"><?php _e( 'Please select the downloaded sample data package.', 'corsa' ); ?></span>
			</li>
		</ol>
	</form>
	<?php echo '<ifr' . 'ame src="about:blank" class="hide" id="wr-upload-sample-data" name="wr-upload-sample-data"></ifra' . 'me>'; ?>
</div>

<div id="wr-install-sample-data-success-message" class="wr-success-message hide">
	<h3>
		<?php _e( 'Sample data is successfully installed', 'corsa' ); ?>
	</h3>
	<p>
		<?php
		printf(
			__( 'Congratulations, your website now looks the same as <a href="http://demo.woorockets.com/%1$s" target="_blank">%2$s live demo website</a>.', 'corsa' ),
			str_replace( '-', '_', 'corsa' ),
			'<strong>' . $this->name . '</strong>'
		);
		?>
	</p>

	<div class="wr-status alert alert-danger hide">
		<h4>
			<?php _e( 'Attention!', 'corsa' ); ?>
		</h4>
		<p>
			<?php _e( 'Sample data for following plugins could NOT be installed:', 'corsa' ); ?>
		</p>

		<div class="wr-status-message"></div>
	</div>
</div>

<div id="wr-install-sample-data-failure-message" class="wr-failure-message hide">
	<h3>
		<?php _e( 'Sample data is not successfully installed', 'corsa' ); ?>
	</h3>

	<div class="wr-status alert alert-danger">
		<div class="wr-status-message"><?php _e( 'An unknown problem was occurred while installing sample data. Please try again later.', 'corsa' ); ?></div>
	</div>
</div>
