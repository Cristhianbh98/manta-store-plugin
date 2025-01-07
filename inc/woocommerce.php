<?php

class WC_Custom {
  function __construct() {
    add_action('woocommerce_single_product_summary', array($this, 'add_ws_button'), 25);
    add_action('template_redirect', array($this, 'redirect_search_if_no_post_type'));
  }

  function redirect_search_if_no_post_type() {
    if (is_search() && !is_admin()) {
      if (!isset($_GET['post_type']) || $_GET['post_type'] !== 'product') {
        $search_query = get_query_var('s');
        
        $redirect_url = add_query_arg(
          array(
            's' => urlencode($search_query),
            'post_type' => 'product'
          ),
          home_url('/')
        );

        wp_redirect($redirect_url);
        exit;
      }
    }
  }
}

new WC_Custom();