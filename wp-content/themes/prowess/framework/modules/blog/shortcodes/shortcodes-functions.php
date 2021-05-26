<?php

if ( ! function_exists( 'prowess_select_include_blog_shortcodes' ) ) {
	function prowess_select_include_blog_shortcodes() {
		include_once QODE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
		include_once QODE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-slider/blog-slider.php';
	}
	
	if ( prowess_select_core_plugin_installed() ) {
		add_action( 'prowess_core_action_include_shortcodes_file', 'prowess_select_include_blog_shortcodes' );
	}
}

if ( ! function_exists( 'prowess_select_add_blog_shortcodes' ) ) {
	function prowess_select_add_blog_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'ProwessCore\CPT\Shortcodes\BlogList\BlogList',
			'ProwessCore\CPT\Shortcodes\BlogSlider\BlogSlider'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( prowess_select_core_plugin_installed() ) {
		add_filter( 'prowess_core_filter_add_vc_shortcode', 'prowess_select_add_blog_shortcodes' );
	}
}

if ( ! function_exists( 'prowess_select_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function prowess_select_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( prowess_select_core_plugin_installed() ) {
		add_filter( 'prowess_core_filter_add_vc_shortcodes_custom_icon_class', 'prowess_select_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}