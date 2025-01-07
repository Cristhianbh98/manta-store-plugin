<?php

class WC_Custom {
  function __construct() {
    add_action('woocommerce_single_product_summary', array($this, 'add_ws_button'), 25);
    add_action('get_search_form', array($this, 'add_post_type_to_search_form'));
  }

  function add_post_type_to_search_form($form) {
    $form = str_replace(
      '</form>',
      '<input type="hidden" name="post_type" value="product" /></form>',
      $form
    );
    return $form;
  }
}

new WC_Custom();