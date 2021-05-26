<?php

if ( ! function_exists( 'prowess_select_content_bottom_options_map' ) ) {
	function prowess_select_content_bottom_options_map() {
		
		$panel_content_bottom = prowess_select_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__( 'Content Bottom Area Style', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'name'          => 'enable_content_bottom_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'prowess' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'prowess' ),
				'parent'        => $panel_content_bottom
			)
		);
		
		$enable_content_bottom_area_container = prowess_select_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'dependency' => array(
					'show' => array(
						'enable_content_bottom_area'  => 'yes'
					)
				)
			)
		);
		
		$prowess_custom_sidebars = prowess_select_get_custom_sidebars();
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'content_bottom_sidebar_custom_display',
				'default_value' => '',
				'label'         => esc_html__( 'Widget Area to Display', 'prowess' ),
				'description'   => esc_html__( 'Choose a Content Bottom widget area to display', 'prowess' ),
				'options'       => $prowess_custom_sidebars,
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'content_bottom_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Display in Grid', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'prowess' ),
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'content_bottom_background_color',
				'label'       => esc_html__( 'Background Color', 'prowess' ),
				'description' => esc_html__( 'Choose a background color for Content Bottom area', 'prowess' ),
				'parent'      => $enable_content_bottom_area_container
			)
		);
	}
	
	add_action( 'prowess_select_additional_page_options_map', 'prowess_select_content_bottom_options_map' );
}