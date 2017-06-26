<?PHP
/*
Plugin Name: Before And After Gallery nc
Description: Shows up Gallery as "Before And After"
Version: 1.0
Author: Nicolas Menescardi
*/

//Exit if accessed Directly
if(!defined('ABSPATH')){
	exit;
}


//Load CPT
require_once(plugin_dir_path(__FILE__) . '/includes/baagnc-cpt.php');

//Load Shortcodes
require_once(plugin_dir_path(__FILE__) . '/includes/baagnc-shortcodes.php');



function baagnc_enqueue_styles(){
    wp_enqueue_style('baagnc-css',  plugins_url('css/baagnc-css.css', __FILE__));	
}
add_action('wp_print_styles', 'baagnc_enqueue_styles');

