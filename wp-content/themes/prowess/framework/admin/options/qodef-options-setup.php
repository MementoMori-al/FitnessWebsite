<?php

if ( ! function_exists( 'prowess_select_admin_map_init' ) ) {
	function prowess_select_admin_map_init() {
		do_action( 'prowess_select_before_options_map' );
		
		require_once QODE_FRAMEWORK_ROOT_DIR . '/admin/options/fonts/map.php';
		require_once QODE_FRAMEWORK_ROOT_DIR . '/admin/options/general/map.php';
		require_once QODE_FRAMEWORK_ROOT_DIR . '/admin/options/page/map.php';
		require_once QODE_FRAMEWORK_ROOT_DIR . '/admin/options/social/map.php';
		require_once QODE_FRAMEWORK_ROOT_DIR . '/admin/options/reset/map.php';
		
		do_action( 'prowess_select_options_map' );
		
		do_action( 'prowess_select_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'prowess_select_admin_map_init', 1 );
}