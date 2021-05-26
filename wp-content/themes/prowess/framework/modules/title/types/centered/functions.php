<?php

if ( ! function_exists( 'prowess_select_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function prowess_select_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'prowess' );
		
		return $type;
	}
	
	add_filter( 'prowess_select_title_type_global_option', 'prowess_select_set_title_centered_type_for_options' );
	add_filter( 'prowess_select_title_type_meta_boxes', 'prowess_select_set_title_centered_type_for_options' );
}