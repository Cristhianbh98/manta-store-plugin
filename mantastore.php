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

/* Add ws button to single product */

function add_ws_button() {
  global $product;
  
  if ($product) {
    $categories = wp_get_post_terms($product->get_id(), 'product_cat');

    $phone_number = '';

    if (!empty($categories) && !is_wp_error($categories)) {
      $category = $categories[0];
      $phone_number = get_term_meta($category->term_id, 'phone_number', true);      
    }

    $product_name = $product->get_name();
    $product_price = $product->get_price();

    $ws_uri = 'https://api.whatsapp.com/send?phone=' . $phone_number . '&text=¡Hola!%20Estoy%20interesado%20en%20el%20producto%20' . $product_name . '%20que%20tiene%20un%20precio%20de%20' . $product_price . '%20dólares.';

    echo '<a href="' . $ws_uri . '" class="ws-button" target="_blank">
            <button>
              <i class="fab fa-whatsapp"></i>
              ¡Saber más!
            </button>
          </a>
    ';
  }
}

add_action('woocommerce_single_product_summary', 'add_ws_button', 25);
