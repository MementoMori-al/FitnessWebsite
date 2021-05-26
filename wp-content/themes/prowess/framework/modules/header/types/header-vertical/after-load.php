<?php

if ( ! function_exists( 'prowess_select_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function prowess_select_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( prowess_select_check_is_header_type_enabled( 'header-vertical', prowess_select_get_page_id() ) ) {
		add_filter( 'prowess_select_allow_sticky_header_behavior', 'prowess_select_disable_behaviors_for_header_vertical' );
		add_filter( 'prowess_select_allow_content_boxed_layout', 'prowess_select_disable_behaviors_for_header_vertical' );
	}
}