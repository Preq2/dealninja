<?php
/*
    Plugin Name: Deal Ninja WP
    Plugin URI: www.dealninja.com
    Description: Custom Plugin for Deal Calculations
    Version: 1.0.1
    Author: Levar Berry
    Author URI: www.edrivenapps.com
    License: Commerical
*/

    function wp_dealninja_menu() {
    	add_menu_page( 'Core Plugin for Deal Ninja Functions', 'DealNinja', 'manage_options', 'dealninja', 'dealninja_opt_admin' );
    }

    add_action('admin_menu','wp_dealninja_menu');
    add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );

    function dealninja_opt_admin() {
    	include_once('dealninja-admin.php');
    }

    function show_text() {
    	echo get_option('hello_text');
    }

    function show_hello_text() {
    	return get_option('hello_text');
    }

    function show_dealer_dashboard() {
    	include_once('dealninja-dashboard.php');
    }

    function show_dealer_banks() {
        include_once('dealninja-banks.php');
    }

    function show_dealer_inventory() {
        include_once('dealninja-inventory.php');
    }
    //Add Shortcodes 
    add_shortcode('dealninja', 'show_hello_text');
    add_shortcode('dealninja_dashboard', 'show_dealer_dashboard');
    add_shortcode('dealninja_banks', 'show_dealer_banks');
    add_shortcode('dealninja_inventory','show_dealer_inventory');

?>