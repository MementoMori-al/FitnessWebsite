<?php

if ( ! function_exists( 'prowess_select_add_product_list_shortcode' ) ) {
	function prowess_select_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'ProwessCore\CPT\Shortcodes\ProductList\ProductList',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( prowess_select_core_plugin_installed() ) {
		add_filter( 'prowess_core_filter_add_vc_shortcode', 'prowess_select_add_product_list_shortcode' );
	}
}

if ( ! function_exists( 'prowess_select_add_product_list_into_shortcodes_list' ) ) {
	function prowess_select_add_product_list_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'qodef_product_list';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'prowess_select_woocommerce_shortcodes_list', 'prowess_select_add_product_list_into_shortcodes_list' );
}