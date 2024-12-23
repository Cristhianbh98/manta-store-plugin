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

// Agregar un mensaje en el pie de página

add_action('wp_footer', function() {
  $current_year = date('Y');
  echo '<p style="text-align: center; font-size: small;">Manta Store - ' . $current_year . '</p>';
});

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

/* Remove purchase in website */
add_filter('woocommerce_is_purchasable', '__return_false');
