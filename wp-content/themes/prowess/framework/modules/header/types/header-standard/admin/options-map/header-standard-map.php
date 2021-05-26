<?php

if ( ! function_exists( 'prowess_select_get_hide_dep_for_header_standard_options' ) ) {
	function prowess_select_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'prowess_select_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'prowess_select_header_standard_map' ) ) {
	function prowess_select_header_standard_map( $parent ) {
		$hide_dep_options = prowess_select_get_hide_dep_for_header_standard_options();
		
		prowess_select_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'prowess' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'prowess' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'prowess' ),
					'left'   => esc_html__( 'Left', 'prowess' ),
					'center' => esc_html__( 'Center', 'prowess' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'prowess_select_additional_header_menu_area_options_map', 'prowess_select_header_standard_map' );
}