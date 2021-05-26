<?php

if ( ! function_exists( 'prowess_select_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function prowess_select_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		prowess_select_create_meta_box_field(
			array(
				'name'        => 'qodef_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'prowess' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'prowess' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'prowess_select_additional_title_area_meta_boxes', 'prowess_select_breadcrumbs_title_type_options_meta_boxes' );
}