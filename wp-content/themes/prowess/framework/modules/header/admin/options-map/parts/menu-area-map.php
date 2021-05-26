<?php

if ( ! function_exists( 'prowess_select_get_hide_dep_for_header_menu_area_options' ) ) {
	function prowess_select_get_hide_dep_for_header_menu_area_options() {
		$hide_dep_options = apply_filters( 'prowess_select_header_menu_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'prowess_select_header_menu_area_options_map' ) ) {
	function prowess_select_header_menu_area_options_map( $panel_header ) {
		$hide_dep_options = prowess_select_get_hide_dep_for_header_menu_area_options();
		
		$menu_area_container = prowess_select_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'menu_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				),
			)
		);
		
		prowess_select_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area In Grid', 'prowess' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'prowess' ),
			)
		);
		
		$menu_area_in_grid_container = prowess_select_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_in_grid_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid'  => 'no'
					)
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'prowess' ),
				'description'   => esc_html__( 'Set grid background color for menu area', 'prowess' ),
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'prowess' ),
				'description'   => esc_html__( 'Set grid background transparency for menu area', 'prowess' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Shadow', 'prowess' ),
				'description'   => esc_html__( 'Set shadow on grid area', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'prowess' ),
				'description'   => esc_html__( 'Set border on grid area', 'prowess' )
			)
		);
		
		$menu_area_in_grid_border_container = prowess_select_add_admin_container(
			array(
				'parent'          => $menu_area_in_grid_container,
				'name'            => 'menu_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'menu_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'prowess' ),
				'description'   => esc_html__( 'Set border color for menu area', 'prowess' ),
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'color',
				'name'          => 'menu_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'prowess' ),
				'description'   => esc_html__( 'Set background color for menu area', 'prowess' )
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'prowess' ),
				'description'   => esc_html__( 'Set background transparency for menu area', 'prowess' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Area Shadow', 'prowess' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'prowess' ),
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'menu_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Border', 'prowess' ),
				'description'   => esc_html__( 'Set border on menu area', 'prowess' ),
				'parent'        => $menu_area_container
			)
		);
		
		$menu_area_border_container = prowess_select_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_border'  => 'no'
					)
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'menu_area_border_color',
				'label'       => esc_html__( 'Border Color', 'prowess' ),
				'description' => esc_html__( 'Set border color for menu area', 'prowess' ),
				'parent'      => $menu_area_border_container
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'        => 'text',
				'name'        => 'menu_area_height',
				'label'       => esc_html__( 'Height', 'prowess' ),
				'description' => esc_html__( 'Enter header height', 'prowess' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		prowess_select_add_admin_field(
			array(
				'type'   => 'text',
				'name'   => 'menu_area_side_padding',
				'label'  => esc_html__( 'Menu Area Side Padding', 'prowess' ),
				'parent' => $menu_area_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'prowess' )
				)
			)
		);
		
		do_action( 'prowess_select_header_menu_area_additional_options', $panel_header );
	}
	
	add_action( 'prowess_select_header_menu_area_options_map', 'prowess_select_header_menu_area_options_map', 10, 1 );
}