<?php
/*
 * Plugin Name: Development Mode Login
 * Plugin URI: https://jmr.codes/
 * Description: Forces the need for the user to login to view the site if it is in developer mode.
 * Version: 0.1
 * Author: James Robinson
 * Author URI: https://jmr.codes/
 * License: GPL2
 */

if ( !defined( 'ABSPATH' ) ) exit;

function jmr_require_login() {
	if ( defined('WP_LOCAL_DEV') && WP_LOCAL_DEV === true && $GLOBALS['pagenow'] !== 'wp-login.php' && false === is_user_logged_in() ) {
		auth_redirect();
		exit;
	}
}
add_action('init', 'jmr_require_login' );
