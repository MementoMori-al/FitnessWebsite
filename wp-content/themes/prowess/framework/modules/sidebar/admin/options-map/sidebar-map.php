<?php

if ( ! function_exists( 'prowess_select_sidebar_options_map' ) ) {
	function prowess_select_sidebar_options_map() {
		
		prowess_select_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'prowess' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = prowess_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'prowess' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		prowess_select_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'prowess' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'prowess' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => prowess_select_get_custom_sidebars_options()
		) );
		
		$prowess_custom_sidebars = prowess_select_get_custom_sidebars();
		if ( count( $prowess_custom_sidebars ) > 0 ) {
			prowess_select_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'prowess' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'prowess' ),
				'parent'      => $sidebar_panel,
				'options'     => $prowess_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'prowess_select_options_map', 'prowess_select_sidebar_options_map', 9 );
}