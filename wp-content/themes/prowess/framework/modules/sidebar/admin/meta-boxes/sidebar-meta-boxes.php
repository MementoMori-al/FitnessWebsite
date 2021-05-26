<?php

if ( ! function_exists( 'prowess_select_map_sidebar_meta' ) ) {
	function prowess_select_map_sidebar_meta() {
		$qodef_sidebar_meta_box = prowess_select_create_meta_box(
			array(
				'scope' => apply_filters( 'prowess_select_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'prowess' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'prowess' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'prowess' ),
				'parent'      => $qodef_sidebar_meta_box,
                'options'       => prowess_select_get_custom_sidebars_options( true )
			)
		);
		
		$qodef_custom_sidebars = prowess_select_get_custom_sidebars();
		if ( count( $qodef_custom_sidebars ) > 0 ) {
			prowess_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'prowess' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'prowess' ),
					'parent'      => $qodef_sidebar_meta_box,
					'options'     => $qodef_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'prowess_select_meta_boxes_map', 'prowess_select_map_sidebar_meta', 31 );
}