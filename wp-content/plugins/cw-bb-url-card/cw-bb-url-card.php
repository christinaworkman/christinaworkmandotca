<?php
/**
 * Plugin Name: CW BB Url Card
 * Plugin URI: https://github.com/christinaworkman/cw-bb-url-card
 * Description: Custom module for the Beaver Builder Plugin to create a card view for any url.
 * Version: 1.0
 * Author: Christina Workman
 * Author URI: https://christinaworkman.ca
 */
define( 'CW_BB_URL_CARD_DIR', plugin_dir_path( __FILE__ ) );
define( 'CW_BB_URL_CARD_URL', plugins_url( '/', __FILE__ ) );

function cw_load_module_examples() {
  if ( class_exists( 'FLBuilder' ) ) {
    require_once 'cw-url-card/cw-url-card.php';
  }
}
add_action( 'init', 'cw_load_module_examples' );