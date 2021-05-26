<?php

if ( ! function_exists( 'prowess_select_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function prowess_select_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'prowess_select_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'prowess_select_header_standard_meta_map' ) ) {
	function prowess_select_header_standard_meta_map( $parent ) {
		$hide_dep_options = prowess_select_get_hide_dep_for_header_standard_meta_boxes();
		
		prowess_select_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'qodef_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'prowess' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'prowess' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'prowess' ),
					'left'   => esc_html__( 'Left', 'prowess' ),
					'right'  => esc_html__( 'Right', 'prowess' ),
					'center' => esc_html__( 'Center', 'prowess' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'prowess_select_additional_header_area_meta_boxes_map', 'prowess_select_header_standard_meta_map' );
}