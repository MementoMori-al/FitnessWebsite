<?php

if ( ! function_exists( 'prowess_select_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function prowess_select_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'prowess_select_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'prowess_select_header_top_area_meta_options_map' ) ) {
	function prowess_select_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = prowess_select_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = prowess_select_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		prowess_select_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'prowess' )
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'prowess' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'prowess' ),
				'parent'        => $top_header_container,
				'options'       => prowess_select_get_yes_no_select_array(),
			)
		);
		
		$top_bar_container = prowess_select_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'dependency' => array(
					'show' => array(
						'qodef_top_bar_meta' => 'yes'
					)
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'prowess' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'prowess' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'   => 'qodef_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'prowess' ),
				'parent' => $top_bar_container
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'prowess' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'prowess' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'prowess' ),
				'description'   => esc_html__( 'Set border on top bar', 'prowess' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => prowess_select_get_yes_no_select_array()
			)
		);
		
		$top_bar_border_container = prowess_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'show' => array(
						'qodef_top_bar_border_meta' => 'yes'
					)
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'prowess' ),
				'description' => esc_html__( 'Choose color for top bar border', 'prowess' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'prowess_select_additional_header_area_meta_boxes_map', 'prowess_select_header_top_area_meta_options_map', 10, 1 );
}