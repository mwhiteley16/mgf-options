<?php
   /*
   Plugin Name: Mobile Growth Fellowship Options
   Description: Handles registration of custom post types, taxonomies and shortcodes so they stay safe if the theme ever needs to be changed.
   Version: 1.3
   Author: Matt Whiteley
   Author URI: http://www.whiteleydesigns.com
   License: GPL2
   */

// Path to plugin
define( 'WD_OPTIONS_PATH', WP_PLUGIN_DIR . '/' . basename( dirname( __FILE__ ) ) );

// Required files
require_once WD_OPTIONS_PATH.'/admin-css/admin-css.php';
require_once WD_OPTIONS_PATH.'/includes/mgf-posttypes.php';
require_once WD_OPTIONS_PATH.'/includes/mgf-taxonomies.php';
require_once WD_OPTIONS_PATH.'/includes/mgf-shortcodes.php';

//make sure font-awesome loads for icon fonts
add_action( 'admin_enqueue_scripts', 'wd_options_iconfont' );
function wd_options_iconfont() {
     wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), CHILD_THEME_VERSION );
}
