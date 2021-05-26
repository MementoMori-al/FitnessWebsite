<?php

if ( ! function_exists( 'prowess_select_header_types_meta_boxes' ) ) {
	function prowess_select_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'prowess_select_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'prowess' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'prowess_select_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function prowess_select_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'prowess_select_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( QODE_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( QODE_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'prowess_select_map_header_meta' ) ) {
	function prowess_select_map_header_meta() {
		$header_type_meta_boxes              = prowess_select_header_types_meta_boxes();
		$header_behavior_meta_boxes_hide_dep = prowess_select_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => apply_filters( 'prowess_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'header_meta' ),
				'title' => esc_html__( 'Header', 'prowess' ),
				'name'  => 'header_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'prowess' ),
				'description'   => esc_html__( 'Select header type layout', 'prowess' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'          => 'qodef_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'prowess' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'prowess' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'prowess' ),
					'light-header' => esc_html__( 'Light', 'prowess' ),
					'dark-header'  => esc_html__( 'Dark', 'prowess' )
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'qodef_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'prowess' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'prowess' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'prowess' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'prowess' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'prowess' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'prowess' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'prowess' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);
		
		//additional area
		do_action( 'prowess_select_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'prowess_select_header_top_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'prowess_select_header_menu_area_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_header_meta', 50 );
}