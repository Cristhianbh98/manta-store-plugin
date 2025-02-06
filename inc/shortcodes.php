<?php

class Shortcodes {
  function __construct() {
    add_shortcode('ws_button', array($this, 'ws_button'));
  }

  function ws_button() {
    global $product;
    
    /* if ($product) {
      $categories = wp_get_post_terms($product->get_id(), 'product_cat');
      $phone_number = '';
  
      if (!empty($categories) && !is_wp_error($categories)) {
        $brand_category = null;

        foreach($categories as $category) {
          if ($category->parent > 0) {
            $parent_category = get_term($category->parent, 'product_cat');

            if ($parent_category && $parent_category->slug === 'marca') {
              $brand_category = $category;
              break;
            }
          }
        }

        if ($brand_category) {
          $phone_number = get_term_meta($brand_category->term_id, 'phone_number', true);

          $product_name = $product->get_name();
          $product_price = $product->get_price();
      
          $ws_uri = 'https://api.whatsapp.com/send?phone=' . $phone_number . '&text=¡Hola!%20Estoy%20interesado%20en%20el%20producto%20' . $product_name . '%20que%20tiene%20un%20precio%20de%20' . $product_price . '%20dólares.';
      
          return '<a href="' . $ws_uri . '" class="ws-button" target="_blank">
                  <button>
                    <i class="fab fa-whatsapp"></i>
                    ¡Lo quiero!
                  </button>
                </a>';
        }
      } 
    } */

    $product_name = $product->get_name();
    $product_price = $product->get_price(); 
    $ws_uri = 'https://api.whatsapp.com/send?phone=593969279189&text=¡Hola!%20Estoy%20interesado%20en%20el%20producto%20' . $product_name . '%20que%20tiene%20un%20precio%20de%20' . $product_price . '%20dólares.';

    return '<a href="' . $ws_uri . '" class="ws-button" target="_blank">
              <button>
                <i class="fab fa-whatsapp"></i>
                ¡Lo quiero!
              </button>
            </a>';
  }  
}

new Shortcodes();
