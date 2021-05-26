<?php

if ( ! function_exists( 'prowess_select_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function prowess_select_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'prowess' );
		
		return $type;
	}
	
	add_filter( 'prowess_select_title_type_global_option', 'prowess_select_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'prowess_select_title_type_meta_boxes', 'prowess_select_set_title_standard_with_breadcrumbs_type_for_options' );
}