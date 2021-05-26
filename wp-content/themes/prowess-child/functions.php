<?php

/*** Child Theme Function  ***/

if ( !function_exists('prowess_select_child_theme_enqueue_scripts') ) {
	function prowess_select_child_theme_enqueue_scripts() {
		
		$parent_style = 'prowess-select-default-style';
		
		wp_enqueue_style('prowess-select-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
	}
	
	add_action('wp_enqueue_scripts', 'prowess_select_child_theme_enqueue_scripts');
}