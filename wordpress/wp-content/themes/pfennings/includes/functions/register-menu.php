<?php

/**
* Register Wordpress menus
*/

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      '404-page-menu' => __( '404 Page Menu' )
    )
  );
}

add_action( 'init', 'register_my_menus' );

?>