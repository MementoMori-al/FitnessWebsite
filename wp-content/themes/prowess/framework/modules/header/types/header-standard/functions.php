<?php

if ( ! function_exists( 'prowess_select_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function prowess_select_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'Prowess\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'prowess_select_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function prowess_select_init_register_header_standard_type() {
		add_filter( 'prowess_select_register_header_type_class', 'prowess_select_register_header_standard_type' );
	}
	
	add_action( 'prowess_select_before_header_function_init', 'prowess_select_init_register_header_standard_type' );
}