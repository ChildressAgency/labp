<?php
/**
 * Plugin Name: partners.visitlakeanna.org Core Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated.</strong>
 * Author: Childress Agency
 * Author URI: https://childressagency.com
 * Version: 1.0
 * Text Domain: labp
 */
if(!defined('ABSPATH')){ exit; }

define('LABP_PLUGIN_DIR', dirname(__FILE__));
define('LABP_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Load ACF if not already loaded
 */
if(!class_exists('acf')){
  require_once LABP_PLUGIN_DIR . '/vendors/advanced-custom-fields-pro/acf.php';
  add_filter('acf/settings/path', 'labp_acf_settings_path');
  add_filter('acf/settings/dir', 'labp_acf_settings_dir');
}

function labp_acf_settings_path($path){
  $path = plugin_dir_path(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $path;
}

function labp_acf_settings_dir($dir){
  $dir = plugin_dir_url(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $dir;
}

add_action('plugins_loaded', 'labp_load_textdomain');
function labp_load_textdomain(){
  load_plugin_textdomain('labp', false, basename(LABP_PLUGIN_DIR) . '/languages');
}

//require_once LABP_PLUGIN_DIR . '/includes/labp-create-post-types.php';
//add_action('init', 'labp_create_post_types');

add_action('acf/init', 'labp_acf_options_page');
function labp_acf_options_page(){
  acf_add_options_page(array(
    'page_title' => esc_html__('General Settings', 'labp'),
    'menu_title' => esc_html__('General Settings', 'labp'),
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}