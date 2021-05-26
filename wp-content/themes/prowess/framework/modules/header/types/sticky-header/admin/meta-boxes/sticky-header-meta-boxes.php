<?php

if ( ! function_exists( 'prowess_select_sticky_header_meta_boxes_options_map' ) ) {
	function prowess_select_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = prowess_select_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'qodef_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'prowess' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'prowess' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$prowess_custom_sidebars = prowess_select_get_custom_sidebars();
		if ( count( $prowess_custom_sidebars ) > 0 ) {
			prowess_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'prowess' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'prowess' ),
					'parent'      => $header_meta_box,
					'options'     => $prowess_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'qodef_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'prowess_select_additional_header_area_meta_boxes_map', 'prowess_select_sticky_header_meta_boxes_options_map', 8, 1 );
}