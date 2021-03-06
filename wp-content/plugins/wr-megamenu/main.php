<?php
/*
Plugin Name: WR MegaMenu
Plugin URI: http://woorockets.com
Description: WR MegaMenu
Version: 1.0.3
Author: WooRockets
Author URI: http://woorockets.com
License: GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
// Load class auto-loader
require_once dirname( __FILE__ ) . '/includes/loader.php';

// Include constant definition file
include_once dirname( __FILE__ ) . '/defines.php';

// Register WR MegaMenu Plugin initialization
add_action( 'wr_megamenu_init', array( 'WR_Megamenu_Plugin', 'init' ) );
// Initialize WR Library
WR_Megamenu_Init_Plugin::hook();
