<?php

class WC_Custom {
  function __construct() {
    add_action('woocommerce_single_product_summary', array($this, 'add_ws_button'), 25);
    add_action('pre_get_posts', array($this, 'force_search_to_products'));
  }

  function force_search_to_products($query) {
    if ($query->is_search() && !is_admin() && $query->is_main_query()) {
      if (!isset($_GET['post_type']) || $_GET['post_type'] !== 'product') {
        $query->set('post_type', 'product');
      }
    }
  }
}

new WC_Custom();