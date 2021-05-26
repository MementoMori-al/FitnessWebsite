<?php

if ( ! function_exists( 'prowess_select_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function prowess_select_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'prowess' ),
				'description'   => esc_html__( 'Default Sidebar', 'prowess' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="qodef-widget-title-holder"><h5 class="qodef-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'prowess_select_register_sidebars', 1 );
}

if ( ! function_exists( 'prowess_select_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates ProwessSidebar object
	 */
	function prowess_select_add_support_custom_sidebar() {
		add_theme_support( 'ProwessSidebar' );
		
		if ( get_theme_support( 'ProwessSidebar' ) ) {
			new ProwessSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'prowess_select_add_support_custom_sidebar' );
}