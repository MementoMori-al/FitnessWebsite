<?php

if ( ! function_exists( 'prowess_select_get_header_types_options' ) ) {
	function prowess_select_get_header_types_options() {
		$header_type_options = apply_filters( 'prowess_select_header_type_global_option', $header_type_options = array() );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'prowess_select_get_header_type_default_options' ) ) {
	function prowess_select_get_header_type_default_options() {
		$header_type_option = apply_filters( 'prowess_select_default_header_type_global_option', $header_type_option = '' );
		
		return $header_type_option;
	}
}

if ( ! function_exists( 'prowess_select_get_hide_dep_for_header_behavior_options' ) ) {
	function prowess_select_get_hide_dep_for_header_behavior_options() {
		$hide_dep_options = apply_filters( 'prowess_select_header_behavior_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( QODE_FRAMEWORK_HEADER_ROOT_DIR . '/admin/options-map/*/*.php' ) as $options_load ) {
	include_once $options_load;
}

foreach ( glob( QODE_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/options-map/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'prowess_select_header_options_map' ) ) {
	function prowess_select_header_options_map() {
		$header_type_options              = prowess_select_get_header_types_options();
		$header_type_default_option       = prowess_select_get_header_type_default_options();
		$header_behavior_options_hide_dep = prowess_select_get_hide_dep_for_header_behavior_options();
		
		prowess_select_add_admin_page(
			array(
				'slug'  => '_header_page',
				'title' => esc_html__( 'Header', 'prowess' ),
				'icon'  => 'fa fa-header'
			)
		);

		$panel_header_type = prowess_select_add_admin_panel(
			array(
				'page'  => '_header_page',
				'name'  => 'panel_header_type',
				'title' => esc_html__( 'Header Type', 'prowess' )
			)
		);

		prowess_select_add_admin_field(
			array(
				'parent'        => $panel_header_type,
				'type'          => 'radiogroup',
				'name'          => 'header_type',
				'default_value' => $header_type_default_option,
				'label'         => esc_html__( 'Choose Header Type', 'prowess' ),
				'description'   => esc_html__( 'Select the default header you would like to use', 'prowess' ),
				'options'       => $header_type_options,
				'args'          => array(
					'use_images'  => true,
					'hide_labels' => true,
				)
			)
		);

		$panel_header = prowess_select_add_admin_panel(
			array(
				'page'  => '_header_page',
				'name'  => 'panel_header',
				'title' => esc_html__( 'Header Options', 'prowess' )
			)
		);

		prowess_select_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'select',
				'name'          => 'header_options',
				'default_value' => $header_type_default_option,
				'label'         => esc_html__( 'Choose Header Type to Customize', 'prowess' ),
				'description'   => esc_html__( 'Select the header type you would like to set styling and behavior options for. The header type you choose here will not affect your website\'s default header, which is chosen above, in the header type field.', 'prowess' ),
				'options'       => prowess_select_header_types_meta_boxes(),
			)
		);

		prowess_select_add_admin_field(
			array(
				'parent'          => $panel_header,
				'type'            => 'select',
				'name'            => 'header_behaviour',
				'default_value'   => 'fixed-on-scroll',
				'label'           => esc_html__( 'Choose Header Behaviour', 'prowess' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'prowess' ),
				'options'         => array(
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'prowess' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'prowess' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'prowess' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'prowess' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $header_behavior_options_hide_dep
					)
				)
			)
		);
		
		/***************** Header Skin Options -start ********************/
		
		prowess_select_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'select',
				'name'          => 'header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'prowess' ),
				'description'   => esc_html__( 'Choose a predefined header style for header elements (logo, main menu, side menu opener...)', 'prowess' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'prowess' ),
					'light-header' => esc_html__( 'Light', 'prowess' ),
					'dark-header'  => esc_html__( 'Dark', 'prowess' )
				)
			)
		);
		
		/***************** Header Skin Options - end ********************/
		
		/***************** Top Header Layout - start **********************/
		
		do_action( 'prowess_select_header_top_options_map', $panel_header );
		
		/***************** Top Header Layout - end **********************/
		
		/***************** Menu Area Layout - start **********************/
		
		do_action( 'prowess_select_header_menu_area_options_map', $panel_header );
		
		/***************** Menu Area Layout - end **********************/
		
		/***************** Additional Header Menu Area Layout - start *****************/
		
		do_action( 'prowess_select_additional_header_menu_area_options_map', $panel_header );
		
		/***************** Additional Header Menu Area Layout - end *****************/
		
		/***************** Sticky Header Layout - start *******************/
		
		do_action( 'prowess_select_header_sticky_options_map', $panel_header );
		
		/***************** Sticky Header Layout - end *******************/
		
		/***************** Fixed Header Layout - start ********************/
		
		do_action( 'prowess_select_header_fixed_options_map', $panel_header );
		
		/***************** Fixed Header Layout - end ********************/
		
		/******************* Main Menu Layout - start *********************/
		
		do_action( 'prowess_select_header_main_navigation_options_map' );
		
		/******************* Main Menu Layout - end *********************/
		
		/***************** Additional Main Menu Area Layout - start *****************/
		
		do_action( 'prowess_select_additional_header_main_navigation_options_map' );
		
		/***************** Additional Main Menu Area Layout - end *****************/
	}
	
	add_action( 'prowess_select_options_map', 'prowess_select_header_options_map', 4 );
}