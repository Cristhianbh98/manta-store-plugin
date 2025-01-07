<?php
/*
Plugin Name: Manta Store
Plugin URI: https://github.com/Cristhianbh98
Description: Un plugin básico para añadir funcionalidades a la página de Manta Store.
Version: 1.0
Author: Cristhian Bacusoy
Author URI: https://github.com/Cristhianbh98
License: GPL2
*/

// Evitar el acceso directo al archivo
if (!defined('ABSPATH')) {
  exit;
}

// Registrar y encolar el archivo CSS
function mi_plugin_enqueue_styles() {
  wp_enqueue_style(
    'manta-store-styles',
    plugin_dir_url(__FILE__) . '/style.css',
    array(),
    '1.0', 
    'all'
  );
}

add_action('wp_enqueue_scripts', 'mi_plugin_enqueue_styles');

// Inclues
require_once plugin_dir_path(__FILE__) . 'inc/woocommerce.php';
