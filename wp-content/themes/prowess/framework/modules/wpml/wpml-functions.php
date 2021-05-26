<?php

if ( ! function_exists( 'prowess_select_disable_wpml_css' ) ) {
	function prowess_select_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'prowess_select_disable_wpml_css' );
}