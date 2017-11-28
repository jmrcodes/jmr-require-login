<?php
/*
 * Plugin Name: Development Mode Login
 * Plugin URI: https://github.com/jmrcodes/jmr-require-login
 * Description: Forces the user to login to view the site if it is in developer mode.
 * Version: 0.1.1
 * Author: James Robinson
 * Author URI: https://jmr.codes/
 * License: GPL3
 */

if ( !defined( 'ABSPATH' ) ) exit;

require 'plugin-update-checker/plugin-update-checker.php';

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/jmrcodes/jmr-require-login/',
    __FILE__,
    'jmr-require-login'
);


function jmr_require_login() {
	if ( defined('WP_LOCAL_DEV') && WP_LOCAL_DEV === true && $GLOBALS['pagenow'] !== 'wp-login.php' && false === is_user_logged_in() ) {
		auth_redirect();
		exit;
	}
}
add_action('init', 'jmr_require_login' );
