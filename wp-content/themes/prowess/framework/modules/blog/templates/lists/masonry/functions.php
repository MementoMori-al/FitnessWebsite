<?php

if ( ! function_exists( 'prowess_select_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function prowess_select_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'prowess' );
		
		return $templates;
	}
	
	add_filter( 'prowess_select_register_blog_templates', 'prowess_select_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'prowess_select_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function prowess_select_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'prowess' );
		
		return $options;
	}
	
	add_filter( 'prowess_select_blog_list_type_global_option', 'prowess_select_set_blog_masonry_type_global_option' );
}