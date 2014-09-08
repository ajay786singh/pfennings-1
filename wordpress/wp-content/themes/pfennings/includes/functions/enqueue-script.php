<?php

/**
* Enqueue scripts
*/

function my_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', includes_url(). 'js/jquery/jquery.js', null, '1.11.1',true);
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.min.js', array('jquery'), '2.0', true);
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );

?>