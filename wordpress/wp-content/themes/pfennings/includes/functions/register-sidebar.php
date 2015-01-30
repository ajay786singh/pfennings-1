<?php
# SIDEBAR
if (function_exists('register_sidebar')) 
{
	register_sidebar(array(
		'name'=> 'Sidebar: Blog',
		'before_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h3>',
	));
}	
?>