<?php
/*
  Plugin Name: Nemo Contact Form
  Plugin URI: http://syntac.id
  Description: Custom Plugin Contact form
  Version: 2.0
  Author: Willy Arisky
  Author URI: http://vulnerability.or.id
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once(plugin_dir_path(__FILE__) . '/includes/setup_db.php');
require_once(plugin_dir_path(__FILE__) . '/includes/dashboard.php');
require_once(plugin_dir_path(__FILE__) . '/includes/contact_form.php');
require_once(plugin_dir_path(__FILE__) . '/includes/submit.php');
require_once(plugin_dir_path(__FILE__) . '/includes/delete.php');
 
register_activation_hook( __FILE__, 'setup_db' );

function nemocontact_menu(){
        add_menu_page(
            'Nemo Contact',
            'Nemo Contact',
            'manage_options',
            'nemo-contact',
            'dashboard',
            'dashicons-book', 15);

        add_submenu_page(null,
	        null,
	        'Delete Contact',
	        'manage_options',
	        'delete-contact',
	        'delete_contact');
}

add_action('admin_menu', 'nemocontact_menu');

function shortcode() {
	ob_start();
	submit();
	form_contact();
	return ob_get_clean();
}

add_shortcode( 'nemo_contact', 'shortcode' );

?>