<?php

/**
* Enqueue scripts
*/

function my_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'map', 'http://maps.google.com/maps/api/js?sensor=true', array(), '1.0.0', false);
	wp_enqueue_script( 'app', get_template_directory_uri() . '/dist/js/app.min.js', array(), '1.0.0', false);
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );
?>